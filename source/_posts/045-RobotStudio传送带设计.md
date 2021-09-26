---
title: RobotStudio传送带设计
date: 2021-02-06 23:04:52
description: 新建一个工作站，从设备中导入一个传送带。创建一个正方体，作为传送带的传送对象。将小方块拖动带传送带上我们要的位置处,可以借助捕捉与设定位置精确定位小方块的位置...
categories:
- 机器人
- RobotStudio
tags:
- 实验
- robotstudio
---

> 工作站文件：
> 链接：[https://pan.baidu.com/s/1kikAGbj-vVAH-IR9AWY1sg](https://pan.baidu.com/s/1kikAGbj-vVAH-IR9AWY1sg )
> 提取码：robo 
### 传送带模型的创建
1. 新建一个工作站，从设备中导入一个传送带
<img src="https://img-blog.csdnimg.cn/20210206224246204.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210206224248316.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="30%">
2. 创建一个正方体，作为传送带的传送对象
<img src="https://img-blog.csdnimg.cn/20210206224310980.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="40%">
3. 将小方块拖动带传送带上我们要的位置处
<img src="https://img-blog.csdnimg.cn/20210206224425607.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
4. 可以借助**捕捉**与**设定位置**精确定位小方块的位置
<img src="https://img-blog.csdnimg.cn/20210206224447527.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="30%">
<img src="https://img-blog.csdnimg.cn/20210206224451279.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210206224453136.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="30%">
### 简单传送带设计
1. 建立一个Smart组件，先实现小方块的直线移动
<img src="https://img-blog.csdnimg.cn/20210206224552764.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210206224555161.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="40%">
2. 点击仿真-播放，然后点击Smart组件的Execute按钮，即可观察到小方块的直线运动。但是小方块无法自行停止，需要点击停止按钮，然后重置，才能回到初始状态。
<img src="https://img-blog.csdnimg.cn/2021020622461846.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
3. 添加一个**面传感器**用于检测小方块的位置
<img src="https://img-blog.csdnimg.cn/20210206224642954.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210206224646236.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
4. 回到Smart组件的设计页面，设计逻辑程序，因为**传送带的逻辑是输入端有高电平就运行，传感器的逻辑是有物体触碰就输出高电平，其他时间输出低电平**。因此要实现传送带的要求，只需要将**传感器的输出取非后传给传动带**即可。
<img src="https://img-blog.csdnimg.cn/202102062247123.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210206224713976.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
5. 进行仿真，发现传送带与小方块的运行效果符合预期。如果发现小方块不停止的话，将传送带的**可由传感器检测**取消掉就可以了
<img src="https://img-blog.csdnimg.cn/20210206224732832.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="30%">
### 多个物体的连续传送
1. 添加一个Source组件用于实现小方块的复制，编辑它的属性
<img src="https://img-blog.csdnimg.cn/20210206224810810.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
复制源Source选择小方块，位置通过捕捉本地原点选择小方块的原点，点击应用。
2. 然后进行复制小方块的程序设计由于**Source组件的触发条件是上升沿**，即低脉冲跃变到高脉冲时，才会触发复制效果。
<img src="https://img-blog.csdnimg.cn/20210206224915720.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
因此考虑添加一个脉冲信号的发生组件Timber，信号间隔暂定为5s。
<img src="https://img-blog.csdnimg.cn/20210206224925945.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210206224928925.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
3. 但是这样带来的问题是，在第一个小方块还未到终点时，因为时间已经到了5s，因此传送带会开始运送下一个小方块，仿真表现是所有小方块运动5s后会自动停止。因此选择使用队列这个组件来解决问题。
<img src="https://img-blog.csdnimg.cn/20210206225010760.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210206225046494.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/2021020622502545.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
* back：将复制出来的小方块添加到队列后面
* delete：删除队列中最前面的物体
* enqueue：接收到复制完成的信号后开始将对象添加到队列中
* 传送带的传送对象需要改为整个队列

仿真效果如下（可将原始方块部件_1取消可见，显示效果更好）
<img src="https://img-blog.csdnimg.cn/20210206225425517.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">