---
title: 【RobotStudio学习笔记】（九）坐标偏移设置
date: 2021-02-03 20:33:39
description: Offs指令可根据当前所选工件坐标以及基准点进行坐标偏移。点击要偏移的robtarget数据，选择功能-Offs即可进行坐标偏移设置。
categories:
- 机器人
- RobotStudio
tags:
- 笔记
- robotstudio
---

### Offs指令
**功能**：根据当前所选工件坐标以及基准点进行坐标偏移
**使用**：Offs(变量, Δx, Δy, Δz)
### 坐标偏移设置方法
1. 点击要偏移的robtarget数据，选择**功能-Offs**
<img src="https://img-blog.csdnimg.cn/20210203203127916.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210203203140988.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
2. 例如让夹爪夹取工件后竖直上升50mm，则可按如下设置
<img src="https://img-blog.csdnimg.cn/2021020320315993.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210203203201258.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
同理，其它坐标的偏移方式也可按相同的方法进行设置。