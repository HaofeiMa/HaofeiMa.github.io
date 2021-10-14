---
title: 【ROS学习笔记】（三）发布者Publisher的实现
date: 2021-02-24 21:49:24
description: ROS Master内有两个节点，一个是Subscriber(turtlesim)，一个是Publisher，发布者通过程序实现发布Message，Message的内容包括线速度、角度，通过Topic管道，传递给Subscriber，从而控制小海龟的运动。
categories:
- 机器人
- ROS
tags:
- 笔记
- ros
---

### 一、目标功能

ROS Master内有两个节点，一个是Subscriber(turtlesim)，一个是Publisher，发布者通过程序实现发布Message，Message的内容包括线速度、角度，通过Topic管道，传递给Subscriber，从而控制小海龟的运动。

### 二、创建功能包

首先先创建一个工作空间，具体参考上一节[【ROS学习笔记】（二）工作空间与功能包的创建](https://blog.csdn.net/weixin_44543463/article/details/113985223)

然后创建一个功能包

```bash
cd ~/catkin_ws/src
catkin_create_pkg learning_topic roscpp rospy std_msgs geometry_msgs turtlesim
```
![](https://img-blog.csdnimg.cn/20210224213435285.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 三、创建发布者代码

进入功能包的src文件夹下，创建一个cpp文件（也可以在图形界面直接创建）

```
cd ~/catkin_ws/src/learning_topic/src
touch velocity_publisher.cpp
sudo gedit velocity_publisher.cpp
```

输入以下代码

```c
/**
 * 该例程将发布turtle1/cmd_vel话题，消息类型geometry_msgs::Twist
 */
 
#include <ros/ros.h>
#include <geometry_msgs/Twist.h>

int main(int argc, char **argv)
{
	// ROS节点初始化
	ros::init(argc, argv, "velocity_publisher");

	// 创建节点句柄
	ros::NodeHandle n;

	// 创建一个Publisher，发布名为/turtle1/cmd_vel的topic，消息类型为geometry_msgs::Twist，队列长度10
	ros::Publisher turtle_vel_pub = n.advertise<geometry_msgs::Twist>("/turtle1/cmd_vel", 10);

	// 设置循环的频率
	ros::Rate loop_rate(10);

	int count = 0;
	while (ros::ok())
	{
	    // 初始化geometry_msgs::Twist类型的消息
		geometry_msgs::Twist vel_msg;
		vel_msg.linear.x = 0.5;
		vel_msg.angular.z = 0.2;

	    // 发布消息
		turtle_vel_pub.publish(vel_msg);
		ROS_INFO("Publsh turtle velocity command[%0.2f m/s, %0.2f rad/s]", 
				vel_msg.linear.x, vel_msg.angular.z);

	    // 按照循环频率延时
	    loop_rate.sleep();
	}

	return 0;
}
```
![](https://img-blog.csdnimg.cn/20210224213513448.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 四、配置发布者代码编译规则

1. 设置需要编译的代码和生成的可执行文件

2. 设置链接库

在`Learning_topic/CMakeList.txt`文件的Build下方（Install上方），添加代码如下

```bash
add_executable(velocity_publisher src/velocity_publisher.cpp)	#描述要把哪个程序文件编译成哪个可执行文件
target_link_libraries(velocity_publisher ${catkin_LIBRARIES})	#把可执行文件和库做链接
```
![](https://img-blog.csdnimg.cn/20210224213733508.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 五、编译并运行发布者Publisher

#### 1. 编译

```bash
cd ~/catkin_ws
catkin_make
source devel/setup.bash
```

> 可以在`~/.bashrc`文件最后添加source语句，这样就不用每次再在终端输入source命令创建环境变量（路径中替换成自己的用户名）
> ```bash
> source /home/【Username】/catkin_ws/devel/setup.bash
> ```

![](https://img-blog.csdnimg.cn/20210224213913493.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
#### 2. 运行

```bash
roscore
rosrun turtlesim turtlesim_node
rosrun learning_topic velocity_publisher
```

![](https://img-blog.csdnimg.cn/20210224214729896.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
>参考教程：**古月ROS入门21讲**
>GitHub：[https://github.com/guyuehome/ros_21_tutorials](https://github.com/guyuehome/ros_21_tutorials)
>Bilibili：[https://www.bilibili.com/video/BV1zt411G7Vn](https://www.bilibili.com/video/BV1zt411G7Vn)