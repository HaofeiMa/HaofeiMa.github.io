---
title: 【RobotStudio学习笔记】（六）有效载荷
description: 从夹爪夹住工件后，系统的载荷就发生了变化，对于仿真程序中效果区别可能不明显，但在实际系统中，必须要考虑载荷的区别。
categories:
  - 机器人
  - RobotStudio
tags:
  - 笔记
  - RobotStudio
cover: 'https://img.mahaofei.com/img/202112231455004-robotstudio-notes6-3.png'
abbrlink: 61ec45b2
date: 2021-01-31 23:16:34
updated: 2021-01-31 23:16:34
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

从夹爪夹住工件后，系统的载荷就发生了变化，对于仿真程序中效果区别可能不明显，但在实际系统中，必须要考虑载荷的区别。
1. 打开手动操作-有效载荷
![](https://img.mahaofei.com/img/202112231453205-robotstudio-notes6-1.png)
2. 新建一个有效载荷
![](https://img.mahaofei.com/img/202112231454418-robotstudio-notes6-2.png)
![](https://img.mahaofei.com/img/202112231455004-robotstudio-notes6-3.png)
3. 修改程序，在程序开始处，添加指令-settings-gripload
![](https://img.mahaofei.com/img/202112231456893-robotstudio-notes6-4.png)
![](https://img.mahaofei.com/img/202112231456248-robotstudio-notes6-5.png)
4. 添加到上方，负载为load0
![](https://img.mahaofei.com/img/202112231456033-robotstudio-notes6-6.png)
5. 在夹爪夹取工件后，即set dol0_1语句下，再次添加一条gripload语句，负载为load_Box。同理，在夹爪松开后，再次添加一条gripload语句，负载为load0.
![](https://img.mahaofei.com/img/202112231456481-robotstudio-notes6-7.png)