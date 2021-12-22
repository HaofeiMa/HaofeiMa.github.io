---
title: 【RobotStudio学习笔记】（八）速度设置
date: 2021-02-02 22:31:15
description: 在手动模式下，最大速度受到限制，最大时250mm/s。而程序中v1000在仿真和实际中是十分快的，需要设置机器人的运动速度，并且设置延时时间。
categories:
- 机器人
- RobotStudio
tags:
- 笔记
- robotstudio
---

### 一、速度的直接设置
在手动模式下，最大速度受到限制，最大时250mm/s。而程序中v1000在仿真和实际中是十分快的，因此修改工件拿起和放下时的速度，轻拿轻放。
<img src="https://img-blog.csdnimg.cn/20210202221242154.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
实际操作时，手动调试完成后要先如下图，从25%速度开始测试，如果实物机器人运动没有问题，在逐步增大速度，直到100%。如果中间出现任何问题，就将程序中的速度参数修改成适合的值。
<img src="https://img-blog.csdnimg.cn/20210202221406536.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
### 二、速度数据的创建与替换
1. 点击**菜单【三V】—>数据类型—>全部数据类型—speeddata—>显示数据—>新建**
<img src="https://img-blog.csdnimg.cn/2021020222214267.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210202222145611.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210202222149565.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
2. 设置变量的名字，然后修改初始值，其中v_tcp是直线运动速度（主要用这个），v_ori是重定位速度。
<img src="https://img-blog.csdnimg.cn/20210202222152873.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210202222306240.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210202222308918.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
3. 回到程序设计页面，点击速度值，选择需要替换的速度变量，确定。
<img src="https://img-blog.csdnimg.cn/20210202222353738.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210202222356696.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210202222359177.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
### 三、速度延时设置
夹爪的加紧动作需要时间，如果不延时的话，夹爪会在加进的同时运动，可能导致一些问题。设置的方法如下：
1. 点击夹爪夹紧的指令（Set语句），添加指令WaitTime，这里以1s延时为例。
<img src="https://img-blog.csdnimg.cn/20210202222716601.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210202222719563.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210202222721665.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
2. 同理在夹爪松开时，同样需要进行延时设置。
<img src="https://img-blog.csdnimg.cn/20210202222758693.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">