---
title: 【RobotStudio学习笔记】（十）模块化程序
date: 2021-02-04 22:47:06
description: 当程序比较复杂，或者程序内存在重复的部分时，模块化程序设计往往是比较可行的办法。在RobotStudio中可以通过在主程序中调用不同的例行程序，达到使代码逻辑清晰的目的。
categories:
- 机器人
- RobotStudio
tags:
- 笔记
- robotstudio
---

当程序比较复杂，或者程序内存在重复的部分时，模块化程序设计往往是比较可行的办法。在RobotStudio中可以通过在主程序中调用不同的例行程序，达到使代码逻辑清晰的目的。
### 将搬运工件的动作保存为例行程序
1. 进入例行程序，新建一个例行程序
<img src="https://img-blog.csdnimg.cn/20210204224202652.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210204224206400.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
2. 回到main程序，鼠标选中第一行，点击编辑-编辑，将main函数内的代码复制到新建的例行程序中
<img src="https://img-blog.csdnimg.cn/20210204224224703.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
3. 回到刚才新建的例行程序中，将main函数代码粘贴过来。
<img src="https://img-blog.csdnimg.cn/20210204224237573.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
4. 利用调试-pp移至例行程序，测试例行程序是否正确，没有问题的话，就将main函数的内容，用指令procall代替。
<img src="https://img-blog.csdnimg.cn/2021020422425031.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210204224327471.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210204224304409.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
### 快速实现搬运第二个工件
1. 首先将搬运工件的例行程序复制一份
<img src="https://img-blog.csdnimg.cn/20210204224415393.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/2021020422442011.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
2. 因为工件的位置是利用仓库的工件坐标系通过偏倚确定的，因此只需要修改Offs函数的参数即可确定第二个工件的夹取位置。
<img src="https://img-blog.csdnimg.cn/20210204224443342.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">