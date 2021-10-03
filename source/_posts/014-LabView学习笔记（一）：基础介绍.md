---
title: LabView学习笔记（一）：基础介绍
date: 2021-01-07 18:15:23
description: 控件来源于控件选板，右键可以打开控件选板，控件可以点击后添加到前面板，也可以通过拖拽添加控件。程序框图由接线端（前面板）、子VI、函数、常量、结构、连线等组成。
categories:
- 嵌入式
- LabVIEW
tags:
- 笔记
- labview
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

# 一、前面板
## 1. 控件选板

（1） 控件来源于控件选板，右键可以打开控件选板，控件可以点击后添加到前面板，也可以通过拖拽添加控件。
<img src="https://img-blog.csdnimg.cn/20210107175250351.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="40%">
（2） 分类

* 数值控件：输入和显示数值数据
* 布尔控件：创建按钮、开关和指示灯
* 路径控件：输入或返回文件或目录的地址
* 数组、矩阵、簇控件：创建数组、矩阵、簇
* 列表框、树形和表格等控件：提供选项列表
* 图形控件：图形和图表的形式绘制数值数据
* 枚举控件：提供一个可供选择的项列表
* 容器控件：用于组合各种控件
## 2. 工具选板
<img src="https://img-blog.csdnimg.cn/20210107180055359.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210107180117367.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="90%">

# 二、程序框图
## 1. 组成
  接线端（前面板）、子VI、函数、常量、结构、连线
## 2. 函数选板
  依然是右键打开
## 3. 程序框图
（1） 接线端：包括前面板对象程序框图外观，可以右键不选显示为图标，使程序框图界面更简洁。
（2） 节点：带有输入和输出端，是用来进行运算的，比如函数节点、子VI节点（双击即可查看子VI的前面板和程序框图，ExpressVI是特殊的子VI所需连线数量最少，通过对话框配置）。
（3） 连线
* 程序框图对象之间通过连线传输数据
* 不同数据类型的连线颜色、粗细和样式均有差异
* 断开的连线显示为中间带有红叉的黑色虚线
* 按下Ctrl+B删除所有断线
* 右键连线可以整理连线
* 框选程序框图的一部分，使用整理程序框图可以使程序框图更易读