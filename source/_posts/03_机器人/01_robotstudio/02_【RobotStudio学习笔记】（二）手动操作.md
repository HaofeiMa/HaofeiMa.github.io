---
title: 【RobotStudio学习笔记】（二）手动操作
description: >-
  打开一个机器人系统，打开虚拟示教器。点击菜单-手动操纵-动作模式，可以看到下方有四个动作模型，其中轴1-3和轴4-6为单轴操作，后面是线性操作，和重定位操作，这里选择轴1-3，点击确定，可以看到在手动操作界面右方有机器人的位置信息和操纵杆方向。
categories:
  - 机器人
  - RobotStudio
tags:
  - 笔记
  - RobotStudio
abbrlink: 8e5621e4
date: 2021-01-28 23:17:46
---

## 手动单轴操作
1. 打开一个机器人系统，打开虚拟示教器
2. 点击**菜单-手动操纵-动作模式**，可以看到下方有四个动作模型，其中轴1-3和轴4-6为单轴操作，后面是线性操作，和重定位操作，这里**选择轴1-3**，点击确定。
![](https://img.mahaofei.com/img/202112231146716-robotstudio-notes2-1.png)
![](https://img.mahaofei.com/img/202112231147272-robotstudio-notes2-2.png)
![](https://img.mahaofei.com/img/202112231147945-robotstudio-notes2-3.png)
3. 可以看到在手动操作界面右方有机器人的位置信息和操纵杆方向。 操纵杆方向处的箭头对应示教器控制器的箭头，数字代表轴的序号。 如第一个代表上下箭头控制二轴的运动，下箭头为正方向第二个代表左右箭头控制1轴的运动，第三个代表顺时针，逆时针按钮控制3轴的运动。如果想要控制4-6，点击动作模式选择轴4-6即可。
![](https://img.mahaofei.com/img/202112231147709-robotstudio-notes2-4.png)
## 手动线性操作
1. 进入手动操纵的菜单栏，可以看到现在的动作模式是单轴动作，坐标系不可选。
![](https://img.mahaofei.com/img/202112231148535-robotstudio-notes2-5.png)
2. 点击动作模式，将**动作模式更改为线性**，确定后，可以看到此时的坐标系可以选择了。
![](https://img.mahaofei.com/img/202112231148461-robotstudio-notes2-6.png)
3. 进入坐标系菜单，可以看到有四种坐标系，分别是大地坐标、基坐标、工具、工件坐标。
![](https://img.mahaofei.com/img/202112231148166-robotstudio-notes2-7.png)
4. 首先看大地坐标，选择大地坐标确定后，可以看到控制器右侧的位置信息变成了xyz坐标值。操纵杆方向也变成了xyz，大地坐标系就是以机器人视图左下角的坐标系为基准进行运动。
![](https://img.mahaofei.com/img/202112231149507-robotstudio-notes2-8.png)
![](https://img.mahaofei.com/img/202112231149493-robotstudio-notes2-9.png)
5. 基坐标系，选中机器人底座，可以看到有一个坐标系，此时xyz就是沿着这个坐标系确定的。
![](https://img.mahaofei.com/img/202112231150330-robotstudio-notes2-10.png)
6. 工具坐标，可以看到菜单栏有一项为工具坐标tool0，这个坐标系就是以机器人末端第六关节的坐标运动。
![](https://img.mahaofei.com/img/202112231150929-robotstudio-notes2-11.png)
![](https://img.mahaofei.com/img/202112231150345-robotstudio-notes2-12.png)
7. 工件坐标，可以看到菜单栏有一项为工件坐标tool0，这个坐标系是以工件的坐标系运动。
## 重定位操作
1. 打开虚拟示教器，**手动操纵-动作模式**，切换动作模式为重定位。
![](https://img.mahaofei.com/img/202112231151019-robotstudio-notes2-13.png)
2. 回到手动操纵的菜单栏，可以看到此时的坐标系为工具，工具坐标为tool0
![](https://img.mahaofei.com/img/202112231151642-robotstudio-notes2-14.png)
3. 按下示教器的箭头，手动操作进行观察，可以发现位置坐标XYZ始终不发生变化。
![](https://img.mahaofei.com/img/202112231151849-robotstudio-notes2-15.png)
4. 将爪子隐藏，可以看出系统运动过程中，第6关节末端中心点位置保持不变。
![](https://img.mahaofei.com/img/202112231152444-robotstudio-notes2-16.png)
![](https://img.mahaofei.com/img/202112231152706-robotstudio-notes2-17.png)
## 动作模式的切换
1. 在摇杆的左侧切换操作模式，第二个按钮是切换重定位和线性，第三个按钮切换轴1-3和轴4-6。面板右下角显示当前操作模式。
![](https://img.mahaofei.com/img/202112231152614-robotstudio-notes2-18.png)
2. 点击示教器右下角图标，可以看到机器人系统的详细信息，在这里同样可以对手动操纵菜单栏里所有的选项进行更改。
![](https://img.mahaofei.com/img/202112231152848-robotstudio-notes2-19.png)