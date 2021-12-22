---
title: ROS系统基本功能的使用详解（基本指令/节点/服务/启动文件/动态参数）
date: 2021-09-16 20:01:33
description: 本文从创建工作空间和功能包开始，介绍了其创建步骤和编译方法，并详细汇总了ros的常用指令。然后分别通过具体案例详细讲解了节点、服务、启动文件以及动态参数的创建方法和使用效果。
categories:
- 机器人
- ROS
tags:
- 实验
- ros
---

## 一、创建工作空间
**1. 新建文件夹**
新建一个`catkin_ws`的文件夹，并在里面创建`src`子目录。

```bash
mkdir -p ~/dev/catkin_ws/src
cd ~/dev/catkin_ws/src
```

**2. 初始化工作空间**
在刚创建的src子目录中，使用如下命令创建工作空间，但此时工作空间中还没有任何功能包，只有CMakeLists.txt。

```bash
catkin_init_workspace
```

**3. 编译工作空间**
回到工作空间的顶层目录`catkin_ws`文件夹中，使用`catkin_make`命令执行编译。编译完成后使用`ll`指令可以看到生成了`build`和`devel`两个文件夹。
```bash
cd ..
catkin_make
```

**4. 完成配置**
重新加载`setup.bash`文件，完成工作空间创建的最后一步配置
```bash
source devel/setup.bash
```
其实如果你在`~/.bashrc`中加入了此命令行，就可以通过重启终端得到同样的效果，添加命令如下，其中`noetic`是我的ros系统的版本号，如果你的版本不同，务必更改。
```bash
echo "source /opt/ros/noetic/setup.bash" >> ~/.bashrc
```

## 二、创建与编译ROS功能包
**1. 创建功能包**
功能包可以通过手动方式创建，但为了方便，通常会使用`catkin_create_pkg`命令创建功能包，此命令的格式如下
```bash
catkin_create_pkg [package_name] [depend1] [depend2] [depend3]
```
其中的depend依赖项包括：
* `std_msgs`：包含常见的消息类型，表示基本数据类型和其他基本的消息构造。
* `roscpp`：使用C++编写ROS的各种功能。

```bash
例：
cd ~dev/catkin_ws/src
catkin_create_pkg test_package std_msgs roscpp
```

**2. 编译功能包**
回到`catkin_ws`文件夹下执行编译操作，如果没有报错，则说明功能包编译成功。
```bash
cd ..
catkin_make
```

## 三、ROS的基本命令
### 3.1 节点
**1. rosnode指令**
rosnode工具可以打印ROS节点的相关信息，具体命令如下：
| rosnode指令         | 作用                           |      |
| ------------------- | ------------------------------ | ---- |
| `rosnode ping NODE` | 测试节点的连通性               |      |
| `rosnode list`      | 列出活动节点                   |      |
| `rosnode info NODE` | 输出此节点的信息               |      |
| `rosnode machine`   | 打印运行在特定计算机中的节点   |      |
| `rosnode kill NODE` | 结束节点进程                   |      |
| `rosnode cleanup`   | 将无法访问的节点的注册信息清除 |      |


**2. 运行节点**
首先使用`roscore`指令启动ros程序，然后再打开一个新的终端窗口执行接下来的操作。

我们可以使用`rosrun`指令运行一个节点
```bash
例：
rosrun turtlesim turtlesim_node
```
节点成功运行后再次使用`rosnode list`可以看到正在运行的节点，使用`rosnode info /turtlesim`可以查看此节点的详细信息，包括发布（Publications）、订阅（Subscriptions）以及节点具有的服务（Services）等。

### 3.2 主题

**1. rostopic指令**
节点可以通过发布主题和订阅主题实现数据的传输，通过主题的消息传输不需要节点直接连接，一个主题可以有多个订阅者和多个发布者。要实现主题与节点之间的交互，可以使用rostopic指令。

