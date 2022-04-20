---
title: RobotStudio机器人运行路径的创建与仿真
description: >-
  本文在一个已经搭建好机械模型，同时完成机器人系统的创建后的机器人运行路径的创建过程。工程文件已上传到网盘，包括：初始工程文件（03Practice_init.rspag）、完成后的工程文件（03Practice.rspag）、模型文件。
categories:
  - 机器人
  - RobotStudio
tags:
  - 实验
  - RobotStudio
cover: 'https://img.mahaofei.com/img/202112231557471-robotstudio-path-3.png'
abbrlink: c192e333
date: 2021-02-09 23:26:11
updated: 2021-02-09 23:26:11
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
katex:
aplayer:
highlight_shrink:
aside:
stick:
---

本文在一个已经**搭建好机械模型**，同时**完成机器人系统的创建**后的机器人运行路径的创建过程。初始时的界面如下：
![](https://img.mahaofei.com/img/202112231556681-robotstudio-path-1.png)

>**工程文件已上传到网盘**
>包括：初始工程文件（03Practice_init.rspag）、完成后的工程文件（03Practice.rspag）、模型文件
>链接：[https://pan.baidu.com/s/1f0RL-iLBm2Kxd0NbLduv0Q](https://pan.baidu.com/s/1f0RL-iLBm2Kxd0NbLduv0Q) 
>提取码：rs03

#### 工件坐标的创建
![](https://img.mahaofei.com/img/202112231557192-robotstudio-path-2.png)
![](https://img.mahaofei.com/img/202112231557471-robotstudio-path-3.png)

#### 运行路径的创建
1. 首先创建一个空路径
![](https://img.mahaofei.com/img/202112231557137-robotstudio-path-4.png)
2. 改变机器人的姿态，使工具移动到目标点进行示教。
![](https://img.mahaofei.com/img/202112231557648-robotstudio-path-5.png)
![](https://img.mahaofei.com/img/202112231558239-robotstudio-path-6.png)
![](https://img.mahaofei.com/img/202112231558386-robotstudio-path-7.png)
![](https://img.mahaofei.com/img/202112231558971-robotstudio-path-8.png)
- 动作类型
	- Joint：机器人以点到点的形式到此点（不走直线，各轴自由运动）
	- Linear：机器人以直线运行方式从上一点运行到下一点
- Conc
	- 禁用：机器人会精确到达此点
	- 启用：机器人会依据Zone的参数，略过此点
- Speed：机器人的运动速度
- Zone：启用Conc时，机器人掠过目标点所经过圆弧轨迹的半径
3. 测试到达能力并进行模拟运行
![](https://img.mahaofei.com/img/202112231559740-robotstudio-path-9.png)
#### 仿真与录像
1. 将工作站同步到Rapid代码
![](https://img.mahaofei.com/img/202112231559244-robotstudio-path-10.png)
![](https://img.mahaofei.com/img/202112231559665-robotstudio-path-11.png)
2. 进行仿真设定
![](https://img.mahaofei.com/img/202112231559104-robotstudio-path-12.png)
3. 播放并录制保存仿真视频。（录制的视频默认保存在 **我的电脑/视频** 目录下）
![](https://img.mahaofei.com/img/202112231600619-robotstudio-path-13.png)