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
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231521620-robotstudio-notes9-1.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231522496-robotstudio-notes9-2.png)
2. 例如让夹爪夹取工件后竖直上升50mm，则可按如下设置
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231522604-robotstudio-notes9-3.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231523048-robotstudio-notes9-4.png)
同理，其它坐标的偏移方式也可按相同的方法进行设置。