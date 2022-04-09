---
title: 【RobotStudio学习笔记】（四）夹取工件程序设计
description: >-
  MoveJ的作用是移动到某位置。Set/Reset用于控制外部设备。在初始位置添加一句MoveJ指令，将机器人爪调至工件的正上方，再添加一条MoveJ指令（在工件上方添加一个位置点，是为了防止机器人直接夹取，可能会从侧面撞到工件）。
categories:
  - 机器人
  - RobotStudio
tags:
  - 笔记
  - RobotStudio
abbrlink: c3082f61
date: 2021-01-30 22:36:49
---

### 一、指令
1. MoveJ：移动到某位置
2. Set/Reset：控制外部设备
### 二、实现过程
1. 在初始位置添加一句MoveJ指令
![](https://img.mahaofei.com/img/202112231156121-robotstudio-notes4-1.png)
2. 将机器人爪调至工件的正上方，再添加一条MoveJ指令（在工件上方添加一个位置点，是为了防止机器人直接夹取，可能会从侧面撞到工件）
![](https://img.mahaofei.com/img/202112231158132-robotstudio-notes4-2.png)
3. 将机器人爪子向下移动到夹取工件的位置，添加一条MoveJ指令
![](https://img.mahaofei.com/img/202112231200758-robotstudio-notes4-3.png)
4. 使用Set指令，使机器人爪子夹紧工件。
![](https://img.mahaofei.com/img/202112231202140-robotstudio-notes4-4.png)
5. 将机器人竖直向上移动，使工件脱离工作台，添加一条MoveJ指令。
![](https://img.mahaofei.com/img/202112231435382-robotstudio-notes4-5.png)
6. 将工件移动到夹具台上方，再次添加一条MoveJ指令。
![](https://img.mahaofei.com/img/202112231435336-robotstudio-notes4-6.png)
7. 将工具放到工作台上，添加一条MoveJ指令，再使用Reset指令松开夹爪。
![](https://img.mahaofei.com/img/202112231437607-robotstudio-notes4-7.png)
8. 使用MoveJ指令将机器人先竖直向上移动，再回到初始位置，即可完成一个动作周期。
### 三、增强代码可读性-创建robtarget数据
点击MoveJ指令后的*，点击ToPoint，点击新建，即可创建一个robotarget数据，代替*所在位置，增强程序的可读性。
（注意，新建robtarget数据时，是记录机器人**现在位置**，而非原指位置）
![](https://img.mahaofei.com/img/202112231438945-robotstudio-notes4-8.png)
![](https://img.mahaofei.com/img/202112231439891-robotstudio-notes4-9.png)
![](https://img.mahaofei.com/img/202112231440095-robotstudio-notes4-10.png)
![](https://img.mahaofei.com/img/202112231444607-robotstudio-notes4-11.png)

### 四、修改程序中的工具数据
为了输出负载等其它参数的正常与机器人的稳定运行，需要将指令后的工具坐标修改为正确的工具坐标。
1. 当机器人系统处于此行程序对应位置时，点击tool0修改为tGrip
![](https://img.mahaofei.com/img/202112231448325-robotstudio-notes4-12.png)
![](https://img.mahaofei.com/img/202112231450261-robotstudio-notes4-13.png)
2. 因工具坐标发生变化，所以对应的位置坐标也需要改变，点击修改位置即可将更改正确位置
![](https://img.mahaofei.com/img/202112231450760-robotstudio-notes4-14.png)
3. 将机器人移动到下一个位置，然后再修改工具坐标，再更正位置。
![](https://img.mahaofei.com/img/202112231450222-robotstudio-notes4-15.png)