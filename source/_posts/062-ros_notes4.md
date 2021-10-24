---
title: 【ROS学习笔记】（四）订阅者Subscriber的实现
date: 2021-02-24 22:24:46
description: 在ROS Master中，可以发布与订阅消息，ROS Master内有两个节点，一个是Subscriber(turtlesim)，一个是Publisher，发布者通过程序实现发布Message，Message的内容包括线速度、角度，通过Topic管道，传递给Subscriber，从而控制小海龟的运动。
categories:
- 机器人
- ROS
tags:
- 笔记
- ros

description: 订阅者订阅海龟的位姿信息首先创建工作空间，参【ROS学习笔记】（二）工作空间与功能包的创建，然后用如下代码然后创建一个功能包。进入功能包的src文件夹下...



### 一、目标功能

订阅者订阅海龟的位姿信息。

### 二、创建功能包
首先创建工作空间，参考[【ROS学习笔记】（二）工作空间与功能包的创建](https://blog.csdn.net/weixin_44543463/article/details/113985223)

然后创建一个功能包

```bash
cd ~/catkin_ws/src
catkin_creat_pkg learning_topic roscpp rospy std_msgs geometry_msgs turtlesim
```

### 三、创建订阅者代码

进入功能包的src文件夹下，创建一个cpp文件（也可以在图形界面直接创建）

```
cd ~/catkin_ws/src/learning_topic/src
touch pose_subscriber.cpp
sudo gedit pose_subscriber.cpp
```

输入以下代码

```bash
/***********************************************************************
Copyright 2020 GuYueHome (www.guyuehome.com).
***********************************************************************/

/**
 * 该例程将订阅/turtle1/pose话题，消息类型turtlesim::Pose
 */
 
#include <ros/ros.h>
#include "turtlesim/Pose.h"

// 接收到订阅的消息后，会进入消息回调函数
void poseCallback(const turtlesim::Pose::ConstPtr& msg)
{
    // 将接收到的消息打印出来
    ROS_INFO("Turtle pose: x:%0.6f, y:%0.6f", msg->x, msg->y);
}

int main(int argc, char **argv)
{
    // 初始化ROS节点
    ros::init(argc, argv, "pose_subscriber");

    // 创建节点句柄
    ros::NodeHandle n;

    // 创建一个Subscriber，订阅名为/turtle1/pose的topic，注册回调函数poseCallback
    ros::Subscriber pose_sub = n.subscribe("/turtle1/pose", 10, poseCallback);

    // 循环等待回调函数
    ros::spin();

    return 0;
}
```

代码思路：

1. 初始化ROS节点
2. 订阅需要的话题
3. 循环等待话题消息，接收到消息后进入回调函数
4. 在回调函数中完成消息处理
![](https://img-blog.csdnimg.cn/20210224221639124.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 四、配置订阅者代码编译规则

1. 设置需要编译的代码和生成的可执行文件

2. 设置链接库

在`Learning_topic/CMakeList.txt`文件的Build下方（Install上方），添加代码如下

```bash
add_executable(pose_subscriber src/pose_subscriber.cpp)		#描述要把哪个程序文件编译成哪个可执行文件
target_link_libraries(pose_subscriber ${catkin_LIBRARIES})	#把可执行文件和库做链接
```
![](https://img-blog.csdnimg.cn/20210224221910627.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 五、编译并运行订阅者SubScriber

#### 1. 编译

```bash
cd ~/catkin_ws
catkin_make
source devel/setup.bash
```

> 可以在[.bash]文件最后添加source语句，这样就不用每次再在终端输入source命令
>
> sudo vim ~/catkin_ws
> source /home/huffie/catkin_ws/devel/setup.bash

#### 2. 运行
打开小海龟的仿真程序，运行subscriber，同时让小海龟动起来，可以看到姿态坐标在实时改变。
```bash
roscore
rosrun turtlesim turtlesim_node
rosrun learning_topic pose_subscriber
rosrun turtlesim turtle_teleop_key
```
![](https://img-blog.csdnimg.cn/2021022422230869.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)