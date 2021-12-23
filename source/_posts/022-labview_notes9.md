---
title: LabView学习笔记（九）：数组与簇
date: 2021-01-15 16:48:13
description: 处理一系列相似的数据和执行重复计算操作时，可考虑使用数组。数据将相同类型的数据元素归为一组。在前面板放置一个数组的外框，拖放一个数据对象或元素至外框内即可创建数组。数组函数包括数组大小、索引数组、创建数组、数组最大值最小值、排序、拆分数组等操作均可以通过数组函数实现。
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
### 数组
1. 数组：处理一系列相似的数据和执行重复计算操作时，可考虑使用数组。数据将相同类型的数据元素归为一组。
2. 创建方法：在前面板放置一个数组的外框，拖放一个数据对象或元素至外框内即可创建数组。
3. 数组组成：
（1） 元素：组成数组的数据
（2）b. 维度：数组的长度、高度、深度 （数组可以是一维或多维的，内存允许的情况下，每一维度可有多达(2^31)-1个元素）
4. 数组初始化
（1）直接在前面板输入元素进行初始化。
（2）利用循环，如for循环索引输出的是一个数组
（3）c. 数组的初始化函数
（注：未初始化的元素只具有维数，不包含任何元素）
5. 数组函数：包括数组大小、索引数组、创建数组、数组最大值最小值、排序、拆分数组等操作均可以通过数组函数实现。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231106676-labview-notes9-1.png)
### 簇
1. 簇与数组：簇将不同类型数据元素归为一组，簇不同于数组的地方在于簇的大小是固定的，簇可以包含不同的数据类型，数组仅可包含一种数据类型。
2. 簇的创建方法
（1）在前面板上放置一个簇的外框
（2）推拽数据对象或元素至簇的外框内，拖拽对象可分为数值、布尔值、字符串、路径、引用句柄、数组、簇输入控件和簇显示控件
3. 簇的顺序：簇元素的逻辑顺序与其在簇内的位置无关，右键单击簇外框，从快捷菜单中选择重新排序簇中控件
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231107285-labview-notes9-2.png)
4. 簇函数：簇函数中最重要的就是构造打包生成簇的捆绑函数和从簇中解包提取簇中元素的接触捆绑函数
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231107463-labview-notes9-3.png)
6. 错误簇：
（1）可以控制控件执行的先后顺序
（2）也可以通过错误簇控制循环的终止
7. 波形簇的簇元素
（1）t0：时间戳
（2）dt：Y数据的时间间隔
（3）Y：随时间变化的一组数据