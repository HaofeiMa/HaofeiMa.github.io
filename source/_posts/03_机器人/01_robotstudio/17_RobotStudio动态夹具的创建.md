---
title: RobotStudio动态夹具的创建
description: 如果你有其它建模软件如Solidworks等做的夹具模型，可以导入到RobotStudio中。这里简单建模，主要展示动态夹具的创建流程。
categories:
  - 机器人
  - RobotStudio
tags:
  - 实验
  - RobotStudio
abbrlink: '5278881'
date: 2021-02-11 22:46:32
---

## 创建夹具的几何模型
如果你有其它建模软件如Solidworks等做的夹具模型，可以导入到RobotStudio中。
这里简单建模，主要展示动态夹具的创建流程。
1. 创建夹具的本体
![](https://img.mahaofei.com/img/202112231601044-robotstudio-clamp-1.png)
2. 将其移动到其他位置，准备创建夹具的其他部分
![](https://img.mahaofei.com/img/202112231601381-robotstudio-clamp-2.png)
3. 创建一个圆柱，作为夹具的法兰盘，与机器人的关节末端相连
![](https://img.mahaofei.com/img/202112231602589-robotstudio-clamp-3.png)
4. 移动长方体的位置。
![](https://img.mahaofei.com/img/202112231602622-robotstudio-clamp-4.png)
5. 将部件2的物体拖动到部件1上，将两个物体组合成一个部件。
![](https://img.mahaofei.com/img/202112231602868-robotstudio-clamp-5.png)
6. 创建夹爪
![](https://img.mahaofei.com/img/202112231603355-robotstudio-clamp-6.png)
![](https://img.mahaofei.com/img/202112231603512-robotstudio-clamp-7.png)
## 创建机械装置
1. 点击创建机械装置，装置名称写“夹具”，装置类型选“工具”
![](https://img.mahaofei.com/img/202112231603327-robotstudio-clamp-8.png)
2. 添加链接，为刚才创建的三个部件分别添加链接。如果是导入的模型，也需要为各个部件添加链接。其中基座部分需要勾选BaseLink，其它部分不需要。
![](https://img.mahaofei.com/img/202112231603495-robotstudio-clamp-9.png)
![](https://img.mahaofei.com/img/202112231604636-robotstudio-clamp-10.png)

![](https://img.mahaofei.com/img/202112231604182-robotstudio-clamp-11.png)
![](https://img.mahaofei.com/img/202112231604040-robotstudio-clamp-12.png)

3. 创建接点
![](https://img.mahaofei.com/img/202112231604329-robotstudio-clamp-13.png)
![](https://img.mahaofei.com/img/202112231605794-robotstudio-clamp-14.png)

4. 创建工具数据
![](https://img.mahaofei.com/img/202112231605742-robotstudio-clamp-15.png)
5. 添加一个新姿态
![](https://img.mahaofei.com/img/202112231605535-robotstudio-clamp-16.png)
## Smart组件设置
1. 创建Smart组件，将夹具拖动到Smart组件下，并将夹具设置为Smart组件的角色Role
![](https://img.mahaofei.com/img/202112231605493-robotstudio-clamp-17.png)
2. 添加以下组件
![](https://img.mahaofei.com/img/202112231606527-robotstudio-clamp-18.png)
3. 添加信号
![](https://img.mahaofei.com/img/202112231606441-robotstudio-clamp-19.png)
4. 对各个组件进行设置，首先先设置夹具不可由传感器检测
![](https://img.mahaofei.com/img/202112231606430-robotstudio-clamp-20.png)
5. 设置直线传感器，设置为图示圆柱状，用于检测夹具下方是否有物体
![](https://img.mahaofei.com/img/202112231606894-robotstudio-clamp-21.png)
6. 设置Attacher安装对象组件
![](https://img.mahaofei.com/img/202112231607965-robotstudio-clamp-22.png)
7. 设置PoseMover，机械装置运动的属性
![](https://img.mahaofei.com/img/202112231607238-robotstudio-clamp-23.png)
![](https://img.mahaofei.com/img/202112231607713-robotstudio-clamp-24.png)
8. 按图示设计程序框图
![](https://img.mahaofei.com/img/202112231607859-robotstudio-clamp-25.png)
> 链接：[https://pan.baidu.com/s/1pVwEuCmvoiwFlHMjRqEjLQ](https://pan.baidu.com/s/1pVwEuCmvoiwFlHMjRqEjLQ ) 
> 提取码：rs04 