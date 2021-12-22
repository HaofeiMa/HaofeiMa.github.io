---
title: 【ROS学习笔记】（一）常用命令的解释与举例
date: 2021-02-22 20:36:36
description: roscore是用来启动ros master，是运行ros系统前首先运行的命令；rosrun是用来运行某个功能包内的某个节点的指令，有两个参数，第一个参数是功能包名，第二个参数是节点名。
categories:
- 机器人
- ROS
tags:
- 笔记
- ros
---

##### 1. roscore
roscore是用来启动ros master，是运行ros系统前首先运行的命令
![](https://img-blog.csdnimg.cn/20210222165356292.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

##### 2. rosrun
rosrun是用来运行某个功能包内的某个节点的指令，有两个参数，第一个参数是功能包名，第二个参数是节点名
> **例：仿真小海龟**
> 在一个终端中输入`rosrun turtlesim turtlesim_node`
> 在另一个终端中输入`rosrun turtlesim turtle_teleop_key`
> ![](https://img-blog.csdnimg.cn/20210222170156550.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
##### 3. rosnode
rosnode，用来显示节点相关信息的指令
* rosnode list用来把系统中所有节点都列出来
![](https://img-blog.csdnimg.cn/20210222170336242.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
* rosnode info *，查看节点的具体信息，如正在发布哪些话题、提供的服务、等其他信息
![](https://img-blog.csdnimg.cn/20210222170424585.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
##### 4. rostopic
* rostopic list，输出当前系统中所有话题的列表
![](https://img-blog.csdnimg.cn/20210222170646797.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
* rostopic pub 【话题名+tab补全】，显示发布的内容
![](https://img-blog.csdnimg.cn/20210222170805535.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
> **例：通过发布话题(rostopic pub)控制小海龟运动**
> 输入代码：`rostopic pub -r 10 /turtle1/cmd_vel+两次tab补全`
> 通过修改linear速度和angular角度，可以控制小海龟的运动。其中 -r 10 是话题发布的频率，每秒发布十次。
> ![](https://img-blog.csdnimg.cn/20210222171247724.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
##### 5. rosservice
* roservice list 可以显示ros系统内所有服务的列表（所有服务端都是上面的海龟仿真器）
* rosservice call 【服务名称+tab补全】发布请求
> 例：产生两只海龟（服务列表中/spawn是产生海龟的请求）
> 输入代码：`rosservice call /spawn+两次tab补全` 
> 其中x，y是新海龟的坐标（仿真器左下角为原点）
> ![](https://img-blog.csdnimg.cn/20210222200421680.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
##### 6. rosbag
记录当前系统内所有话题数据，并在下次复现出来。

> **例：保存小海龟的运动**
> 1. 输入命令：`rosbag record -a -O cmd_record`
> 其中record指做记录，-a指记录所有数据，-o指将数据保存成压缩包，最后是保存文件的名字
> 2. 回到key终端，用键盘方向键控制小海龟进行运动
> 3. 运动完成后使用`ctrl+C`中断rosbag record
> ![](https://img-blog.csdnimg.cn/2021022220190531.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

> **例：复现小海龟的运动**
> 1. 关掉之前打开的终端，重新打开一个终端，运行`roscore`
> 2. 再新开一个终端，启动小海龟的仿真：`rosrun turtlesim turtlesim_node`（这里不需要启动键盘输入）
> 3. 再新开一个终端，实现小海龟的动作复现：`rosbag play cmd_record.bag`
> ![](https://img-blog.csdnimg.cn/20210222202635674.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

**本文学习内容来自古月居**
官方论坛：[https://www.guyuehome.com/](https://www.guyuehome.com/)
学习视频：[https://www.bilibili.com/video/BV1zt411G7Vn](https://www.bilibili.com/video/BV1zt411G7Vn)