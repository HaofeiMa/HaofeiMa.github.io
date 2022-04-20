---
title: LabView学习笔记（八）：属性节点
description: >-
  属性节点可用于访问对象的属性。当某些应用中可能需要通过编程改变前面板对象外观，以响应特定输入时，通过编辑属性节点进行设置。在程序框图的控件上右键，创建属性节点。需要设置多个属性时可以在边框上下拖动添加属性，属性节点按照由上而下的顺序执行。
categories:
  - 嵌入式
  - LabVIEW
tags:
  - 笔记
  - LabVIEW
cover: 'https://img.mahaofei.com/img/202112231105333-labview-notes8-1.png'
abbrlink: d8947a19
date: 2021-01-14 14:17:41
updated: 2021-01-14 14:17:41
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
## 一、属性节点的介绍
1. 属性节点：可用于访问对象的属性。当某些应用中可能需要通过编程改变前面板对象外观，以响应特定输入时，通过编辑属性节点进行设置。
2. 创建方法：在程序框图的控件上右键，创建属性节点。需要设置多个属性时可以在边框上下拖动添加属性，属性节点按照由上而下的顺序执行。
3. 严格属性节点：右键控件创建属性节点的方法为隐含属性节点；通过控件引用创建严格属性节点（右键创建属性节点，控件右键创建引用，二者相连即可创建严格属性节点）。在多个VI涉及同一个控件的属性时，会使用严格属性节点传递。

## 二、实验
1. 任务要求：通过滑动杆对波形图任意一段进行显示。
![](https://img.mahaofei.com/img/202112231105333-labview-notes8-1.png)
3. 实现过程：
（1）用for循环产生1000个随机数，通过波形图将1000个点显示出来
![](https://img.mahaofei.com/img/202112231105730-labview-notes8-2.png)
（2）在前面板添加一个水平滑动杆作为拖动的滚动条。
![](https://img.mahaofei.com/img/202112231105264-labview-notes8-3.png)
（3）因需要实时调整波形图，所以用一个while循环，在while循环中创建属性节点（波形图的最大值和最小值），并将其转换为写入。将滑动杆的输出连接至波形图最小值，滑动杆的输出+100连接至波形图最大值。
![](https://img.mahaofei.com/img/202112231105825-labview-notes8-4.png)
![](https://img.mahaofei.com/img/202112231105330-labview-notes8-5.png)
（4）设置滑动杆的属性（最大值和最小值）为0和900，初始值为0。
![](https://img.mahaofei.com/img/202112231106970-labview-notes8-6.png)
（5）连接错误簇确定程序执行顺序。
![](https://img.mahaofei.com/img/202112231106405-labview-notes8-7.png)
（6)程序设计完成