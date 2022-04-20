---
title: 【RobotStudio学习笔记】（五）工具数据
description: >-
  拆除夹爪，测量夹爪末端坐标。点击建模-测量-点到点，选择夹爪底面和末端面，记录得到的z坐标值。将夹爪安装回机器人末端。打开虚拟示教器，进入手动操纵-工具坐标-新建，修改名称，点击左下角初始值。修改第一个z（坐标位置）为刚才测得得值215.30，mass（质量）为1，第二个z（重心位置）初估一个数。验证坐标，选择动作模式为重定位，工具坐标为刚才新建坐标。操纵摇杆可看到机器人绕夹爪两末端中心点转动。
categories:
  - 机器人
  - RobotStudio
tags:
  - 笔记
  - RobotStudio
cover: 'https://img.mahaofei.com/img/202112231451216-robotstudio-notes5-2.png'
abbrlink: 96d699f6
date: 2021-01-30 22:46:03
updated: 2021-01-30 22:46:03
top_img:
keywords:
comments:
toc:
toc_number:
toc_style_simple:
copyright:
copyright_author:
copyright_author_href:
copyright_url:
copyright_info:
mathjax:
katex:
aplayer:
highlight_shrink:
aside:
stick:
---

1. 拆除夹爪，测量夹爪末端坐标
![](https://img.mahaofei.com/img/202112231451524-robotstudio-notes5-1.png)
2. 点击建模-测量-点到点，选择夹爪底面和末端面，记录得到的z坐标值
![](https://img.mahaofei.com/img/202112231451216-robotstudio-notes5-2.png)
3. 将夹爪安装回机器人末端
![](https://img.mahaofei.com/img/202112231451089-robotstudio-notes5-3.png)
4. 打开虚拟示教器，进入手动操纵-工具坐标-新建，修改名称，点击左下角初始值
![](https://img.mahaofei.com/img/202112231452933-robotstudio-notes5-4.png)
5. 修改第一个z（坐标位置）为刚才测得得值215.30，mass（质量）为1，第二个z（重心位置）初估一个数
![](https://img.mahaofei.com/img/202112231452295-robotstudio-notes5-5.png)
![](https://img.mahaofei.com/img/202112231452825-robotstudio-notes5-6.png)
6. 验证坐标，选择动作模式为重定位，工具坐标为刚才新建坐标。操纵摇杆可看到机器人绕夹爪两末端中心点转动。