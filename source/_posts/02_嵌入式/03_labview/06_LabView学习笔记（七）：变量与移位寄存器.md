---
title: LabView学习笔记（七）：变量与移位寄存器
description: >-
  变量的作用：在并行循环间传递数据。移位寄存器可以将前一循环产生的数据传递至下一循环，右键单击循环边框，添加移位寄存器，右侧的移位寄存器存储每次循环结束后的数据，左侧的移位寄存器为下一循环提供所存储的数据。
categories:
  - 嵌入式
  - LabVIEW
tags:
  - 笔记
  - LabVIEW
cover: 'https://img.mahaofei.com/img/202112231104454-labview-notes6-10.png'
abbrlink: 20f87532
date: 2021-01-13 20:17:12
updated: 2021-01-13 20:17:12
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
## 变量
1. 变量的作用：在并行循环间传递数据
2. 变量类型

| 类型         | 作用                                   |
| ------------ | -------------------------------------- |
| 局部变量     | 将数据存储在前面板输入控件和显示控件中 |
| 全局变量     | 将数据存储在多个VI可访问的特殊数据库中 |
| 功能全局变量 | 将数据存储在While循环移位寄存器中      |
| 共享变量     | 在通过网络连接的分布式任务间传递数据   |
3. 布尔控件的局部变量
* 具有关联局部变量的布尔控件必须使用开关机械动作
* 布尔触发动作与局部变量不兼容
## 移位寄存器
1. 应用：移位寄存器可以将前一循环产生的数据传递至下一循环
2. 添加方法：右键单击循环边框，添加移位寄存器
3. 右侧的移位寄存器存储每次循环结束后的数据，左侧的移位寄存器为下一循环提供所存储的数据
4. 移位寄存器的初始化

| 初始化               | 程序执行结果                                                 |
| -------------------- | ------------------------------------------------------------ |
| 初始化的移位寄存器   | 无论程序运行多少次结果都一样                                 |
| 未初始化的移位寄存器 | 输入为上一次程序运行的结果，因此输出结果会随着程序运行次数而改变 |