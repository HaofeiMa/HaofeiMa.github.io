---
title: 【RobotStudio学习笔记】（六）有效载荷
date: 2021-01-31 23:16:34
description: 从夹爪夹住工件后，系统的载荷就发生了变化，对于仿真程序中效果区别可能不明显，但在实际系统中，必须要考虑载荷的区别。
categories:
- 机器人
- RobotStudio
tags:
- 笔记
- robotstudio
---

从夹爪夹住工件后，系统的载荷就发生了变化，对于仿真程序中效果区别可能不明显，但在实际系统中，必须要考虑载荷的区别。
1. 打开手动操作-有效载荷
<img src="https://img-blog.csdnimg.cn/20210131230940711.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
2. 新建一个有效载荷
<img src="https://img-blog.csdnimg.cn/20210131231245338.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210131231252329.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210131231300677.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
3. 修改程序，在程序开始处，添加指令-settings-gripload
<img src="https://img-blog.csdnimg.cn/20210131231314809.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210131231318175.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
4. 添加到上方，负载为load0
<img src="https://img-blog.csdnimg.cn/20210131231341397.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
5. 在夹爪夹取工件后，即set dol0_1语句下，再次添加一条gripload语句，负载为load_Box。同理，在夹爪松开后，再次添加一条gripload语句，负载为load0.
<img src="https://img-blog.csdnimg.cn/20210131231356461.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">