| rostopic指令          | 作用                   |
| --------------------- | ---------------------- |
| `rostopic bw TOPIC`   | 显示主题所用的带宽     |
| `rostopic echo TOPIC` | 将主题的消息输出到屏幕 |
| `rostopic find TOPIC` | 查找主题               |
| `rostopic hz TOPIC`   | 显示主题发布频率       |
| `rostopic info TOPIC` | 输出主题详细信息       |
| `rostopic list TOPIC` | 列出活动主题           |
| `rostopic pubs TOPIC` | 将数据发布到主题       |
| `rostopic type TOPIC` | 输出主题的类型         |

**2. 发布主题**
可以通过`rostopic list`列出当前节点的主题。通过echo参数可以打印节点发出的消息，如：`rostopic echo /turtle1/cmd_vel`。

此外，我们也可以直接通过`rostopic pub`发布主题，如下：
```bash
例：
rostopic pub -r 10 /turtle1/cmd_vel geometry_msgs/Twist -r 1 -- '{linear: {x: 1, y: 0, z: 0}, angular: {x: 0, y: 0, z: 1}}'
```

<img src="https://img-blog.csdnimg.cn/1f6e2b4e95e546e3a7cc807a8c54ed63.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center" width="40%">


### 3.3 服务
**1. rosservice指令**
服务是节点之间相互通信的另一种方法，服务允许节点发送请求和接受响应。可以使用rosservice指令操作服务。

* `roservice args /service`：输出服务参数
* `rosservice call /service`：根据命令行参数调用服务
* `rosservice find msgtype`：根据服务类型查询服务
* `rosservice info /service`：输出服务信息
* `rosservice list`：列出活动服务清单
* `rosservice type /service`：输出服务类型
* `rosservice uri /service`：输出ROSRPC URI服务

**2. 服务的使用**
使用`rosservice list`可以列出所有的服务，使用`rosservice call [service] [args]`可以调用某个服务，例如`rosservice call /clear`可以清除海龟图上的线条。

