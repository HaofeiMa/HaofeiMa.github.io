---
title: Labview子VI的创建与调用
description: >-
  程序设计中很重要的一个思想就是模块化思想，也就是将程序划分为若干个区块，这样对程序某个区块进行修改就不会影响到其它区块。在Labview中，我们通过子VI来实现模块化的编程。
categories:
  - 嵌入式
  - LabVIEW
tags:
  - 实验
  - LabVIEW
cover: 'https://img.mahaofei.com/img/202112231753259-labview-subvi-6.png'
abbrlink: adea5358
date: 2021-04-20 17:33:28
updated: 2021-04-20 17:33:28
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

**LabVIEW专栏：**[https://blog.csdn.net/weixin_44543463/category_10714833.html](https://blog.csdn.net/weixin_44543463/category_10714833.html)

---
## 一、什么是子VI
&emsp;&emsp;程序设计中很重要的一个思想就是模块化思想，也就是将程序划分为若干个区块，这样对程序某个区块进行修改就不会影响到其它区块。在Labview中，我们通过子VI来实现模块化的编程。

&emsp;&emsp;任何一个VI本身就可以作为子VI被其他VI调用，子VI只是需要在普通VI的基础上定义连接端子和图标即可。当一个VI被其它VI调用，则该VI被称为子VI，子VI相当于程序语言中的子程序。

## 二、子VI的创建与调用
&emsp;&emsp;这里以角度转弧度的函数为例，说明子VI的创建和调用方法。
### 2.1 子VI的创建
&emsp;&emsp;如下图是一个将角度转为弧度值的简单程序。

![](https://img.mahaofei.com/img/202112231751031-labview-subvi-1.png)



![](https://img.mahaofei.com/img/202112231751951-labview-subvi-2.png)



**（1）定义接线端**
&emsp;&emsp;在前面板中右上角的小框框中，点击选择一个接线端的位置，然后再点击这个接线端要对应的输入输出控件，若方块变红，说明这个接线端设置完成了。

![](https://img.mahaofei.com/img/202112231752167-labview-subvi-3.png)

&emsp;&emsp;例如，先点击小框框左上角的小方块，会发现点击的小方块变黑，然后点击角度控件，会看到小方块变橙色，这就说明子VI左上角的接线端被设定为角度输入。同理可设置右上角的接线端为弧度输出。

![](https://img.mahaofei.com/img/202112231752811-labview-subvi-4.png)



**（2）设置图标**
&emsp;&emsp;双击右上角的图标，可以打开一个图标编辑器。这里可以使用Labview的模板图标，也可以自己画图标，画图标的方法与windows中的画图工具很类似。

![](https://img.mahaofei.com/img/202112231752559-labview-subvi-5.png)



![](https://img.mahaofei.com/img/202112231753259-labview-subvi-6.png)



### 2.2 子VI的调用
&emsp;&emsp;新建一个VI，在程序框图的空白处**右键-选择VI...**，打开刚才保存的子VI程序，可以看到我们刚刚创建的子VI被调用出来了。

![](https://img.mahaofei.com/img/202112231753319-labview-subvi-7.png)



![](https://img.mahaofei.com/img/202112231753218-labview-subvi-8.png)



&emsp;&emsp;可以利用这个子VI创建一个简单的正弦曲线。

![](https://img.mahaofei.com/img/202112231754560-labview-subvi-9.png)

