---
title: 【RobotStudio学习笔记】（七）工件坐标
description: 在目标工作台的任意位置，任意角度创建一个直角坐标系，把这个坐标系叫做工件坐标。在不同的位置创建工件坐标系，就可以实现，相同的程序在不同的位置实现相同的加工。
categories:
  - 机器人
  - RobotStudio
tags:
  - 笔记
  - RobotStudio
cover: 'https://img.mahaofei.com/img/202112231500037-robotstudio-notes7-5.png'
abbrlink: c31c5b0
date: 2021-02-01 23:41:31
updated: 2021-02-01 23:41:31
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

### 一、工件坐标简介
在目标工作台的任意位置，任意角度创建一个直角坐标系，把这个坐标系叫做工件坐标。
在不同的位置创建工件坐标系，就可以实现，相同的程序在不同的位置实现相同的加工。
### 二、3点法设置工件坐标
1. 进入手动操作-工件坐标=新建，创建一个工件坐标
![](https://img.mahaofei.com/img/202112231458020-robotstudio-notes7-1.png)
![](https://img.mahaofei.com/img/202112231458085-robotstudio-notes7-2.png)
2. 选中新建的工件坐标，编辑-定义，用户方法选择3点
![](https://img.mahaofei.com/img/202112231458270-robotstudio-notes7-3.png)
![](https://img.mahaofei.com/img/202112231459866-robotstudio-notes7-4.png)
3. 如果想建立一个如下图所示的坐标系
![](https://img.mahaofei.com/img/202112231500037-robotstudio-notes7-5.png)
4. 在仿真内选择基本-其它-创建工件坐标，用户坐标框架-取点创建框架，选择三个点即可创建坐标系。
![](https://img.mahaofei.com/img/202112231500874-robotstudio-notes7-6.png)
![](https://img.mahaofei.com/img/202112231500815-robotstudio-notes7-7.png)
### 三、实际系统工件坐标的确定
在操作实际机器人系统时，可以选择一个具有尖端的工件，手动操作对齐要确定的三个点，记录下来设置工件坐标。
1. 添加一个具有尖端的工具，用于确定目标点坐标。将工具添加到机器人系统中，并隐藏此前的夹爪工具。
![](https://img.mahaofei.com/img/202112231501574-robotstudio-notes7-8.png)
![](https://img.mahaofei.com/img/202112231501192-robotstudio-notes7-9.png)
![](https://img.mahaofei.com/img/202112231501383-robotstudio-notes7-10.png)

2. 按照上文**三点法设置工件坐标**的前两步。选择仓库的三个点位分别设置为X1、X2、Y1，以此来确定工件坐标系。完成后点击确定。
![](https://img.mahaofei.com/img/202112231503509-robotstudio-notes7-11.png)
![](https://img.mahaofei.com/img/202112231504258-robotstudio-notes7-12.png)
![](https://img.mahaofei.com/img/202112231504772-robotstudio-notes7-13.png)
3. 同理在操作台也可以创建一个工件坐标
![](https://img.mahaofei.com/img/202112231505134-robotstudio-notes7-14.png)
![](https://img.mahaofei.com/img/202112231508294-robotstudio-notes7-15.png)
![](https://img.mahaofei.com/img/202112231508626-robotstudio-notes7-16.png)
4. 删除刚才添加用于确定点位的工具（Pen），令夹爪可见
### 四、程序中工件坐标的修改方法
修改程序中的工件坐标，使在仓库夹取工件的部分动作使用仓库工件坐标系，在操作台的放置部分动作使用操作台工件坐标系，其余动作使用默认工件坐标系。
1. 以pPickUP位置处的动作为例。单步运行程序，运行至pPickUP位置时，点击整条指令，**可选变量—[\WObj]—使用**
![](https://img.mahaofei.com/img/202112231509087-robotstudio-notes7-17.png)
![](https://img.mahaofei.com/img/202112231509106-robotstudio-notes7-18.png)
2. 点击wobj0，选择wobj_CK确定
![](https://img.mahaofei.com/img/202112231510351-robotstudio-notes7-19.png)
3. 选择回到手动操作面板，点击工件坐标，选择wobj_CK
![](https://img.mahaofei.com/img/202112231511473-robotstudio-notes7-20.png)
![](https://img.mahaofei.com/img/202112231511778-robotstudio-notes7-21.png)
4. 再回到程序编辑器，选择刚才编辑的那一条语句，修改位置即可。