此外，使用`rossrv show turtlesim/Spawn`可以查看/spawn服务的详细参数。
![](https://img-blog.csdnimg.cn/88aaaecaf3484a70a386822ea71f4409.png#pic_center)
通过这些参数就可以调用/spawn服务创建第二只海龟。

```bash
rosservice call /spawn 3 3 0.5 "new_turtle"
```

<img src="https://img-blog.csdnimg.cn/ac96dba8d73e4f2b8993c5b3080d68b4.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center" width="40%">

### 3.4 参数服务器
**1. rosparam指令**
参数服务器存储了所有节点都可以访问的共享数据，可以通过rosparam指令管理参数服务器。
| rosparam指令                   | 作用             |
| ------------------------------ | ---------------- |
| `rosparam set parameter value` | 设置参数值       |
| `rosparam get parameter`       | 获取参数值       |
| `rosparam load file`           | 从文件加载参数   |
| `rosparam dump file`           | 将参数保存至文件 |
| `rosparam delete parameter`    | 删除参数         |
| `rosparam list`                | 列出所有参数名   |

**2. 使用参数服务器**
以小海龟程序为例，通过rosparam list列出参数列表，可以看到背景background是turtlesim节点的参数，因此我们可以通过get指令获取参数值。
```bash
rosparam list
rosparam get /turtlesim/background_g
rosparam set /turtlesim/background_g 200
```
<img src="https://img-blog.csdnimg.cn/33a8f5180f684a4da4aa13f558985ebf.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center" width="40%">

## 四、节点的创建与运行
这一部分会以一个具体实验为例，通过创建一个talker和一个listener并实现两者之间的信息交流，进而介绍创建节点的方法。

### 4.1 创建源文件
首先进入工作空间`~/dev/catkin_ws`文件夹中的功能包`test_package/src/`文件夹中，在这里创建两个cpp文件，分别作为消息的发送方和接收方。在这里我讲两个源文件分别命名`talker.cpp`和`listener.cpp`。
```cpp
//talker.cpp
#include "ros/ros.h"	//包含ros节点的必要文件
#include "std_msgs/String.h"	//包含要使用的消息类型
#include <sstream>

int main(int argc, char **argv){
        ros::init(argc, argv, "talker");	//启动节点并设置名称
        ros::NodeHandle n;	//设置节点进程的句柄
        ros::Publisher chatter_pub = n.advertise<std_msgs::String>("message", 1000);
        //将节点设置成发布者，并设置主题名称为message，缓冲区1000个消息
        ros::Rate loop_rate(10);	//数据发送频率10HZ
        while(ros::ok()){
                std_msgs::String msg;
                std::stringstream ss;
                ss << "I'm talker node~~~";
                msg.data = ss.str();		//创建了一个消息变量
                ROS_INFO("%s", msg.data.c_str());	//屏幕输出消息信息
                chatter_pub.publish(msg);	//发布消息
                ros::spinOnce();			//如果有订阅者出现，就会更新所有主题
                loop_rate.sleep();
        }
        return 0;
}


```

```cpp
//listener.cpp
#include "ros/ros.h"
#include "std_msgs/String.h"

//回调函数，节点每收到一条消息都会调用此函数
void messageCallback(const std_msgs::String::ConstPtr& msg){
        ROS_INFO("I am listener, I heard: [%s]",msg->data.c_str());
}

int main(int argc, char **argv){
        ros::init(argc, argv, "listener");
        ros::NodeHandle n;
        ros::Subscriber sub = n.subscribe("message", 1000, messageCallback);
        //创建一个订阅者，从message主题获取消息，设置缓冲区1000个消息，处理消息的回调函数为messageCallback
        ros::spin();	//消息回调处理，调用后不再返回
        return 0;
}

```
### 4.2 修改CMakeLists.txt
编辑`catkin_ws/src/test_package/`中的CMakeLists.txt，在最后加入如下的内容。

```c
#include_directories(
        include
        ${catkin_INCLUDE_DIRS}
)

# 指定编译后可执行文件的名称
add_executable(talker src/talker.cpp)
add_executable(listener src/listener.cpp)
# 定义目标的依赖文件
add_dependencies(talker test_package_generate_messages_cpp)
add_dependencies(listener test_package_generate_messages_cpp)

target_link_libraries(talker ${catkin_LIBRARIES})
target_link_libraries(listener ${catkin_LIBRARIES})

```

### 4.3 编译节点
回到工作空间根目录进行编译：
```bash
cd ~/dev/catkin_ws
catkin_make
```

如果出现`The dependency target does not exist.`的错误，将CMakeLists.txt开头的cmake版本改为2.8.3即可。

编译完成后需要设置环境变量

```bash
echo "source ~/ros/tr3_6/devel/setup.bash" >> ~/.bashrc
source ~/.bashrc
```

### 4.4 运行节点
然后开始运行节点，首先运行roscore
```bash
roscore
```
然后再打开两个窗口分别运行
```bash
rosrun test_package example1_a
rosrun test_package example1_b
```
可以看到消息的接受和发送。
![在这里插入图片描述](https://img-blog.csdnimg.cn/077c1fff7021431c8deba12bae8d4abe.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
## 五、服务的创建与使用
本节将创建两个节点，分别作为服务器和客户端，通过服务的调用实现两个节点的数据传输，并实现数字求和的功能。
### 5.1 创建msg文件
使用服务之前，首先需要创建msg和srv文件，它们用于说明传输的数据类型和数据值。
**1. 首先创建msg文件**
在`test_package`功能包下创建`msg`文件夹，并在`msg`文件夹中创建一个新的文件`test_msg.msg`。在文件中输入以下内容：
```msg
int32 num1
int32 num2
int32 num3
```
**2. 编辑package.xml文件**
在`package.xml`文件中找到下面两行，取消这两行的注释`<!-- -->`
```xml
<!-- <build_depend>message_generation</build_depend> -->

<!-- <exec_depend>message_runtime</exec_depend> -->
```
```xml
<build_depend>message_generation</build_depend>

<exec_depend>message_runtime</exec_depend>
```
**3. 编辑CMakeLists.txt文件**
打开功能包目录下的`CMakeLists.txt`文件。

找到`find_package()`，在其中加入`message_generation`如下：
```c
find_package(catkin REQUIRED COMPONENTS
  roscpp
  std_msgs
  message_generation
)
```

找到如下的两段，取消注释，并将刚才创建的`test_message.msg`消息名称加入其中
```c
## Generate messages in the 'msg' folder
add_message_files(
  FILES
  test_msg.msg
)
```

```c
## Generate added messages and services with any dependencies listed here
generate_messages(
  DEPENDENCIES
  std_msgs
)
```
**4. 编译测试**
进行完以上的步骤后，使用下面的命令进行编译：
```bash
cd ~/dev/catkin_ws/
catkin_make
```
编译完成后，要检查刚才创建的msg文件是否成功编译，使用`rosmsg show`指令：
```bash
rosmsg show test_package/test_msg
```
如果输出内容与`test_msg.msg`文件内的内容一致，说明编译正确。

### 5.2 创建srv文件
**1. 创建srv文件**
在`test_package`功能包下创建`srv`文件夹，并在`srv`文件夹中创建一个新的文件`test_srv.srv`。在文件中输入以下内容：
```msg
int32 num1
int32 num2
int32 num3
---
int32 sum
```
**2. 编辑package.xml文件**
在创建msg文件时已经完成了package.xml文件的编辑，这里不需要额外的修改。

**3. 编辑CMakeLists.txt**
找到`catkin_package`，将其注释取消，并加入正确的数据如下：
```c
catkin_package(
#  INCLUDE_DIRS include
#  LIBRARIES test_package
#  CATKIN_DEPENDS roscpp std_msgs
#  DEPENDS system_lib
  CATKIN_DEPENDS message_runtime
)

```
取消`add_service_files`的注释，并添加刚创建的服务文件的名字。
```cpp
## Generate services in the 'srv' folder
add_service_files(
  FILES
  test_srv.srv
)
```
**4. 编译测试**
完成上面的文件创建和修改后，使用下面的命令进行编译：
```bash
cd ~/dev/catkin_ws
catkin_make
```
编译完成后，要检测服务文件编译是否正确，可以使用`rossrv show`指令：
```bash
rossrv show test_package/test_srv.srv
```
如果打印内容与`test_srv.srv`文件内的内容一致，说明编译正确。

### 5.3 创建.cpp源文件

**1. 创建源文件**
在功能包文件夹中的src目录下`catkin_ws/test_package/src`，创建两个`.cpp`文件，分别为`server.cpp`和`client.cpp`，分别作为服务器和客户端。
```cpp

#include "ros/ros.h"
#include "test_package/test_srv.h"	//包含创建的srv文件

//对三个变量求和，并将计算结果发送给其他节点
bool add(test_package::test_srv::Request &req, test_package::test_srv::Response &res){
        res.sum = req.num1 + req.num2 + req.num3;
        ROS_INFO("request: num1=%ld, num2=%ld, num3=%ld", (int)req.num1, (int)req.num2, (int)req.num3);
        ROS_INFO("sending back response: [%ld]", (int)res.sum);
        return true;
}       

int main(int argc, char **argv){
        ros::init(argc, argv, "add_3_ints_server");
        ros::NodeHandle n;
        //创建服务"add_3_ints"的服务端，并在ROS中广播
        ros::ServiceServer service = n.advertiseService("add_3_ints", add);
        ROS_INFO("Ready to add 3 ints!");
        ros::spin();
        return 0;
} 
```


```cpp
#include "ros/ros.h"
#include "test_package/test_srv.h"
#include <cstdlib>

int main(int argc, char **argv){
        ros::init(argc, argv, "add_3_ints_client");
        if(argc != 4){
                ROS_INFO("usage: add_3_ints_client num1 num2 num3");
                return 1;
        }

        ros::NodeHandle n;
        //以"add_3_ints"为名称创建客户端
        ros::ServiceClient client = n.serviceClient<test_package::test_srv>("add_3_ints");
        
        //创建srv文件的一个实例，并在其中加入需要发送的数据值
        test_package::test_srv srv;
        srv.request.num1 = atoll(argv[1]);
        srv.request.num2 = atoll(argv[2]);
        srv.request.num3 = atoll(argv[3]);
        
        //调用服务并发送数据，如果调用成功，服务端会返回true，否则返回false
        if(client.call(srv)){
                ROS_INFO("Sum: %ld", (long int)srv.response.sum);
        }
        else{
                ROS_ERROR("Failed to call service add_3_ints");
                return 1;
        }

        return 0;

} 
```

**2. 编辑CMakeLists.txt**
```c
add_executable(server src/server.cpp)
add_executable(client src/client.cpp)

add_dependencies(server test_package_generate_messages_cpp)
add_dependencies(client test_package_generate_messages_cpp)

target_link_libraries(server ${catkin_LIBRARIES})
target_link_libraries(client ${catkin_LIBRARIES})

```
### 5.4 测试程序
回到`catkin_ws`工作空间中，进行编译。
```bash
cd ~/dev/catkin_ws
catkin_make
```

编译完成后，先打开一个终端，运行`roscore`，然后再打开两个新终端窗口，分别运行如下代码
```bash
rosrun test_package server
```

```bash
rosrun test_package client 6 4 2
```
可以看到服务端和客户端实现了消息的通信，完成了三个数字的求和计算。

![在这里插入图片描述](https://img-blog.csdnimg.cn/8c301a56d58c41f9a33f52a02d593c99.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

## 六、启动文件的配置
在前面，我们已经实现了节点的创建和使用，但是每个节点都需要打开不同的命令行窗口执行，如果节点数目更多，那么启动节点将会是一件非常麻烦的事情。

通过启动文件我们可以在命令行窗口实现启动多个节点，只需要运行后缀名为`.launch`的文件即可启动多个节点。

### 6.1 创建.launch文件

首先在功能包内创建一个名为`launch`的文件夹，并在其中创建`test.launch`文件。
```bash
roscd test_package
mkdir launch
cd launch
vim test.launch
```

在`test.launch`文件内输入如下内容：
```xml
<?xml version="1.0"?>
<launch>
	<node name="talker" pkg="test_package" type="talker" />
	<node name="listener" pkg="test_package" type="listener" />
</launch>
```
### 6.2 启动节点
上面编写的启动文件可以启动前文实验的`talker`和`listener`两个节点，启动命令如下：
```bash
roslaunch test_package test.launch
```
系统会输出以下信息，说明启动成功。
![在这里插入图片描述](https://img-blog.csdnimg.cn/de6d8a001f384aceb50e973c736e3ee0.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
使用`rosnode list`可以列出活动的节点，可以看到我们已经成功启动了`talker`和`listener`两个节点。
![在这里插入图片描述](https://img-blog.csdnimg.cn/f10806210a514c809307b447cde9822d.png#pic_center)
如果想看到两个节点传递的信息，可以使用`rqt_console`
![在这里插入图片描述](https://img-blog.csdnimg.cn/9ff1b204910148698e88e59d3588d59c.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
## 七、动态参数的使用
一般情况下，我们编写一个节点时，只能以数据初始化节点内的变量，如果我们想要改变这些变量值，可以使用主题，服务或参数服务器，但这种方式无法在线动态更新，如果listener不主动查询，我们无法知道参数是否更新。有时我们需要在线动态更新参数，这时就需要使用动态参数。

### 7.1 创建配置文件
首先在功能包内新建一个名为`cfg`的文件夹，并在其内创建一个`test.cfg`文件。
```bash
roscd test_package
mkdir cfg
cd cfg
vim test.cfg
```
在`test.cfg`内添加如下代码：
```python
# 初始化ROS并导入参数生成器
#!/usr/bin/env python
PACKAGE = "test_package"
from dynamic_reconfigure.parameter_generator_catkin import *

# 初始化参数生成器，通过gen我们可以添加参数
gen = ParameterGenerator()

# 加入不同的参数类型并设置默认值、描述、取值范围等
# gen.add(name, type, level, description, default, min, max)
gen.add("double_param", double_t, 0, "A double parameter", .1, 0, 1)
gen.add("str_param", str_t, 0, "A string parameter", "test_default_string")
gen.add("int_param", int_t, 0, "An Integer parameter", 1, 0, 100)
gen.add("bool_param", bool_t, 0, "A Boolean parameter", True)

size_enum = gen.enum([gen.const("Low", int_t, 0, "Low is 0"), gen.const("Medium", int_t, 1, "Medium is 1"), gen.const("High", int_t, 2, "High is 2"), gen.const("Exlarge", int_t, 3, "Exlarge is 3")], "Select from the list")

gen.add("size", int_t, 0, "Select from the list", 1, 0, 3, edit_method=size_enum)

# 生成必要的文件并退出程序
exit(gen.generate(PACKAGE, "test_package", "test_"))



```
由于`test.cfg`是由ROS执行的可执行文件，因此我们需要改变文件权限：
```bash
chmod a+x test.cfg
```

### 7.2 修改CMakeLists.txt添加配置文件的编译
打开`CMakeLists.txt`，找到`find_package`，在最后加入`dynamic_reconfigure`如下：
```cpp
find_package(catkin REQUIRED COMPONENTS
  roscpp
  std_msgs
  message_generation
  dynamic_reconfigure
)
```
找到`generate_dynamic_reconfigure_options`，取消注释，并将内部的配置文件改为刚创建的配置文件。

```cpp
## Generate dynamic reconfigure parameters in the 'cfg' folder
generate_dynamic_reconfigure_options(
  cfg/test.cfg
)
```

### 7.3 创建节点
接下来需要创建一个具有动态配置支持的新节点。

在`src`文件夹下创建一个新文件如下：
```bash
roscd test_package
vim src/dynamic_param.cpp
```
在文件中写入如下代码：
```cpp
#include <ros/ros.h>
#include <dynamic_reconfigure/server.h>
#include <test_package/test_Config.h>

//回调函数将输出参数的新值，参数名称必须与test.cfg配置文件相同
void callback(test_package::test_Config &config, uint32_t level){
        ROS_INFO("Reconfigure Request: %d %f %s %s %d", config.int_param, config.double_param, config.str_param.c_str(), config.bool_param?"True":"False", config.size);
}

int main(int argc, char **argv){
        ros::init(argc, argv, "test_dynamic_reconfigure");
        //初始化服务器
        dynamic_reconfigure::Server<test_package::test_Config> server;
		//向服务器发送回调函数，当服务器得到重新配置请求，会调用回调函数        
        dynamic_reconfigure::Server<test_package::test_Config>::CallbackType f;
        f = boost::bind(&callback, _1, _2);
        server.setCallback(f);

        ros::spin();
        return 0;
}   
```

### 7.4 修改CMakeLists.txt添加节点的编译
```cpp
add_executable(dynamic_param src/dynamic_param.cpp)
add_dependencies(dynamic_param test_package_gencfg)
target_link_libraries(dynamic_param ${catkin_LIBRARIES})
```

### 7.5 运行配置
打开三个终端命令行窗口，分别运行如下的命令：
```bash
roscore
rosrun test_package dynamic_param
rosrun rqt_reconfigure rqt_reconfigure
```
执行完成后，会看到一个`rqt_reconfigure`窗口，在这个窗口中就可以动态的配置节点的参数，并且在调整参数时，可以看到命令行打印参数的改变。
![在这里插入图片描述](https://img-blog.csdnimg.cn/1f2a8933f74748ada76eeb1eaa1df4fa.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)