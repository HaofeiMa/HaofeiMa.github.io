---
title: 【ROS学习笔记】（十二）常用可视化工具
date: 2021-03-03 17:26:57
description: Rviz是一款三维可视化工具，可以很好的兼容基域ROS软件框架的机器人平台。Rviz可以通过图形化的方式显示机器人传感器信息、机器人运动状态、环境信息等。
categories:
- 机器人
- ROS
tags:
- 笔记
- ros
---

### Qt工具箱

#### 1. rqt_console

（1）回到系统内，首先启动海龟例程

```bash
roscore
rosrun turtlesim turtlesim_node
rqt_console
```
上面的窗口显示日志的输出信息，info信息、warning警告、error错误等
![](https://img-blog.csdnimg.cn/20210303171340312.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

（2）运行键盘控制程序

```bash
rosrun turtlesim turtle_teleop_key
```

当小海龟碰到边界时，可以看到控制台会输出warning
![](https://img-blog.csdnimg.cn/20210303171438842.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

#### 2. rqt_plot

关闭rot_console控制台，再在终端输入`rqt_plot`

在Topic栏输入`/turtle1/pose`

可以看到小海龟的位姿信息都会被输出出来
![](https://img-blog.csdnimg.cn/2021030317173236.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

> 如果打不开的可以在终端输入rqt，进入后选择plugin-visualization-plot打开
>
> 如果出现核心已转：运行`sudo apt-get install python-pip`和`python -m pip install -U matplotlib`

#### 3. rqt_image_view
```bash
rqt_image_view
```
需要驱动摄像头，在这里显示镜头的图像，选择图像的信息后会渲染出来。
![](https://img-blog.csdnimg.cn/20210303171944840.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

#### 4. rqt
```bash
rqt
```
集成了所有rqt工具，在plugins可以看到所有插件。
![](https://img-blog.csdnimg.cn/20210303172113987.png)

### Rviz

在命令行输入

```bash
roscore
rosrun rviz rviz
```

Rviz是一款三维可视化工具，可以很好的兼容基域ROS软件框架的机器人平台。

* 在Rviz中，可以使用扩展标记语言XML对机器人、周围物体等任何实物进行尺寸、质量、位置、材质等属性的描述，并在界面中显示出来。
* Rviz可以通过图形化的方式显示机器人传感器信息、机器人运动状态、环境信息等。

Rviz界面主要包括：3D视图区，视角设置区，工具栏，显示项列表，时间显示区

Rviz是数据显示平台，所以显示数据时，需要选择Topic。
![](https://img-blog.csdnimg.cn/20210303172221272.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### Gazebo

Gazebo是一款功能强大的三位物理仿真平台，用来仿真机器人、传感器、环境的平台。

在Gazebo也包括：0-3D视图区，1-工具栏，2-模型列表，3-模型属性，4-时间显示区

```bash
roslaunch gazebo_ros willow
```

可能运行不成功，Gazebo对计算机性能要求较高，而且第一次加载会从远程服务器下载一些材质包、环境等。
![](https://img-blog.csdnimg.cn/20210303172558320.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)