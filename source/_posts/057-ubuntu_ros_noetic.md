---
title: Ubuntu20.04安装ROS Noetic
date: 2021-02-20 00:09:51
description: 添加ROS软件源，打开软件与更新，将下载选项前四个都选上。一定要确保都勾选上，不然后续安装时会出现依赖关系问题。然后执行以下命令添加软件源，并添加公钥。
categories:
- 机器人
- ROS
tags:
- ubuntu
- ros
---






> 本文参考ros官网[http://wiki.ros.org/](http://wiki.ros.org/)的有关[安装教程](http://wiki.ros.org/noetic/Installation/Ubuntu)
### 一、准备工作
#### 1. 添加ROS软件源
打开软件与更新，将下载选项前四个都选上。
**一定要确保都勾选上，不然后续安装时会出现依赖关系问题**
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231642871-ubuntu-ros-1.png)
然后执行以下命令添加软件源

```bash
sudo sh -c 'echo "deb https://mirrors.tuna.tsinghua.edu.cn/ros/ubuntu $(lsb_release -sc) main" > /etc/apt/sources.list.d/ros-latest.list'
```
#### 2. 添加公钥
```bash
sudo apt-key adv --keyserver 'hkp://keyserver.ubuntu.com:80' --recv-key C1CF6E31E6BADE8868B172B4F42ED6FBAB17C654
```
#### 3. 更新索引
```bash
sudo apt-get update
```
### 二、安装ROS
#### 1. 安装ROS
建议安装桌面完整版
```bash
sudo apt install ros-noetic-desktop-full
```
#### 2. 设置环境变量
```bash
echo "source /opt/ros/noetic/setup.bash" >> ~/.bashrc
source ~/.bashrc
```
#### 3. 初始化rosdep
在使用许多ROS工具之前，需要初始化rosdep。rosdep是运行ROS中某些核心组件所必需的，首先安装rosdep
```bash
sudo apt install python3-rosdep
```
然后进行初始化
```bash
sudo rosdep init
rosdep update
```
> rosdep init如果出现【ERROR: cannot download default sources list from:...
> Website may be down.】
>  rosdep update如果出现超时问题
>  以上两个问题的都可以通过修改host主机解决，只是update的问题在修改主机后，还要求网络必须可靠
> 参考博客：[https://blog.csdn.net/weixin_44543463/article/details/113875658](https://blog.csdn.net/weixin_44543463/article/details/113875658)
#### 4. 安装其它工具和依赖包
```bash
sudo apt install python3-rosdep python3-rosinstall python3-rosinstall-generator python3-wstool build-essential
```
### 三、测试
**打开**终端，输入`roscore`，运行ros
**再打开**一个新终端，输入：`rosrun turtlesim turtlesim_node`，可以看到小乌龟的仿真界面已经打开了。**再打开**一个新终端输入指令：`rosrun turtlesim turtle_teleop_key`，可以在这个key终端内，通过键盘的方向键控制小乌龟在界面中移动
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231643691-ubuntu-ros-2.png)