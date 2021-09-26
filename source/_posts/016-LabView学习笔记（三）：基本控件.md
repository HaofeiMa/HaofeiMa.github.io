---
title: LabView学习笔记（三）：基本控件
date: 2021-01-09 15:45:41
description: 数值型控件可表示不同类型的数值。布尔型控件最关键的就是机械动作的选择。字符型控件可以通过快捷菜单更改显示类型。右键单击枚举或下拉列表控件，并从快捷菜单中选择编辑项，或者在属性对话框中点击编辑项的选项卡，即可向控件的下拉列表中添加内容，并更改项的顺序
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

## 1. 数值型控件
* 数值型控件可表示不同类型的数值
* 程序框图或前面板中，右键单击输入控件、显示控件或常量，从快捷菜单中选择表示法，可以改变数值型数据的表示法
<img src="https://img-blog.csdnimg.cn/20210108151345661.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="30%">
## 2. 布尔型控件
* 布尔型控件最关键的就是机械动作的选择。

| 机械动作         | 作用                                                         |
| ---------------- | ------------------------------------------------------------ |
| 单击时转换       | 按下按钮时改变状态。保持改状态直至其他按钮按下               |
| 释放时转换       | 释放按钮时改变状态。释放其他按钮之前保持当前状态             |
| 保持转换直到释放 | 按下按钮时改变状态。松开按钮后恢复原来的状态                 |
| 单击时触发       | 按下按钮时改变状态。LabView读取控件值后恢复原来的状态        |
| 释放时触发       | 释放按钮时改变状态。LabView读取控件值后返回原状态            |
| 保持触发直到释放 | 按下按钮时改变状态。松开按钮且LabView读取控件值后恢复原来的状态 |
<img src="https://img-blog.csdnimg.cn/20210108153209510.png" width="40%">

## 3. 字符型控件
* 可以通过快捷菜单更改显示类型：正常显示、'\'显示、密码显示、十六进制显示
* 在LabView中字符串颜色为粉红色
* 字符串的数据/控件可以通过数值/字符串转换函数实现字符串与各种类型数值数据之间的转换，字符串数据也可以与路径、数组之间进行转换
* 字符串型控件可以通过函数面板的连接字符串以及制表符、回车/换行符将多个字符串数据转换成指定格式的字符串，用于报表的制作
<img src="https://img-blog.csdnimg.cn/20210108153449908.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
## 4. 枚举和下拉控件
* 下拉列表：右键单击下拉列表控件，并从快捷菜单中选择编辑项，或者在属性对话框中点击编辑项的选项卡，即可向控件的下拉列表中添加内容，并更改项的顺序
<img src="https://img-blog.csdnimg.cn/20210108153659260.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210108153723261.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
* 枚举型控件：将枚举型控件连接至条件结构的选择器接线端时，LabView将控件中的字符串与分支条件相比较，而不是控件的数值
<img src="https://img-blog.csdnimg.cn/20210108153829153.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
* 如果数据过大时，枚举类型可以较好的显示，而下拉列表有时需要更改数据类型以实现存储较大数据。
<img src="https://img-blog.csdnimg.cn/20210108154006830.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">