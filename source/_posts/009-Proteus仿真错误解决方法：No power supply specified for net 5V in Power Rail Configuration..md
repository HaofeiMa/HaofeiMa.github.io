---
title: Proteus仿真错误解决方法：No power supply specified for net 5V in Power Rail Configuration.
date: 2021-01-02 11:00:41
description: 解决方法：设计—配置供电网—在电源供应中，并将未连接电网的电源增加到网络连接即可。
categories:
- 嵌入式
- 单片机
tags:
- bug解决
- proteus
---

**错误原因**
设置的5V电源没有添加到电网，如下图红圈中的电源。
![5V](https://img-blog.csdnimg.cn/20210101143220770.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
**解决方法**
设计—配置供电网—在电源供应中，并将未连接电网的电源增加到网络连接即可。
![在这里插入图片描述](https://img-blog.csdnimg.cn/2021010114350341.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210101143531253.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)