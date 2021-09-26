---
title: RobotStudio动态夹具的创建
date: 2021-02-11 22:46:32
description: 如果你有其它建模软件如Solidworks等做的夹具模型，可以导入到RobotStudio中。这里简单建模，主要展示动态夹具的创建流程。
categories:
- 机器人
- RobotStudio
tags:
- 实验
- robotstudio
---

### 创建夹具的几何模型
如果你有其它建模软件如Solidworks等做的夹具模型，可以导入到RobotStudio中。
这里简单建模，主要展示动态夹具的创建流程。
1. 创建夹具的本体
![在这里插入图片描述](https://img-blog.csdnimg.cn/2021021118235246.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
2. 将其移动到其他位置，准备创建夹具的其他部分
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211182556601.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
3. 创建一个圆柱，作为夹具的法兰盘，与机器人的关节末端相连
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211182711155.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
4. 移动长方体的位置。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211183344368.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
5. 将部件2的物体拖动到部件1上，将两个物体组合成一个部件。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211183417631.png)
6. 创建夹爪
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211185037224.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211185210299.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
#### 创建机械装置
1. 点击创建机械装置，装置名称写“夹具”，装置类型选“工具”
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211185601702.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
2. 添加链接，为刚才创建的三个部件分别添加链接。如果是导入的模型，也需要为各个部件添加链接。其中基座部分需要勾选BaseLink，其它部分不需要。
![在这里插入图片描述](https://img-blog.csdnimg.cn/2021021118590865.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211190145202.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211190132510.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211190122529.png)
3. 创建接点
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211190707491.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211191438163.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

4. 创建工具数据
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211191249823.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
5. 添加一个新姿态
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211220048957.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
### Smart组件设置
1. 创建Smart组件，将夹具拖动到Smart组件下，并将夹具设置为Smart组件的角色Role
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211220910621.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
2. 添加以下组件
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211221433525.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
3. 添加信号
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211222422794.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
4. 对各个组件进行设置，首先先设置夹具不可由传感器检测
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211222651888.png)
5. 设置直线传感器，设置为图示圆柱状，用于检测夹具下方是否有物体
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211223201571.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
6. 设置Attacher安装对象组件
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211223352233.png)
7. 设置PoseMover，机械装置运动的属性
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211223612946.png)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211223631433.png)
8. 按图示设计程序框图
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210211224200115.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
> 链接：[https://pan.baidu.com/s/1pVwEuCmvoiwFlHMjRqEjLQ](https://pan.baidu.com/s/1pVwEuCmvoiwFlHMjRqEjLQ ) 
> 提取码：rs04 