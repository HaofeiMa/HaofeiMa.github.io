---
title: 驱动多个二相四线制步进电机的Proteus仿真
date: 2021-01-03 15:30:31
description: CD4066是四双向模拟开关，将CD4066的四个输入端接在L298N的输出口，CD4066的输出端接在步进电机的A+、A-、B+、B-端口，四个控制口同时接在单片机的某一引脚上，实现单片机的一个引脚控制一个CD4066上四个开关的同时开断，进而实现步进电机的选择。
categories:
- 嵌入式
- 单片机
tags:
- 实验
- proteus
---

## CD4066介绍
**1. 功能简介**
	CD4066是四双向模拟开关，主要用作模拟或数字信号的多路传输。CD4066 的每个封装内部有4 个独立的模拟开关，每个模拟开关有输入、输出、控制三个端子，其中输入端和输出端可互换。
	![](https://gitee.com/huffiema/pictures/raw/master/image/202112231034164-mulity-step-motor-1.png)
**2. 引脚说明**

* CONTROL：开关控制端 [1] 
* IN/OUT：输入/输出端
* OUT/IN：输出/输入端
* VDD：电源正
* VSS：电源负

**3. 控制方法**
	将CD4066的四个输入端接在L298N的输出口，CD4066的输出端接在步进电机的A+、A-、B+、B-端口，四个控制口同时接在单片机的某一引脚上，实现单片机的一个引脚控制一个CD4066上四个开关的同时开断，进而实现步进电机的选择。

## Proteus仿真
Proteus接线图如下图所示。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231035730-mulity-step-motor-2.png)
由于Proteus内没有CD4066，只有4066，因此考虑将4个4066组合视为一个整体。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231036221-mulity-step-motor-3.png)
仿真结果：
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231036870-mulity-step-motor-4.png)
代码：
```java
#include<reg52.h>
sbit enable = P3^0;
sbit key = P3^1;
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
	unsigned char table1[] = {0x01,0x02,0x04,0x08,0x10,0x20,0x40,0x80};
	unsigned char table2[] = {0x01,0x02,0x04,0x08};
	int i=0,num=0;
	enable=1;
	P1 = 0x00;
	P0 = 0x00;
	while(1)
	{
		if(key == 0);
		{
			delay(10);
			if(key == 0)
			{				
				num++;
				if(num>=12)
					num=-1;
				while(!key);
			}
		}
		
		if(num==-1)
		{
			P1=0x00;
			P0=0x00;
		}
		else if(num<8)
			P1=table1[num];
		else
			P0=table2[num-8];

		for(i=0; i<4; i++)
		{
			P2 = step[i];
			delay(500);
		}
	}
}
```