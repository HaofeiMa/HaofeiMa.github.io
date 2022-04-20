---
title: 【ROS学习笔记】（十）ROS中的坐标系管理系统
description: TF功能包用来管理所有的坐标系。它可以记录十秒钟之内所有坐标系之间的关系，可以展示夹取的物体相对于机器人中心坐标系的位置在哪里。
categories:
  - 机器人
  - ROS
tags:
  - 笔记
  - ROS
cover: 'https://img.mahaofei.com/img/202112231701727-ros-notes10-7.png'
abbrlink: 6c3b819e
date: 2021-03-01 15:33:04
updated: 2021-03-01 15:33:04
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

### 一、机器人中的坐标变换

TF功能包用来管理所有的坐标系。它可以记录十秒钟之内所有坐标系之间的关系，可以展示夹取的物体相对于机器人中心坐标系的位置在哪里。

### 二、举例：小海龟跟随实验

#### 1. 小海龟跟随

两只海龟出现之后，一只海龟在中心点，另一只海龟出现在下方，可以控制中心的海龟进行运动，下方的海龟会自动跟随我们控制的海龟进行运动

```bash
sudo apt-get install ros-noetic-turtle-tf
roslaunch turtle_tf turtle_tf_demo.launch
#rosrun turtlesim turtle_teleop_key
```
其中roslaunch用来启动脚本文件，启动其中的很多节点
其中的noetic为ROS版本号

