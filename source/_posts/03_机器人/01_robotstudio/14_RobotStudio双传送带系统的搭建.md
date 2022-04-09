---
title: RobotStudio双传送带系统的搭建
description: >-
  首先搭建系统的机械结构。导入两个传送带，将第二个传送带以z轴旋转90°，再沿y轴偏移-3200mm。导入机器人IRB120，将其移动到合适的位置上。创建工件的模型...
categories:
  - 机器人
  - RobotStudio
tags:
  - 实验
  - RobotStudio
abbrlink: f8aff6ba
date: 2021-02-08 22:33:51
---








### 机械结构的搭建
1. 导入两个传送带，将第二个传送带以z轴旋转90°，再沿y轴偏移-3200mm。
![](https://img.mahaofei.com/img/202112231547151-robotstudio-doubleconveyer-1.png)
![](https://img.mahaofei.com/img/202112231547014-robotstudio-doubleconveyer-2.png)
![](https://img.mahaofei.com/img/202112231548275-robotstudio-doubleconveyer-3.png)
![](https://img.mahaofei.com/img/202112231548997-robotstudio-doubleconveyer-4.png)
![](https://img.mahaofei.com/img/202112231549817-robotstudio-doubleconveyer-5.png)
2. 导入机器人IRB120，将其移动到合适的位置上。
![](https://img.mahaofei.com/img/202112231549242-robotstudio-doubleconveyer-6.png)
![](https://img.mahaofei.com/img/202112231550395-robotstudio-doubleconveyer-7.png)
3. 创建工件的模型，将工件的第二部分内的物体拖动到第一部分中，形成一个部件
![](https://img.mahaofei.com/img/202112231550097-robotstudio-doubleconveyer-8.png)
![](https://img.mahaofei.com/img/202112231551500-robotstudio-doubleconveyer-9.png)
4. 将工件移动到合适的位置
![](https://img.mahaofei.com/img/202112231552087-robotstudio-doubleconveyer-10.png)
5. 导入夹具，将夹具旋转至与大地坐标系平行
![](https://img.mahaofei.com/img/202112231552216-robotstudio-doubleconveyer-11.png)
6. 设置夹具的本地坐标
![](https://img.mahaofei.com/img/202112231554863-robotstudio-doubleconveyer-12.png)
7. 在左侧布局栏中，将夹具拖动到机器人上，更新夹具的位置
![](https://img.mahaofei.com/img/202112231554899-robotstudio-doubleconveyer-13.png)
### 创建机器人系统
![](https://img.mahaofei.com/img/202112231554707-robotstudio-doubleconveyer-14.png)
![](https://img.mahaofei.com/img/202112231554597-robotstudio-doubleconveyer-15.png)
![](https://img.mahaofei.com/img/202112231555421-robotstudio-doubleconveyer-16.png)
![](https://img.mahaofei.com/img/202112231555822-robotstudio-doubleconveyer-17.png)
![](https://img.mahaofei.com/img/202112231555519-robotstudio-doubleconveyer-18.png)
![](https://img.mahaofei.com/img/202112231556585-robotstudio-doubleconveyer-19.png)
![](https://img.mahaofei.com/img/202112231556315-robotstudio-doubleconveyer-20.png)

等待一段时间，等待系统创建完成即可进行传送带的试验。