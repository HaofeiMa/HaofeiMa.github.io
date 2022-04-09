---
title: LabView学习笔记（四）：动态数据类型
description: >-
  在LabView中，动态数据类型表示为深蓝色，只有Express
  VI才能产生和接收ExpressVI。使用获取动态数据ExpressVI获取动态数据的属性，使用设置动态数据属性ExpressVI设置动态数据的属性，如信号名、时间标识、时间模式等。
categories:
  - 嵌入式
  - LabVIEW
tags:
  - 笔记
  - LabVIEW
abbrlink: 8038e45b
date: 2021-01-10 16:23:30
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
## 动态数据类型介绍
1. 在LabView中，动态数据类型表示为深蓝色
2. 只有Express VI才能产生和接收ExpressVI （如要使用内置VI或函数处理动态数据类型，必须先进行数据类型转换，连线时一般会自动转换动态数据）
3. 动态数据类型转换
* 从动态数据类型转换：在程序框图上放置“从动态数据转换”Express VI，配置转换的数据类型
* 转换至动态数据：在程序框图上放置“转换至动态数据”ExpressVI
4. 获取和设置动态数据
* 使用获取动态数据ExpressVI获取动态数据的属性
* 使用设置动态数据属性ExpressVI设置动态数据的属性，如信号名、时间标识、时间模式等

## 实验：波形显示和数据获取
1. 主要目的：模拟信号输入，在波形图上显示波形，获取采样数据，采样时间和信号名称
2. 实验过程
（1）添加并配置仿真信号
![](https://img.mahaofei.com/img/202112231053478-labview-notes4-1.png)
![](https://img.mahaofei.com/img/202112231053836-labview-notes4-2.png)
（2）创建图形显示控件（示波器），用来显示输出波形
![](https://img.mahaofei.com/img/202112231053597-labview-notes4-3.png)
（3）获得信号数据，并进行显示
![](https://img.mahaofei.com/img/202112231054721-labview-notes4-4.png)
![](https://img.mahaofei.com/img/202112231054013-labview-notes4-5.png)
![](https://img.mahaofei.com/img/202112231054727-labview-notes4-6.png)
（4）获得信号属性并显示
![](https://img.mahaofei.com/img/202112231055401-labview-notes4-7.png)
![](https://img.mahaofei.com/img/202112231055694-labview-notes4-8.png)
![](https://img.mahaofei.com/img/202112231055409-labview-notes4-9.png)
（5)运行程序查看结果
![](https://img.mahaofei.com/img/202112231056441-labview-notes4-10.png)