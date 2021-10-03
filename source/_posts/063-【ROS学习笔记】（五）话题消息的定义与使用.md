---
title: 【ROS学习笔记】（五）话题消息的定义与使用
date: 2021-02-25 23:20:31
description: 在ROS Master中，可以发布与订阅已经定义好的消息，比如海龟的运动、位姿等信息。但有时我们需要自己定义消息的类型。本节主要目的为定义一个Person个人信息，Publisher发布个人信息，Subscriber订阅个人信息。
categories:
- 机器人
- ROS
tags:
- 笔记
- ros
---

### 一、目的

在ROS Master中，可以发布与订阅已经定义好的消息，比如海龟的运动、位姿等信息。但有时我们需要自己定义消息的类型。

本节主要目的为定义一个Person个人信息，Publisher发布个人信息，Subscriber订阅个人信息。

### 二、自定义话题消息

#### 1. 定义msg文件

在功能包`learning_topic`文件夹中新建一个文件夹`msg`，在此文件夹内创建一个`Person.msg`文件，在其中添加以下代码

```c
string name
uint8 sex
uint8 age

uint8 unknown=0
uint8 male=1
uint8 female=2
```

注：`uint8`和`string`，在不同程序里面需要扩展成对应的格式，因此需要先进行一些配置。
![](https://img-blog.csdnimg.cn/20210225230828509.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

#### 2. 在package.xml文件中添加功能包依赖

在文件末尾部分，添加如下代码

```xml
<build_depend>message_generation</build_depend><exec_depend>message_runtime</exec_depend>
```

build_depend，编译依赖，依赖一个动态产生message的功能包

exec_depend，执行依赖， 依赖message运行时间的功能包
![](https://img-blog.csdnimg.cn/20210225230941832.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

#### 3. 在CMakeLists.txt添加编译选项

首先在`find_package`内添加一条语句，用以添加依赖的功能包

```c++
find_package(catkin REQUIRED COMPONENTS
  geometry_msgs
  roscpp
  rospy
  std_msgs
  turtlesim
  message_generation
)
```
![](https://img-blog.csdnimg.cn/20210225231105190.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

在此函数下面再添加

```c++
add_message_files(
  FILES
  Person.msg
)

generate_messages(
  DEPENDENCIES
  std_msgs
)
```

add_message_files，将Person.msg作为定义的接口

generate_messages，在编译Person.msg文件时需要依赖的功能包
![](https://img-blog.csdnimg.cn/20210225231200743.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

然后在下方`catkin specific configuration`内的`catkin_packages`中，添加依赖`message_runtime`，修改后的代码如下：

```c++
catkin_package(
#  INCLUDE_DIRS include
#  LIBRARIES learning_topic
   CATKIN_DEPENDS geometry_msgs roscpp rospy std_msgs turtlesim message_runtime
#  DEPENDS system_lib
)
```
![](https://img-blog.csdnimg.cn/2021022523125917.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

#### 4. 编译生成相关文件

```bash
cd ~/catkin_ws
catkin_make
```

### 三、创建发布者

在`~/catkin_ws/src/learning_topic/src`文件夹下创建`person_publisher.cpp`文件，内容如下：

```c++
/**
 * 该例程将发布/person_info话题，自定义消息类型learning_topic::Person
 REFERENC:www.guyuehome.com.
 */
 
#include <ros/ros.h>
#include "learning_topic/Person.h"

int main(int argc, char **argv)
{
    // ROS节点初始化
    ros::init(argc, argv, "person_publisher");

    // 创建节点句柄
    ros::NodeHandle n;

    // 创建一个Publisher，发布名为/person_info的topic，消息类型为learning_topic::Person，队列长度10
    ros::Publisher person_info_pub = n.advertise<learning_topic::Person>("/person_info", 10);

    // 设置循环的频率
    ros::Rate loop_rate(1);

    int count = 0;
    while (ros::ok())
    {
        // 初始化learning_topic::Person类型的消息
    	learning_topic::Person person_msg;
		person_msg.name = "huffie";
		person_msg.age  = 21;
		person_msg.sex  = learning_topic::Person::male;

        // 发布消息
		person_info_pub.publish(person_msg);

       	ROS_INFO("Publish Person Info: name:%s  age:%d  sex:%d", 
				  person_msg.name.c_str(), person_msg.age, person_msg.sex);

        // 按照循环频率延时
        loop_rate.sleep();
    }

    return 0;
}
```

### 四、创建订阅者

在`~/catkin_ws/src/learning_topic/src`文件夹下创建`person_subscriber.cpp`文件，内容如下：

```c++
/**
 * 该例程将订阅/person_info话题，自定义消息类型learning_topic::Person
 REFERENC:www.guyuehome.com.
 */
 
#include <ros/ros.h>
#include "learning_topic/Person.h"

// 接收到订阅的消息后，会进入消息回调函数
void personInfoCallback(const learning_topic::Person::ConstPtr& msg)
{
    // 将接收到的消息打印出来
    ROS_INFO("Subcribe Person Info: name:%s  age:%d  sex:%d", 
			 msg->name.c_str(), msg->age, msg->sex);
}

int main(int argc, char **argv)
{
    // 初始化ROS节点
    ros::init(argc, argv, "person_subscriber");

    // 创建节点句柄
    ros::NodeHandle n;

    // 创建一个Subscriber，订阅名为/person_info的topic，注册回调函数personInfoCallback
    ros::Subscriber person_info_sub = n.subscribe("/person_info", 10, personInfoCallback);

    // 循环等待回调函数
    ros::spin();

    return 0;
}
```
![](https://img-blog.csdnimg.cn/2021022523161842.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 五、配置发布者/订阅者代码编译规则

在`CMakeLists.txt`文件的`build`区域内添加如下代码

```C++
add_executable(person_publisher src/person_publisher.cpp)
target_link_libraries(person_publisher ${catkin_LIBRARIES})
add_dependencies(person_publisher ${PROJECT_NAME}_generate_messages_cpp)

add_executable(person_subscriber src/person_subscriber.cpp)
target_link_libraries(person_subscriber ${catkin_LIBRARIES})
add_dependencies(person_subscriber ${PROJECT_NAME}_generate_messages_cpp)
```
![](https://img-blog.csdnimg.cn/20210225231750694.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 六、编译与运行

首先进行编译，回到主目录

```bash
cd ~/catkin_ws
catkin_make
```

运行roscore

```bash
roscore
```

运行订阅者Subscriber

```bash
rosrun learning_topic person_subscriber
```

运行发布者Publisher

```bash
rosrun learning_topic person_Publisher
```

可以看到发布者在发布个人信息，订阅者在接受信息。
![](https://img-blog.csdnimg.cn/20210225232005379.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)