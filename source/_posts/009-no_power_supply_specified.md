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
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231033794-no-power-1.png)
**解决方法**
设计—配置供电网—在电源供应中，并将未连接电网的电源增加到网络连接即可。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231033971-no-power-2.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231034901-no-power-3.png)