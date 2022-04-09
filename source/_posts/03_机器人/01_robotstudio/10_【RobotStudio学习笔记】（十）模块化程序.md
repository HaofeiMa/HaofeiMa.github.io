---
title: 【RobotStudio学习笔记】（十）模块化程序
description: >-
  当程序比较复杂，或者程序内存在重复的部分时，模块化程序设计往往是比较可行的办法。在RobotStudio中可以通过在主程序中调用不同的例行程序，达到使代码逻辑清晰的目的。
categories:
  - 机器人
  - RobotStudio
tags:
  - 笔记
  - RobotStudio
abbrlink: fd5caa9a
date: 2021-02-04 22:47:06
---

当程序比较复杂，或者程序内存在重复的部分时，模块化程序设计往往是比较可行的办法。在RobotStudio中可以通过在主程序中调用不同的例行程序，达到使代码逻辑清晰的目的。
### 将搬运工件的动作保存为例行程序
1. 进入例行程序，新建一个例行程序
![](https://img.mahaofei.com/img/202112231523040-robotstudio-notes10-1.png)
![](https://img.mahaofei.com/img/202112231524731-robotstudio-notes10-2.png)
2. 回到main程序，鼠标选中第一行，点击编辑-编辑，将main函数内的代码复制到新建的例行程序中
![](https://img.mahaofei.com/img/202112231524737-robotstudio-notes10-3.png)
3. 回到刚才新建的例行程序中，将main函数代码粘贴过来。
![](https://img.mahaofei.com/img/202112231524541-robotstudio-notes10-4.png)
4. 利用调试-pp移至例行程序，测试例行程序是否正确，没有问题的话，就将main函数的内容，用指令procall代替。
![](https://img.mahaofei.com/img/202112231525965-robotstudio-notes10-5.png)
![](https://img.mahaofei.com/img/202112231525916-robotstudio-notes10-6.png)
![](https://img.mahaofei.com/img/202112231526799-robotstudio-notes10-7.png)
### 快速实现搬运第二个工件
1. 首先将搬运工件的例行程序复制一份
![](https://img.mahaofei.com/img/202112231526330-robotstudio-notes10-8.png)
![](https://img.mahaofei.com/img/202112231527924-robotstudio-notes10-9.png)
2. 因为工件的位置是利用仓库的工件坐标系通过偏倚确定的，因此只需要修改Offs函数的参数即可确定第二个工件的夹取位置。
![](https://img.mahaofei.com/img/202112231527246-robotstudio-notes10-10.png)