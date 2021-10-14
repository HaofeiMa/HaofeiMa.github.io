---
title: 【RobotStudio学习笔记】（一）软件的安装与初步测试
date: 2021-01-26 19:21:37
description: 将安装包解压，运行安装包内的setup.exe程序，按照提示安装即可，比较简单。安装完成后双击RobotStudio_5.61.02注册补丁.reg。打开RobotStudio即可完成安装。
categories:
- 机器人
- RobotStudio
tags:
- 笔记
- robotstudio
---

## RobotStudio 6.03.02 的安装

> 链接：[https://pan.baidu.com/s/1NyDTu_OCcPJLbfaQLtCHCw](https://pan.baidu.com/s/1NyDTu_OCcPJLbfaQLtCHCw)
> 提取码：robo 
### 1. 安装注意事项
（1）PC用户名为英文
（2）安装路径为英文
（3）安装过程全程联网
### 2. 安装方法
（1）将安装包解压，运行安装包内的setup.exe程序，按照提示安装即可，比较简单。
（2）安装完成后双击`RobotStudio_5.61.02注册补丁.reg`。
（3）打开RobotStudio即可完成安装。

## 初次测试

1. 打开RobotStudio软件，新建一个空工作站解决方案。
<img src="https://img-blog.csdnimg.cn/20210125115511712.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
2. 点击左上角ABB模型库，导入一个IRB 120确定
<img src="https://img-blog.csdnimg.cn/20210125115613611.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210125115623160.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="40%">
<img src="https://img-blog.csdnimg.cn/2021012511561873.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
3. 然后点击机器人系统-从布局创建系统，选择一个6.03的软件版本
<img src="https://img-blog.csdnimg.cn/20210125115737139.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210125115741617.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="40%">
<img src="https://img-blog.csdnimg.cn/20210125115744637.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="40%">
点击选项，将其中的默认语言改为中文，点击完成即可，稍等一段时间等待系统创建完成。
<img src="https://img-blog.csdnimg.cn/20210125115854259.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="40%">
<img src="https://img-blog.csdnimg.cn/20210125115857844.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="40%">
4. 当下方控制器状态变成绿色的时候说明系统已经创建完成了。
<img src="https://img-blog.csdnimg.cn/20210125120032477.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210125120039330.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
5. 点击上方 控制器-示教器-虚拟示教器
<img src="https://img-blog.csdnimg.cn/20210125120130585.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
在弹出的示教器窗口，打开控制面板切换为手动并使能。
<img src="https://img-blog.csdnimg.cn/20210125120154143.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
6. 在机器人视图内，Ctrl+左键为平移，Ctrl+Shift+左键为旋转，调整视图，使虚拟示教器和机器人能够同时看到。
7. 点击菜单-程序编辑器，新建一个程序。
<img src="https://img-blog.csdnimg.cn/20210125120329622.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
添加一条MoveJ指令
<img src="https://img-blog.csdnimg.cn/20210125120404443.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
长按示教器右边的箭头，使机器人转动一个角度，然后在下方再添加一条MoveJ指令。（一定要看示教器上访的状态，保证机器人是手动控制模式、电机开启）
<img src="https://img-blog.csdnimg.cn/20210125120415784.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
然后点击调试-PP移至Main，再点击右下方的运行按钮，即可看到机器人在起始位置和刚才转动的位置进行往复运动。
<img src="https://img-blog.csdnimg.cn/20210125120426558.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">