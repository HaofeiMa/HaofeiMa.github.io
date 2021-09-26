---
title: 【RobotStudio学习笔记】（五）工具数据 
date: 2021-01-30 22:46:03
description: 拆除夹爪，测量夹爪末端坐标。点击建模-测量-点到点，选择夹爪底面和末端面，记录得到的z坐标值。将夹爪安装回机器人末端。打开虚拟示教器，进入手动操纵-工具坐标-新建，修改名称，点击左下角初始值。修改第一个z（坐标位置）为刚才测得得值215.30，mass（质量）为1，第二个z（重心位置）初估一个数。验证坐标，选择动作模式为重定位，工具坐标为刚才新建坐标。操纵摇杆可看到机器人绕夹爪两末端中心点转动。
categories:
- 机器人
- RobotStudio
tags:
- 笔记
- robotstudio
---

1. 拆除夹爪，测量夹爪末端坐标
<img src="https://img-blog.csdnimg.cn/20210130224218166.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
2. 点击建模-测量-点到点，选择夹爪底面和末端面，记录得到的z坐标值
<img src="https://img-blog.csdnimg.cn/20210130224307753.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
3. 将夹爪安装回机器人末端
<img src="https://img-blog.csdnimg.cn/20210130224323148.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
4. 打开虚拟示教器，进入手动操纵-工具坐标-新建，修改名称，点击左下角初始值
<img src="https://img-blog.csdnimg.cn/20210130224339453.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
5. 修改第一个z（坐标位置）为刚才测得得值215.30，mass（质量）为1，第二个z（重心位置）初估一个数
<img src="https://img-blog.csdnimg.cn/20210130224351960.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210130224356614.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
6. 验证坐标，选择动作模式为重定位，工具坐标为刚才新建坐标。操纵摇杆可看到机器人绕夹爪两末端中心点转动。