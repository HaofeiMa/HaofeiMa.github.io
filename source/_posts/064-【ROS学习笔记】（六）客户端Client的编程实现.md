---
title: 【ROS学习笔记】（六）客户端Client的编程实现
date: 2021-02-26 16:39:35
description: 通过程序，发布服务请求。即通过客户端的请求，发给服务端产生一个海龟，反馈回客户端。回到catkin_ws/src文件夹下，创建一个名为learning_service的功能包。
categories:
- 机器人
- ROS
tags:
- 笔记
- ros
---

### 一、目的

通过程序，发布服务请求。

即通过客户端的请求，发给服务端产生一个海龟，反馈回客户端。

### 二、创建功能包

回到`catkin_ws/src`文件夹下，创建一个名为`learning_service`的功能包

```bash
cd ~/catkin_ws/src
catkin_create_pkg learning_service roscpp rospy std_msgs geometry_msgs turtlesim
```
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210226163117850.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 三、创建客户端代码

在`~/catkin_ws/src/learning_service/src`目录下创建一个`turtle_spawn.cpp`的文件，其内容为：

```c++
/**
 * 该例程将请求/spawn服务，服务数据类型turtlesim::Spawn
 REFERENC:www.guyuehome.com.
 */

#include <ros/ros.h>
#include <turtlesim/Spawn.h>

int main(int argc, char** argv)
{
    // 初始化ROS节点
	ros::init(argc, argv, "turtle_spawn");

    // 创建节点句柄
	ros::NodeHandle node;

    // 发现/spawn服务后，创建一个服务客户端，连接名为/spawn的service
	ros::service::waitForService("/spawn");
	ros::ServiceClient add_turtle = node.serviceClient<turtlesim::Spawn>("/spawn");

    // 初始化turtlesim::Spawn的请求数据
	turtlesim::Spawn srv;
	srv.request.x = 2.0;
	srv.request.y = 2.0;
	srv.request.name = "turtle2";

    // 请求服务调用
	ROS_INFO("Call service to spawn turtle[x:%0.6f, y:%0.6f, name:%s]", srv.request.x, srv.request.y, srv.request.name.c_str());

	add_turtle.call(srv);

	// 显示服务调用结果
	ROS_INFO("Spawn turtle successfully [name:%s]", srv.response.name.c_str());

	return 0;
};
```

代码👆的实现过程如下：

1. 初始化ROS节点
2. 创建一个Client实例
3. 发布服务请求数据
4. 等待Server处理之后的应答结果
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210226163345363.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 四、配置客户端代码编译规则

打开`learning_service`中的`CMakeLists.txt`，在图示区域添加代码

```bash
add_executable(turtle_spawn src/turtle_spawn.cpp)
target_link_libraries(turtle_spawn ${catkin_LIBRARIES})
```

add_executable添加编译规则，target_link_libraries链接一些需要的库
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210226163551809.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 五、编译与运行

进行编译

```bash
cd ~/catkin_ws
catkin_make
```
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210226163652374.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

运行客户端，可以看到产生了第二个小海龟

```bash
source devel/setup.bash
roscore
rosrun turtlesim turtlesim_node
rosrun learning_service turtle_spawn
```
![在这里插入图片描述](https://img-blog.csdnimg.cn/2021022616385125.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)