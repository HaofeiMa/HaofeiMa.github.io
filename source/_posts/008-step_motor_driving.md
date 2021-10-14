---
title: 二相四线制步进电机驱动原理与Proteus仿真
date: 2021-01-01 16:28:08
description: 单片机无法直接驱动步进电机，需要L298N进行驱动。本文介绍饿了L298N的部分参数，以及两相四线制步进电机的驱动原理和驱动方法。并根据给出的驱动原理在Proteus中进行了仿真实验
categories:
- 嵌入式
- 单片机
tags:
- 实验
- proteus
---

## 一、L298N
![L298N](https://img-blog.csdnimg.cn/20201231180306615.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
	单片机无法直接驱动步进电机，需要L298N进行驱动。L298N的最大功耗为20W，驱动部分端子供电范围+5~+30V，控制信号输入电压范围5V/0V，驱动部分峰值电流2A。
## 二、两相四线制步进电机
**1. 技术指标**
（1）相数：电机内部的线圈组数。
（2）拍数：完成一个磁场周期性变化所需要脉冲数或导电状态。两相四线电机可以使用单四拍、双四拍和八拍的方式驱动。
（3）步距角：磁场变化一次电机转过的角度，两相四线电机步距角为0.9°/1.8°。
**2. 工作原理**
![电机原理](https://img-blog.csdnimg.cn/20201231184450180.png)
	如图所示，电机有四条控制信号A+、A-、B+、B-，通过控制这四条引线上的励磁脉冲，就可以控制步进电机的转动。以四拍驱动方式为例，顺时针转动时
| STEP | A+   | A-   | B+   | B-   |      |
| ---- | ---- | ---- | ---- | ---- | ---- |
| 1    | 1    | 0    | 0    | 0    |      |
| 2    | 0    | 1    | 0    | 0    |      |
| 3    | 0    | 0    | 1    | 0    |      |
| 4    | 0    | 0    | 0    | 1    |      |
**ps：**电动机的旋转方向由脉冲顺序决定，转动速度和脉冲频率有关。
## 三、接线方法
* 控制端：IN1、IN2、IN3、IN4接单片机的四个管脚，用于给出脉冲
* 输入端：5V输入接板载5V，12V输入外接电源
* 使能端：ENA、ENB接板载5V，默认使能
* 输出端：OUT1、OUT2、OUT3、OUT4分别接步进电机的四条线红绿黄蓝。
## 三、Proteus仿真
在Proteus中的接线情况如下图所示：
![Protues接线](https://img-blog.csdnimg.cn/20210101142442184.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
参考程序如下：
```java
#include<reg52.h>
sbit enable = P3^0;

void delay(int i)
{
	int j;
	for(;i>0;i--)
		for(j=114;j>0;j--);
}

void main()
{
	unsigned char step[] = {0x01,0x02,0x04,0x08};	//顺时针转动
	//unsigned char istep[] = {0x01,0x02,0x04,0x08}; //逆时针转动
	int i=0;
	enable=1;
	while(1)
	{
		for(i=0; i<4; i++)
		{
			P2 = step[i];
			delay(200);
		}
	}
}
```
仿真结果：
![仿真结果](https://img-blog.csdnimg.cn/20210101142900715.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)