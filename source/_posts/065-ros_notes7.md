---
title: 【ROS学习笔记】（七）服务端Server的实现
date: 2021-02-26 16:46:52
description: Server端等待信号，每次接收到Client端的信号，海龟的运动状态就切换一次（运动→停止、停止→运动）。
categories:
- 机器人
- ROS
tags:
- 笔记
- ros
---

### 一、目的

Server端等待信号，每次接收到Client端的信号，海龟的运动状态就切换一次（运动→停止、停止→运动）

### 二、创建服务器代码

在`~/catkin_ws/src/learning_service/src`目录下创建一个`turtle_command_server.cpp`的文件

```c++
/**
 * 该例程将执行/turtle_command服务，服务数据类型std_srvs/Trigger
 REFERENCE:www.guyuehome.com
 */
 
#include <ros/ros.h>
#include <geometry_msgs/Twist.h>
#include <std_srvs/Trigger.h>

ros::Publisher turtle_vel_pub;
bool pubCommand = false;

// service回调函数，输入参数req，输出参数res
bool commandCallback(std_srvs::Trigger::Request  &req,
         			std_srvs::Trigger::Response &res)
{
	pubCommand = !pubCommand;

    // 显示请求数据
    ROS_INFO("Publish turtle velocity command [%s]", pubCommand==true?"Yes":"No");

	// 设置反馈数据
	res.success = true;
	res.message = "Change turtle command state!";

    return true;
}

int main(int argc, char **argv)
{
    // ROS节点初始化
    ros::init(argc, argv, "turtle_command_server");

    // 创建节点句柄
    ros::NodeHandle n;

    // 创建一个名为/turtle_command的server，注册回调函数commandCallback
    ros::ServiceServer command_service = n.advertiseService("/turtle_command", commandCallback);

	// 创建一个Publisher，发布名为/turtle1/cmd_vel的topic，消息类型为geometry_msgs::Twist，队列长度10
	turtle_vel_pub = n.advertise<geometry_msgs::Twist>("/turtle1/cmd_vel", 10);

    // 循环等待回调函数
    ROS_INFO("Ready to receive turtle command.");

	// 设置循环的频率
	ros::Rate loop_rate(10);

	while(ros::ok())
	{
		// 查看一次回调函数队列
    	ros::spinOnce();
		
		// 如果标志为true，则发布速度指令
		if(pubCommand)
		{
			geometry_msgs::Twist vel_msg;
			vel_msg.linear.x = 0.5;
			vel_msg.angular.z = 0.2;
			turtle_vel_pub.publish(vel_msg);
		}

		//按照循环频率延时
	    loop_rate.sleep();
	}

    return 0;
}
```

实现过程：

1. 初始化ROS节点
2. 创建Server实例
3. 循环等待服务请求，进入回调函数
4. 在回调函数中完成服务功能的处理，并反馈应答数据
![](https://img-blog.csdnimg.cn/20210226164237476.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 三、配置服务器代码编译规则

打开`learning_service`中的`CMakeLists.txt`，在图示区域添加代码

```c++
add_executable(turtle_command_server src/turtle_command_server.cpp)
target_link_libraries(turtle_command_server ${catkin_LIBRARIES})
```

把turtle_command_server.cpp编译成turtle_command_server文件，同时去链接需要依赖的库文件。
![](https://img-blog.csdnimg.cn/20210226164340627.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 四、编译并运行

编译服务器

```bash
cd ~/catkin_ws
cadkin_make
```

生效环境变量（如果已经在`.bashrc`中[添加了环境变量](https://blog.csdn.net/weixin_44543463/article/details/113985223)则不需要再执行此步）

```bash
source devel/setup.bash
```

再运行以下代码（以下三行需要各自启动一个终端）

```bash
roscore
rosrun turtlesim turtlesim_node
rosrun learning_service turtle_command_server
```

再启动一个终端，输入代码`rosservice call /turtle_command+空格+两次Tab`发送信号，海龟开始运动，**再次发送同样的信号**，小海龟停止。

![](https://img-blog.csdnimg.cn/20210226164637534.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)