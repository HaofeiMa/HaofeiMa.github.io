---
title: ROS与STM32通信
categories:
  - 机器人
  - ROS
tags:
  - 实验
  - ROS
description: 实现了上位机Ros noetic与STM32F1开发板的基于串口的相互通信。
cover: >-
  https://img.mahaofei.com/img/%E9%80%9A%E4%BF%A1%E4%B8%8A%E4%BD%8D%E6%9C%BA%E7%AB%AF.jpg
katex: false
abbrlink: 7ea7f1cc
date: 2022-03-28 11:43:16
updated: 2022-03-28 11:43:16
top_img:
keywords:
comments:
toc:
toc_number:
toc_style_simple:
copyright:
copyright_author:
copyright_author_href:
copyright_url:
copyright_info:
mathjax:
aplayer:
highlight_shrink:
aside:
stick:
---

> ROS功能包与STM32工程文件：
> 蓝奏云：[https://huffie.lanzouw.com/iN7w602ti37a](https://huffie.lanzouw.com/iN7w602ti37a)

# 1 通信协议

STM32和ROS端各有一个数据发送函数和数据接收函数，发送和接受的数据以数据包的形式发送。

## 数据包的内容：

数据头55aa + 数据字节数size + 数据共用体 + 校验crc8 + 数据尾0d0a


# 2 原理

## 2.1 收发数据方法简述

首先，串口收发数据是一个字节一个字节的传输的。一个字节最大表示数据是255，而往往我们需要传递的传感器数据都是int/float类型的。

传统的串口通信方法是将int/float数据分解成一个个字节发送出去。

而这里使用共用体，将数据通过共用体转换为数组发送。


## 2.2 数据共用体的使用

**共用体的规则**：

- 共用体是结构体内不同成员共享内存的机制，各成员内存地址一致
- 同一时刻只能访问其中的一个成员
- 不同成员按照成员类型的性质进行内存访问。

**共用体的创建**：

```cpp
#include <stdio.h>
#include <string.h>

union Data
{
	int i;
	float f;
	char str[20];
};

int main()
{
	union Data data;
	data.i = 10;
	data.f = 220.5;
	strcpy( data.str, "C Programming");
	printf( "data.i : %d\n", data.i);
	printf( "data.f : %f\n", data.f);
	printf( "data.str : %s\n", data.str);
	return 0;
}
``` 

最后赋给变量的值占用了内存位置，因此同一时间只能用到一个成员。

**如何使用共用体**

在通信两端都定义同样数据结构的共用体，该共用体包含一个short/int/float类型的变量和一个unsigned char类型的数组，数组大小与变量字节大小对应。这样发送和接收数据时，只发送或接收共用体中unsigned char数组的元素。

![](https://gitee.com/huffiema/pictures/raw/master/image/202203251701027-stm32-ros-1.png)

# 3 准备工作

## 3.1 硬件准备

使用STM32串口+TTL转USB模块（CH340）+Linux设备。

![](https://gitee.com/huffiema/pictures/raw/master/image/202203251702390-stm32-ros-2.png)

**注意事项**：

- STM32和ROS的串口波特率必须一致
- STM32串口和USB转TTL模块连接正确，RX-TX，TX-RX
- Linux设备安装好CH340/CH341驱动
- 确保串口在Linux系统上有超级用户权限
- 将ROS功能包中mbot_linux_serial.cpp文件中的串口设备名字改为自己的设备名


## 3.2 串口设置


**查看串口设备**

Linux设备插上USB转TTL模块后，打开终端，输入命令：

```shell
ls -l /dev/ttyUSB*
```

如果终端出现类似下面的输出结果，说明串口设备已经被识别

```shell
crw-rw---- 1 root dialout 188, 0 3月  25 17:07 /dev/ttyUSB0
```

**设置串口权限**

在终端中输入下面命令：（注意自己的串口设备名）

```shell
sudo chmod 777 /dev/ttyUSB0 
source devel/setup.bash
```

如果没有任何输出，说明串口设备设置权限成功。（每次重新启动或重新插入串口设备后都需要进行这样的操作）


# 4 程序设计

## 4.1 STM32程序设计

工程文件中提供的是STM32F103的程序，也可以在自己板子的串口收发例程的基础上进行修改，添加mbotLinuxUsart.c和mbotLinuxUsart.h到工程中即可。

函数调用方式如下：

```cpp
#include "delay.h"
#include "sys.h"
#include "usart.h"
#include "mbotLinuxUsart.h"//引用该头文件是使用，通信协议的前提

//测试发送变量
short testSend1   =5000;
short testSend2   =2000;
short testSend3   =1000;
unsigned char testSend4 = 0x05;

//测试接收变量
int testRece1     =0;
int testRece2     =0;
unsigned char testRece3 = 0x00;

int main(void)
{   
/*************** 硬件初始化 ***************/
    delay_init();                                   //延时函数初始化   
    NVIC_PriorityGroupConfig(NVIC_PriorityGroup_2); //设置中断优先级分组2
    uart_init(115200);                              //串口初始化为115200

/***************循环程序 ***************/
    while(1)
    {
        //将需要发送到ROS的数据，从该函数发出，前三个数据范围（-32768 - +32767），第四个数据的范围(0 - 255)
        usartSendData(testSend1,testSend2,testSend3,testSend4);
        //必须的延时
        delay_ms(13);
    } 
}

/*************** 串口中断服务程序 ***************/
void USART1_IRQHandler()
{
    if(USART_GetITStatus(USART1, USART_IT_RXNE) != RESET)
     {
         USART_ClearITPendingBit(USART1,USART_IT_RXNE);//首先清除中断标志位
         //从ROS接收到的数据，存放到下面三个变量中
         usartReceiveOneData(&testRece1,&testRece2,&testRece3);
     }
}
```


## 4.2 ROS程序设计

[[01_Ubuntu20.04安装ROS Noetic|ROS安装]]过程不再介绍

**第一步**

首先[[13_ROS系统基本功能的使用详解（基本指令、节点、服务、启动文件、动态参数）]]（如果没创建的话）

```shell
mkdir -p ~/catkin_ws/src
cd catkin_ws/src
catkin_init_workspace
```


**第二步**

将topic_example功能包复制到src目录下，然后回到工作空间目录进行编译

```shell
cd ..
catkin_make
```



# 5 测试

添加串口设备权限

```shell
sudo chmod 777 /dev/ttyUSB0
source devel/setup.bash
```

打开新终端，启动`ros master

```shell
roscore
```

打开新终端，启动测试功能包

```shell
rosrun topic_example publish_node
```

可以看到从STM32接收到的数据。


![](https://img.mahaofei.com/img/%E9%80%9A%E4%BF%A1STM32%E7%AB%AF.jpg)


![](https://img.mahaofei.com/img/%E9%80%9A%E4%BF%A1%E4%B8%8A%E4%BD%8D%E6%9C%BA%E7%AB%AF.jpg)
