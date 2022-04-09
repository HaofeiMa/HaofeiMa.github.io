---
title: RobotStudio传送带设计
description: >-
  新建一个工作站，从设备中导入一个传送带。创建一个正方体，作为传送带的传送对象。将小方块拖动带传送带上我们要的位置处,可以借助捕捉与设定位置精确定位小方块的位置...
categories:
  - 机器人
  - RobotStudio
tags:
  - 实验
  - RobotStudio
abbrlink: 235f7d9b
date: 2021-02-06 23:04:52
---



> 工作站文件：
> 链接：[https://pan.baidu.com/s/1kikAGbj-vVAH-IR9AWY1sg](https://pan.baidu.com/s/1kikAGbj-vVAH-IR9AWY1sg )
> 提取码：robo 
### 传送带模型的创建
1. 新建一个工作站，从设备中导入一个传送带
![](https://img.mahaofei.com/img/202112231529116-robotstudio-conveyer-1.png)
![](https://img.mahaofei.com/img/202112231529421-robotstudio-conveyer-2.png)
2. 创建一个正方体，作为传送带的传送对象
![](https://img.mahaofei.com/img/202112231530401-robotstudio-conveyer-3.png)
3. 将小方块拖动带传送带上我们要的位置处
![](https://img.mahaofei.com/img/202112231530756-robotstudio-conveyer-4.png)
4. 可以借助**捕捉**与**设定位置**精确定位小方块的位置
![](https://img.mahaofei.com/img/202112231537698-robotstudio-conveyer-5.png)
![](https://img.mahaofei.com/img/202112231537983-robotstudio-conveyer-6.png)
![](https://img.mahaofei.com/img/202112231538014-robotstudio-conveyer-7.png)
### 简单传送带设计
1. 建立一个Smart组件，先实现小方块的直线移动
![](https://img.mahaofei.com/img/202112231538464-robotstudio-conveyer-8.png)
![](https://img.mahaofei.com/img/202112231538216-robotstudio-conveyer-9.png)
2. 点击仿真-播放，然后点击Smart组件的Execute按钮，即可观察到小方块的直线运动。但是小方块无法自行停止，需要点击停止按钮，然后重置，才能回到初始状态。
![](https://img.mahaofei.com/img/202112231539253-robotstudio-conveyer-10.png)
3. 添加一个**面传感器**用于检测小方块的位置
![](https://img.mahaofei.com/img/202112231539927-robotstudio-conveyer-11.png)
![](https://img.mahaofei.com/img/202112231539811-robotstudio-conveyer-12.png)
4. 回到Smart组件的设计页面，设计逻辑程序，因为**传送带的逻辑是输入端有高电平就运行，传感器的逻辑是有物体触碰就输出高电平，其他时间输出低电平**。因此要实现传送带的要求，只需要将**传感器的输出取非后传给传动带**即可。
![](https://img.mahaofei.com/img/202112231540286-robotstudio-conveyer-13.png)
![](https://img.mahaofei.com/img/202112231540964-robotstudio-conveyer-14.png)
5. 进行仿真，发现传送带与小方块的运行效果符合预期。如果发现小方块不停止的话，将传送带的**可由传感器检测**取消掉就可以了
![](https://img.mahaofei.com/img/202112231540116-robotstudio-conveyer-15.png)
### 多个物体的连续传送
1. 添加一个Source组件用于实现小方块的复制，编辑它的属性
![](https://img.mahaofei.com/img/202112231540663-robotstudio-conveyer-16.png)
复制源Source选择小方块，位置通过捕捉本地原点选择小方块的原点，点击应用。
2. 然后进行复制小方块的程序设计由于**Source组件的触发条件是上升沿**，即低脉冲跃变到高脉冲时，才会触发复制效果。
![](https://img.mahaofei.com/img/202112231541684-robotstudio-conveyer-17.png)
因此考虑添加一个脉冲信号的发生组件Timber，信号间隔暂定为5s。
![](https://img.mahaofei.com/img/202112231541304-robotstudio-conveyer-18.png)
![](https://img.mahaofei.com/img/202112231541885-robotstudio-conveyer-19.png)
3. 但是这样带来的问题是，在第一个小方块还未到终点时，因为时间已经到了5s，因此传送带会开始运送下一个小方块，仿真表现是所有小方块运动5s后会自动停止。因此选择使用队列这个组件来解决问题。
![](https://img.mahaofei.com/img/202112231542233-robotstudio-conveyer-20.png)
![](https://img.mahaofei.com/img/202112231542450-robotstudio-conveyer-21.png)
![](https://img.mahaofei.com/img/202112231542707-robotstudio-conveyer-22.png)
* back：将复制出来的小方块添加到队列后面
* delete：删除队列中最前面的物体
* enqueue：接收到复制完成的信号后开始将对象添加到队列中
* 传送带的传送对象需要改为整个队列

仿真效果如下（可将原始方块部件_1取消可见，显示效果更好）
![](https://img.mahaofei.com/img/202112231543116-robotstudio-conveyer-23.png)