在terminal中按方向键即可控制被跟随的乌龟。
![](https://img.mahaofei.com/img/202112231659245-ros-notes10-1.png)

> 如果ubuntu20.04 noetic版本出现报错可以参考下面的方法解决
> ```
> cd /usr/bin
> sudo rm -r python		# 有的可能没有这个文件，就省略这一步
> sudo cp python3 python
> ```
#### 2. 查看tf关系

```bash
rosrun tf view_frames
```

等待5秒，生成一个pdf文件，打开可以看到当前系统中tf坐标的位置关系。
![](https://img.mahaofei.com/img/202112231659486-ros-notes10-2.png)

其中world是全局坐标系，另外的turtle1和turtle2是两只海龟上的坐标系。例程的目的是使两个坐标系在坐标上是重叠的。

> 此步如果出错则需要执行修改报错的文件
> `sudo gedit /opt/ros/noetic/lib/tf/view_frames `
> 在第88行`print(vstr)`上方添加一句`vstr=str(vstr)`就可以了
#### 3. tf_echo坐标关系

```bash
rosrun tf tf_echo turtle1 turtle2
```

输出两个坐标系之间的关系，描述turtle2坐标系如何变换到turtle1坐标系。包括Translation平移和Rotation旋转（四元数、弧度、角度三种方式描述旋转）。
![](https://img.mahaofei.com/img/202112231659014-ros-notes10-3.png)

#### 4. rviz三维可视化显示平台

```bash
rosrun rviz rviz -d 'rospack find turtle_tf' /rviz/turtle_rviz.rviz
```

首先将左侧Fixed Frame改成world

点击左下方Add，添加一个TF，用来显示TF位置关系
![](https://img.mahaofei.com/img/202112231659046-ros-notes10-4.png)

控制海龟运动，可以看到图中两个坐标系在运动
![](https://img.mahaofei.com/img/202112231701272-ros-notes10-5.png)

### 三、TF坐标系广播与监听的编程实现
#### 1. 创建功能包

```bash
cd ~/catkin_ws/src
catkin_create_pkg learning_tf roscpp rospy tf turtlesim
```

#### 2. 创建tf广播器代码

打开`learning_tf/src/`目录，在其中创建一个`turtle_tf_broadcaster.cpp`

其内容为：

```c++
/**
 * 该例程产生tf数据，并计算、发布turtle2的速度指令
 * REFERENCE:www.guyuehome.com
 */

#include <ros/ros.h>
#include <tf/transform_broadcaster.h>
#include <turtlesim/Pose.h>

std::string turtle_name;

void poseCallback(const turtlesim::PoseConstPtr& msg)
{
	// 创建tf的广播器
	static tf::TransformBroadcaster br;

	// 初始化tf数据
	tf::Transform transform;
	transform.setOrigin( tf::Vector3(msg->x, msg->y, 0.0) );
	tf::Quaternion q;
	q.setRPY(0, 0, msg->theta);
	transform.setRotation(q);

	// 广播world与海龟坐标系之间的tf数据
	br.sendTransform(tf::StampedTransform(transform, ros::Time::now(), "world", turtle_name));
}

int main(int argc, char** argv)
{
    // 初始化ROS节点
	ros::init(argc, argv, "my_tf_broadcaster");

	// 输入参数作为海龟的名字
	if (argc != 2)
	{
		ROS_ERROR("need turtle name as argument"); 
		return -1;
	}

	turtle_name = argv[1];

	// 订阅海龟的位姿话题
	ros::NodeHandle node;
	ros::Subscriber sub = node.subscribe(turtle_name+"/pose", 10, &poseCallback);

    // 循环等待回调函数
	ros::spin();

	return 0;
};
```

#### 3. 创建监听器listener代码

同样的，再创建一个`turtle_tf_listener.cpp`，其内容为

```c++
/**
 * 该例程监听tf数据，并计算、发布turtle2的速度指令
 * REFERENCE:www.guyuehome.com
 */

#include <ros/ros.h>
#include <tf/transform_listener.h>
#include <geometry_msgs/Twist.h>
#include <turtlesim/Spawn.h>

int main(int argc, char** argv)
{
	// 初始化ROS节点
	ros::init(argc, argv, "my_tf_listener");

    // 创建节点句柄
	ros::NodeHandle node;

	// 请求产生turtle2
	ros::service::waitForService("/spawn");
	ros::ServiceClient add_turtle = node.serviceClient<turtlesim::Spawn>("/spawn");
	turtlesim::Spawn srv;
	add_turtle.call(srv);

	// 创建发布turtle2速度控制指令的发布者
	ros::Publisher turtle_vel = node.advertise<geometry_msgs::Twist>("/turtle2/cmd_vel", 10);

	// 创建tf的监听器
	tf::TransformListener listener;

	ros::Rate rate(10.0);
	while (node.ok())
	{
		// 获取turtle1与turtle2坐标系之间的tf数据
		tf::StampedTransform transform;
		try
		{
			listener.waitForTransform("/turtle2", "/turtle1", ros::Time(0), ros::Duration(3.0));
			listener.lookupTransform("/turtle2", "/turtle1", ros::Time(0), transform);
		}
		catch (tf::TransformException &ex) 
		{
			ROS_ERROR("%s",ex.what());
			ros::Duration(1.0).sleep();
			continue;
		}

		// 根据turtle1与turtle2坐标系之间的位置关系，发布turtle2的速度控制指令
		geometry_msgs::Twist vel_msg;
		vel_msg.angular.z = 4.0 * atan2(transform.getOrigin().y(),
				                        transform.getOrigin().x());
		vel_msg.linear.x = 0.5 * sqrt(pow(transform.getOrigin().x(), 2) +
				                      pow(transform.getOrigin().y(), 2));
		turtle_vel.publish(vel_msg);

		rate.sleep();
	}
	return 0;
};
```

#### 4. 配置tf广播器与监听器代码编译规则

配置`learning_tf`中的`CMakeLists.txt`，在图示位置添加如下代码

```c++
add_executable(turtle_tf_broadcaster src/turtle_tf_broadcaster.cpp)
target_link_libraries(turtle_tf_broadcaster ${catkin_LIBRARIES})

add_executable(turtle_tf_listener src/turtle_tf_listener.cpp)
target_link_libraries(turtle_tf_listener ${catkin_LIBRARIES})
```
![](https://img.mahaofei.com/img/202112231701891-ros-notes10-6.png)

即分别把两个cpp文件编译成两个可执行文件，然后对库进行链接。

#### 5. 编译

```bash
cd ~/catkin_ws
catkin_make
```

#### 6. 运行程序

以下程序每一行均需要一个单独的terminal运行。

```bash
roscore
rosrun turtlesim turtlesim_node
rosrun learning_tf turtle_tf_broadcaster __name:=turtle1_tf_broadcaster /turtle1
rosrun learning_tf turtle_tf_broadcaster __name:=turtle2_tf_broadcaster /turtle2
rosrun learning_tf turtle_tf_listener
rosrun turtlesim turtle_teleop_key
```

![](https://img.mahaofei.com/img/202112231701727-ros-notes10-7.png)