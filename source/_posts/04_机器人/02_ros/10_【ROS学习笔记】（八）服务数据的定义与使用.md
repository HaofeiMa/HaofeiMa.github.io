---
title: 【ROS学习笔记】（八）服务数据的定义与使用
description: Client每Request一次数据请求，Server发送一次数据。数据格式为个人信息，如姓名、性别等。
categories:
  - 机器人
  - ROS
tags:
  - 笔记
  - ROS
cover: 'https://img.mahaofei.com/img/202112231655403-ros-notes8-8.png'
abbrlink: 65ca30a6
date: 2021-02-28 08:52:16
updated: 2021-02-28 08:52:16
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

### 一、目的

Client每Request一次数据请求，Server发送一次数据。数据格式为个人信息，如姓名、性别等。

### 二、自定义服务数据

此步骤与[话题消息的定义与使用](https://blog.csdn.net/weixin_44543463/article/details/114108345)过程类似

#### 1. 定义srv文件

再`learning_service`文件夹下新建一个文件夹`srv`，再在`srv`文件夹内新建一个`Person.srv`文件，内容如下

```c++
string name
uint8  age
uint8  sex

uint8 unknown = 0
uint8 male    = 1
uint8 female  = 2

---
string result
```

---以上是request的数据，---以下是response的数据
![](https://img.mahaofei.com/img/202112231654771-ros-notes8-1.png)

#### 2. 在package.xml中添加功能包依赖

打开`learning_service/package.xml`，在文件最后部分添加如下代码

```xml
  <build_depend>message_generation</build_depend>
  <exec_depend>message_runtime</exec_depend>
```
![](https://img.mahaofei.com/img/202112231654282-ros-notes8-2.png)

#### 3. 在CMakeLists.txt中添加编译选项

首先在`find_package`最后一行添加一条语句`message_generation`，用以添加依赖的功能包

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
![](https://img.mahaofei.com/img/202112231654047-ros-notes8-3.png)

在此函数下面再添加

```c++
add_service_files(
  FILES
  Person.srv
)

generate_messages(
  DEPENDENCIES
  std_msgs
)
```

add_message_files，将Person.srv作为定义的接口

generate_messages，在编译Person.srv文件时需要依赖的功能包
![](https://img.mahaofei.com/img/202112231654750-ros-notes8-4.png)


然后在下方`catkin specific configuration`内的`catkin_packages`中，添加依赖`message_runtime`，修改后的代码如下：

```c++
catkin_package(
#  INCLUDE_DIRS include
#  LIBRARIES learning_topic
   CATKIN_DEPENDS geometry_msgs roscpp rospy std_msgs turtlesim message_runtime
#  DEPENDS system_lib
)
```
![](https://img.mahaofei.com/img/202112231655676-ros-notes8-5.png)

#### 4. 编译生成相关文件

```bash
cd ~/catkin_ws
catkin_make
```

### 三、创建服务器代码

在`~/catkin_ws/src/learning_service/src`目录下创建一个person_server.cpp`的文件

```c++
/**
 * 该例程将执行/show_person服务，服务数据类型learning_service::Person
REFERENCE:www.guyuehome.com
 */
 
#include <ros/ros.h>
#include "learning_service/Person.h"

// service回调函数，输入参数req，输出参数res
bool personCallback(learning_service::Person::Request  &req,
         			learning_service::Person::Response &res)
{
    // 显示请求数据
    ROS_INFO("Person: name:%s  age:%d  sex:%d", req.name.c_str(), req.age, req.sex);

	// 设置反馈数据
	res.result = "OK";

    return true;
}

int main(int argc, char **argv)
{
    // ROS节点初始化
    ros::init(argc, argv, "person_server");

    // 创建节点句柄
    ros::NodeHandle n;

    // 创建一个名为/show_person的server，注册回调函数personCallback
    ros::ServiceServer person_service = n.advertiseService("/show_person", personCallback);

    // 循环等待回调函数
    ROS_INFO("Ready to show person informtion.");
    ros::spin();

    return 0;
}
```

### 四、创建客户端代码

同样在`~/catkin_ws/src/learning_service/src`目录下创建一个`person_client.cpp`的文件，其内容为：

```c++
/**
 * 该例程将请求/show_person服务，服务数据类型learning_service::Person
REFERENCE:www.guyuehome.com
 */

#include <ros/ros.h>
#include "learning_service/Person.h"

int main(int argc, char** argv)
{
    // 初始化ROS节点
	ros::init(argc, argv, "person_client");

    // 创建节点句柄
	ros::NodeHandle node;

    // 发现/spawn服务后，创建一个服务客户端，连接名为/spawn的service
	ros::service::waitForService("/show_person");
	ros::ServiceClient person_client = node.serviceClient<learning_service::Person>("/show_person");

    // 初始化learning_service::Person的请求数据
	learning_service::Person srv;
	srv.request.name = "Huffie";
	srv.request.age  = 21;
	srv.request.sex  = learning_service::Person::Request::male;

    // 请求服务调用
	ROS_INFO("Call service to show person[name:%s, age:%d, sex:%d]", 
			 srv.request.name.c_str(), srv.request.age, srv.request.sex);

	person_client.call(srv);

	// 显示服务调用结果
	ROS_INFO("Show person result : %s", srv.response.result.c_str());

	return 0;
};
```
![](https://img.mahaofei.com/img/202112231655990-ros-notes8-6.png)

### 五、配置服务器/客户端代码编译规则

打开`learning_service`中的`CMakeLists.txt`，在图示区域添加代码

```c++
add_executable(person_server src/person_server.cpp)
target_link_libraries(person_server ${catkin_LIBRARIES})
add_dependencies(person_server ${PROJECT_NAME}_gencpp)

add_executable(person_client src/person_client.cpp)
target_link_libraries(person_client ${catkin_LIBRARIES})
add_dependencies(person_client ${PROJECT_NAME}_gencpp)
```
![](https://img.mahaofei.com/img/202112231655263-ros-notes8-7.png)

### 六、编译并运行发布者和订阅者

首先进行编译

```bash
cd catkin_ws
catkin_make
```

运行发布者和订阅者

```bash
roscore
rosrun learning_service person_server
rosrun learning_service person_client
```

client每请求一次，会接受到一次数据
![](https://img.mahaofei.com/img/202112231655403-ros-notes8-8.png)