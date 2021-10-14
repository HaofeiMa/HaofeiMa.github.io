---
title: 【RobotStudio学习笔记】（三）程序创建
date: 2021-01-28 23:28:13
description: 打开主菜单-程序 可以看到最上面一行是程序名称，其中T_ROB1是任务，有几个机械单元就有几个任务可以选择。第二层是模块，分成系统模块和程序模块。模块就是将机器人需要实现的各个功能分成不同模块。可以理解成文件夹。第三层是例行程序，是机器人系统真正执行的一些程序。
categories:
- 机器人
- RobotStudio
tags:
- 笔记
- robotstudio
---

**1. 层级结构**
打开主菜单-程序 可以看到最上面一行是程序名称，T_ROB1/MainModule/main。
<img src="https://img-blog.csdnimg.cn/20210128232141274.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
其中T_ROB1是任务，有几个机械单元就有几个任务可以选择。比如两个机械臂协同工作，就会出现ROB2等。
<img src="https://img-blog.csdnimg.cn/20210128232154943.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
第二层是模块，分成系统模块和程序模块。模块就是将机器人需要实现的各个功能分成不同模块。可以理解成文件夹。
<img src="https://img-blog.csdnimg.cn/20210128232221908.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
第三层是例行程序，是机器人系统真正执行的一些程序。
<img src="https://img-blog.csdnimg.cn/2021012823223232.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
**2. 新建程序**
新建模块：点击文件-新建模块。
<img src="https://img-blog.csdnimg.cn/20210128232339667.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210128232342799.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
进入新建的模块，可以看到现在的模块只是相当于一个文件夹，并没有创建程序的地方。所以我们需要先创建一个例行程序。点击右上方例行程序，文件-新建例行程序。
<img src="https://img-blog.csdnimg.cn/20210128232354418.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210128232357133.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
点击显示例行程序，就可以进入到程序编辑页面了。
把当前位置记录下来，使用添加指令-MoveJ指令。
将机器人移动至另一个位置，再次添加MoveJ指令。点击调试-pp移至Main，点击右边的单步执行，可以看到机器人进行了一步移动。
<img src="https://img-blog.csdnimg.cn/20210128232421755.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
同时，程序可以切换单周执行与连续执行。
<img src="https://img-blog.csdnimg.cn/2021012823243114.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">