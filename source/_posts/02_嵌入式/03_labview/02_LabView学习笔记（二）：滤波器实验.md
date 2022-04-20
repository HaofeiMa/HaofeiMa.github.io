---
title: LabView学习笔记（二）：滤波器实验
description: 放置Express VI至程序框图，然后配置弹出的对话框，连线Express VI，保存并运行VI。
categories:
  - 嵌入式
  - LabVIEW
tags:
  - 笔记
  - LabVIEW
cover: 'https://img.mahaofei.com/img/202112231050285-labview-notes2-10.png'
abbrlink: 7442f1dd
date: 2021-01-08 15:15:37
updated: 2021-01-08 15:15:37
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

**Labview学习笔记**：
[LabView学习笔记（一）：基础介绍](https://blog.csdn.net/weixin_44543463/article/details/112325523)
[LabView学习笔记（二）：滤波器实验](https://blog.csdn.net/weixin_44543463/article/details/112329185)
[LabView学习笔记（三）：基本控件](https://blog.csdn.net/weixin_44543463/article/details/112364388)
[LabView学习笔记（四）：动态数据类型](https://blog.csdn.net/weixin_44543463/article/details/112366358)
[LabView学习笔记（五）：数据类型综合实验](https://blog.csdn.net/weixin_44543463/article/details/112392799)
[LabView学习笔记（六）：while循环与for循环](https://blog.csdn.net/weixin_44543463/article/details/112393383)
[LabView学习笔记（七）：变量与移位寄存器](https://blog.csdn.net/weixin_44543463/article/details/112431393)
[LabView学习笔记（八）：属性节点](https://blog.csdn.net/weixin_44543463/article/details/112470713)
[LabView学习笔记（九）：数组与簇](https://blog.csdn.net/weixin_44543463/article/details/112529983)
[LabView学习笔记（十）：条件结构](https://blog.csdn.net/weixin_44543463/article/details/112571924)
[其它实验过程记录](https://blog.csdn.net/weixin_44543463/category_10714833.html)

---
### 滤波器实验
**1. 主要目的**：学习VI的创建方法
**2. 操作步骤**：
（1）放置Express VI至程序框图
（2）配置弹出的对话框
（3）连线Express VI
（4）保存并运行VI
**3. 实验过程**
（1）添加正弦仿真信号，并对正弦信号进行配置，设置频率为100Hz
![](https://img.mahaofei.com/img/202112231047458-labview-notes2-1.png)
![](https://img.mahaofei.com/img/202112231048500-labview-notes2-2.png)
（2）添加滤波器，设置截止频率为100Hz，频率低于100Hz就可以进行波形显示
![](https://img.mahaofei.com/img/202112231048435-labview-notes2-3.png)
![](https://img.mahaofei.com/img/202112231048260-labview-notes2-4.png)
![](https://img.mahaofei.com/img/202112231048631-labview-notes2-5.png)
（3）将正弦信号和滤波后的信号进行合并
![](https://img.mahaofei.com/img/202112231049922-labview-notes2-6.png)
![](https://img.mahaofei.com/img/202112231049124-labview-notes2-7.png)
（4）添加图形显示控件
![](https://img.mahaofei.com/img/202112231049374-labview-notes2-8.png)
![](https://img.mahaofei.com/img/202112231049966-labview-notes2-9.png)
（5）双击生成的图形显示控件，进入前面板，运行程序
![](https://img.mahaofei.com/img/202112231050285-labview-notes2-10.png)
（6)可以尝试修改正弦信号源和滤波器的配置，观察曲线变化