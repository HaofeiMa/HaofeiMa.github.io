---
title: 【RobotStudio学习笔记】（一）软件的安装与初步测试
date: 2021-01-26 19:21:37
description: 将安装包解压，运行安装包内的setup.exe程序，按照提示安装即可，比较简单。安装完成后双击RobotStudio_5.61.02注册补丁.reg。打开RobotStudio即可完成安装。
categories:
- 机器人
- RobotStudio
tags:
- 笔记
- robotstudio
---

## RobotStudio 6.03.02 的安装

> 链接：[https://pan.baidu.com/s/1NyDTu_OCcPJLbfaQLtCHCw](https://pan.baidu.com/s/1NyDTu_OCcPJLbfaQLtCHCw)
> 提取码：robo 
### 1. 安装注意事项
（1）PC用户名为英文
（2）安装路径为英文
（3）安装过程全程联网
### 2. 安装方法
（1）将安装包解压，运行安装包内的setup.exe程序，按照提示安装即可，比较简单。
（2）安装完成后双击`RobotStudio_5.61.02注册补丁.reg`。
（3）打开RobotStudio即可完成安装。

## 初次测试

1. 打开RobotStudio软件，新建一个空工作站解决方案。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231142274-robotstudio-notes1-1.png)
2. 点击左上角ABB模型库，导入一个IRB 120确定
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231142220-robotstudio-notes1-2.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231142041-robotstudio-notes1-3.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231143834-robotstudio-notes1-4.png)
3. 然后点击机器人系统-从布局创建系统，选择一个6.03的软件版本
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231143475-robotstudio-notes1-5.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231143090-robotstudio-notes1-6.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231143933-robotstudio-notes1-7.png)
点击选项，将其中的默认语言改为中文，点击完成即可，稍等一段时间等待系统创建完成。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231144142-robotstudio-notes1-8.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231144741-robotstudio-notes1-9.png)
4. 当下方控制器状态变成绿色的时候说明系统已经创建完成了。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231144001-robotstudio-notes1-10.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231144900-robotstudio-notes1-11.png)
5. 点击上方 控制器-示教器-虚拟示教器
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231145793-robotstudio-notes1-12.png)
在弹出的示教器窗口，打开控制面板切换为手动并使能。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231145491-robotstudio-notes1-13.png)
6. 在机器人视图内，Ctrl+左键为平移，Ctrl+Shift+左键为旋转，调整视图，使虚拟示教器和机器人能够同时看到。
7. 点击菜单-程序编辑器，新建一个程序。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231145202-robotstudio-notes1-14.png)
添加一条MoveJ指令
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231145407-robotstudio-notes1-15.png)
长按示教器右边的箭头，使机器人转动一个角度，然后在下方再添加一条MoveJ指令。（一定要看示教器上访的状态，保证机器人是手动控制模式、电机开启)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231146603-robotstudio-notes1-16.png)
然后点击调试-PP移至Main，再点击右下方的运行按钮，即可看到机器人在起始位置和刚才转动的位置进行往复运动。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231146967-robotstudio-notes1-17.png)