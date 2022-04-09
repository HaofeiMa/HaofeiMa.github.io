---
title: ROS+Gazebo仿真差速小车并实现控制
description: >-
  利用xacro描述文件创建差速小车模型，通过gazebo仿真此模型，然后利用libgazebo_ros_diff_drive.so插件控制小车的运动，最后实现了通过键盘按键，控制gazebo环境中的小车运动。
categories:
  - 机器人
  - ROS
tags:
  - ROS
  - 实验
abbrlink: fc92db80
date: 2021-10-15 19:03:48
---



> 本工程的功能包有两个，分别用于**gazebo仿真**与**键盘控制运动**
> 功能包原文件如下：
> diff_wheeled_robot_control : [https://huffie.lanzouw.com/iXilxvdqola](https://huffie.lanzouw.com/iXilxvdqola)
> diff_wheeled_robot_gazebo: [https://huffie.lanzouw.com/ixG3uvdqoyd](https://huffie.lanzouw.com/ixG3uvdqoyd)


**准备工作：**
如果你是第一次使用gazebo，需要先安装下面的包才可以正常使用：
（这里以noetic版本为例，如果你是其他版本的ros，自行更换中间的代码即可）
```bash
sudo apt install ros-noetic-gazebo-ros-pkgs ros-noetic-gazebo-ros ros-noetic-gazebo-msgs ros-noetic-gazebo-plugins ros-noetic-gazebo-ros-control
```
安装完成后，在命令行执行  `gazebo`命令检查是否正确安装，如果看到下面的界面说明安装没有问题。



![](https://img.mahaofei.com/img/202112232001567-ros-gazebo-1.png)



然后再在命令行中运行下面的命令，检查Gazebo的ROS接口是否正常：

```bash
roscore & rosrun gazebo_ros gazebo
```
这个命令会运行roscore，同时也会启动gazebo，如果能看到gazebo的界面说明没有问题。

### 一、创建小车模型
**1. 首先创建一个功能包**
```bash
catkin_create_pkg diff_wheeled_robot_gazebo roscpp tf geometry_msgs urdf rviz xacro
```

> 如果之前没有创建过ROS工作空间，可以先执行如下命令创建
> ```bash
> mkdir -p ~/catkin_ws/src
> cd ~/catkin_ws/src
> catkin_init_workspace
> catkin_make
> source devel/setup.bash
> echo "source /opt/ros/noetic/setup.bash" >> ~/.bashrc
> ```

**2. 创建基本文件夹**
```bash
cd diff_wheeled_robot_gazebo/
mkdir urdf meshes launch world
```
**3. 复制模型文件**
将[提供的gazebo工程包](https://huffie.lanzouw.com/ixG3uvdqoyd)urdf文件夹中的 `diff_wheeled_robot.xacro` 文件和 `wheel.urdf.xacro` 文件复制进自己的工程的urdf文件夹内。

同时将mesh文件夹中万向轮的三维模型 `caster_wheel.stl` 文件复制进自己工程的meshes文件夹内。

关于xacro的代码解释，可以参考另一篇机械臂相关内容：[urdf与xacro的使用方法 & 机械臂模型仿真示例](https://blog.csdn.net/weixin_44543463/article/details/120607629)

**4. 创建launch文件**
回到上一级，进入launch文件夹，创建一个`diff_wheeled_gazebo.launch`文件，并在其中添加如下代码
```bash
vim diff_wheeled_gazebo.launch
```

```xml
<launch>

  <!-- these are the arguments you can pass this launch file, for example paused:=true -->
  <arg name="paused" default="false"/>
  <arg name="use_sim_time" default="true"/>
  <arg name="gui" default="true"/>
  <arg name="headless" default="false"/>
  <arg name="debug" default="false"/>

  <!-- We resume the logic in empty_world.launch -->
  <include file="$(find gazebo_ros)/launch/empty_world.launch">
    <arg name="debug" value="$(arg debug)" />
    <arg name="gui" value="$(arg gui)" />
    <arg name="paused" value="$(arg paused)"/>
    <arg name="use_sim_time" value="$(arg use_sim_time)"/>
    <arg name="headless" value="$(arg headless)"/>
  </include>

  <!-- urdf xml robot description loaded on the Parameter Server-->
  <param name="robot_description" command="$(find xacro)/xacro $(find diff_wheeled_robot_gazebo)/urdf/diff_wheeled_robot.xacro" />


  <!-- Run a python script to the send a service call to gazebo_ros to spawn a URDF robot -->
  <node name="urdf_spawner" pkg="gazebo_ros" type="spawn_model" respawn="false" output="screen"
	args="-urdf -model diff_wheeled_robot -param robot_description"/> 

</launch>
```
**5. 编译并启动节点，查看机器人模型**
首先编译工作空间
```bash
cd ~/catkin_ws
catkin_make
```
然后启动节点
```bash
roslaunch diff_wheeled_robot_gazebo diff_wheeled_gazebo.launch
```
可以看到已经正常启动Gazebo，并且小车的模型也已经正常加载出来了



![](https://img.mahaofei.com/img/202112232001178-ros-gazebo-2.png)



### 二、控制小车移动
**1. 插件介绍**
控制小车移动所使用的插件是 `libgazebo_ros_diff_drive.so` 。此插件的添加代码已经写在了xacro文件中如下：



![](https://img.mahaofei.com/img/202112232001660-ros-gazebo-3.png)



其中可以指定的参数包括轮子的关节、轮子的间距、车轮直径、里程计的主题等等。这里面最重要的一个参数是控制命令主题 `commandTopic`，用于驱动车轮的运动。在这里我们可以通过向 `/cmd_vel` 主题发布数据来控制小车的运动。

**2. 测试运动**
在gazebo仿真正常运行的情况下，新打开一个终端输入如下指令，可以使小车进行圆周运动。

```bash
rostopic pub -r 10 /cmd_vel geometry_msgs/Twist '{linear: {x: 0.5, y: 0, z: 0}, angular: {x: 0, y: 0, z: 0.5}}'
```



![](https://img.mahaofei.com/img/202112232001294-ros-gazebo-4.png)




### 三、键盘控制小车移动
**1. 创建功能包**
创建一个功能包用于驱动小车
```bash
cd ~/catkin/src
catkin_create_pkg diff_wheeled_robot_control rospy tf geometry_msgs urdf rviz xacro
```
将[control工程包](https://huffie.lanzouw.com/iXilxvdqola)中的`launch`文件夹和`scripts`文件夹复制到新创建的功能包中。

**2. 编译启动仿真**

回到工作空间目录进行编译
```bash
catkin_make
```
启动仿真程序

首先和之前一样启动小车的仿真程序
```bash
roslaunch diff_wheeled_robot_gazebo diff_wheeled_gazebo.launch
```

然后新打开一个终端启动键盘控制程序

```bash
roslaunch diff_wheeled_robot_control keyboard_teleop.launch
```

这时候终端窗口内会出现提示，在终端内按下按键即可控制小车



![](https://img.mahaofei.com/img/202112232002981-ros-gazebo-5.png)



![](https://img.mahaofei.com/img/202112232002842-ros-gazebo-6.png)
