---
title: 【ROS学习笔记】（九）参数的使用与编程方法
date: 2021-02-28 12:06:13
description: 在ROS Master中有一个Parameter Server参数服务器，它是一个全局字典，用来保存各种配置参数，配置参数是各个节点都可以全局访问的。
categories:
- 机器人
- ROS
tags:
- 笔记
- ros
---

### 一、参数模型

在ROS Master中有一个Parameter Server参数服务器，它是一个全局字典，用来保存各种配置参数，配置参数是各个节点都可以全局访问的。

### 二、使用方法

#### 1. 列出当前所有参数

```bash
rosparam list
```

#### 2. 显示某个参数值

```bash
rosparam get param_key
```

#### 3. 设置某个参数值

```bash
rosparam set param_key param_value
```

#### 4. 保存参数到文件

```bash
rosparam dump file_name
```

#### 5. 从文件读取参数

```bash
rosparam load file_name
```

#### 6. 删除参数

```bash
rosparam delete param_key
```



### 三、举例

#### 1. 创建功能包

```bash
cd ~/catkin_ws/src
catkin_create_pkg learning_parameter roscpp rospy std_srvs
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231656763-ros-notes9-1.png)

#### 2. 打开小海龟仿真器

打开一个终端，启动roscore：

```bash
roscore
```

再打开一个终端，运行小海龟仿真程序

```bash
rosrun turtlesim turtlesim_node
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231656152-ros-notes9-2.png)

#### 3. rosparam命令行的使用

（1）查看参数列表

```bash
rosparam list
```

（2）得到变量的值：背景颜色RGB的值

```bash
rosparam get /turtlesim/background_r
rosparam get /turtlesim/background_g
rosparam get /turtlesim/background_b
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231656272-ros-notes9-3.png)

（3）修改变量的值：更改背景颜色

```bash
rosparam set /turtlesim/background_b 100
```

重新发送请求，刷新背景颜色

```bash
rosservice call /clear "{}"
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231656088-ros-notes9-4.png)

（4）保存参数到文件

```bash
rosparam dump param.yaml
```

参数默认保存到当前目录
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231657663-ros-notes9-5.png)

（5）加载参数文件

打开刚刚保存的参数文件，对其中的参数值进行修改。

```bash
rosparam load param.yaml
```

即可将文件里面的参数内容修改系统内的参数。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231657124-ros-notes9-6.png)

（6）删除参数

```bash
rosparam delete /turtlesim/background_g
```


查看参数列表

```bash
rosparam list
```

刷新小海龟仿真器背景颜色

```bash
rosservice call /clear "{}"
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231657366-ros-notes9-7.png)

### 四、通过程序获取、设置参数的值

#### 1. 编写cpp程序

在learning_parameter/src/目录下创建一个`parameter_config.cpp`的文件

其内容为：

```c++
/**
 * 该例程设置/读取海龟例程中的参数
 * REFERENCE：www.guyuehome.com
 */
#include <string>
#include <ros/ros.h>
#include <std_srvs/Empty.h>

int main(int argc, char **argv)
{
	int red, green, blue;

    // ROS节点初始化
    ros::init(argc, argv, "parameter_config");

    // 创建节点句柄
    ros::NodeHandle node;

    // 读取背景颜色参数
	ros::param::get("/turtlesim/background_r", red);
	ros::param::get("/turtlesim/background_g", green);
	ros::param::get("/turtlesim/background_b", blue);

	ROS_INFO("Get Backgroud Color[%d, %d, %d]", red, green, blue);

	// 设置背景颜色参数
	ros::param::set("/turtlesim/background_r", 255);
	ros::param::set("/turtlesim/background_g", 255);
	ros::param::set("/turtlesim/background_b", 255);

	ROS_INFO("Set Backgroud Color[255, 255, 255]");

    // 读取背景颜色参数
	ros::param::get("/turtlesim/background_r", red);
	ros::param::get("/turtlesim/background_g", green);
	ros::param::get("/turtlesim/background_b", blue);

	ROS_INFO("Re-get Backgroud Color[%d, %d, %d]", red, green, blue);

	// 调用服务，刷新背景颜色
	ros::service::waitForService("/clear");
	ros::ServiceClient clear_background = node.serviceClient<std_srvs::Empty>("/clear");
	std_srvs::Empty srv;
	clear_background.call(srv);
	
	sleep(1);

    return 0;
}
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231658670-ros-notes9-8.png)

#### 2. 编译程序

打开`learning_parameter/`下的`CMakeList.txt`文件，在其中添加编译规则。(install上方)

```c++
add_executable(parameter_config src/parameter_config.cpp)
target_link_libraries(parameter_config ${catkin_LIBRARIES})
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231658934-ros-notes9-9.png)

进行编译

```bash
cd catkin_ws
catkin_make
```

#### 3. 运行程序

运行roscore

```bash
roscore
```

运行小海龟仿真程序

```bash
rosrun turtlesim turtlesim_node
```

运行刚才编写的节点

```bash
rosrun learning_parameter parameter_config
```

发现小海龟的颜色被改变了，说明程序执行成功
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231658716-ros-notes9-10.png)