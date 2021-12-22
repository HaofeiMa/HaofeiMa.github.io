---
title: Labview实现画板
date: 2021-04-15 12:24:28
description: 二维图片控件可实现像素级控制，能用于创建几乎任何图形对象。如需在二维图片控件中显示图像，必须通过编程向该控件写入一个图像。可使用图片函数VI进行绘制。
categories:
- 嵌入式
- LabVIEW
tags:
- 实验
- labview
---

**LabVIEW专栏：**[https://blog.csdn.net/weixin_44543463/category_10714833.html](https://blog.csdn.net/weixin_44543463/category_10714833.html)

---
## 一、所用控件介绍
### 1.1 二维图片
&emsp;&emsp;添加方法：前面板右键，图形-控件-二维图片。
&emsp;&emsp;二维图片控件可实现像素级控制，能用于创建几乎任何图形对象。如需在二维图片控件中显示图像，必须通过编程向该控件写入一个图像。可使用图片函数VI进行绘制。
### 1.2 属性节点
&emsp;&emsp;控件的属性节点和控件本身的属性是相同的，在控件上右键单击，选择  创建-属性节点-值，即可创建一个value属性节点
## 二、使用二维图片空间画画
### 2.1 目的
![](https://img-blog.csdnimg.cn/20210415110549537.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
### 2.2 程序设计思路
（1）使用二维图片的鼠标位置属性节点，获取当前鼠标的位置。
（2）使用图片函数中的绘制点函数，对传入的鼠标位置画点。
（3）利用移位寄存器将画好点的图片传入下一次循环，作为下一次循环时画点的画布。
（4）使用二维图片的鼠标按下属性节点，通过条件结构判断鼠标是否按下，以此控制是否画点。
（5）清屏可以使用一个条件结构，清屏按钮按下时，将空白画布传给移位寄存器。
### 2.3 程序实现过程
**（1）获取鼠标位置**
&emsp;&emsp;首先，在前面板创建一个二维图片（右键-图形-控件-二维图片）。然后在**程序框图中**右键二维图片控件，**右键-创建-属性节点-鼠标**。
![](https://img-blog.csdnimg.cn/20210415111946636.png#pic_center)
&emsp;&emsp;将二维图片的属性节点按名称解绑，然后在Mouse Position的输出端点创建显示控件。这样就实现了获取鼠标位置。为整体添加一个while循环，运行看一下效果。
![](https://img-blog.csdnimg.cn/20210415112324995.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![](https://img-blog.csdnimg.cn/20210415112438869.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
**（2）画出当前点**
&emsp;&emsp;在程序框图中，**右键-图形与声音-图片函数-绘制点**，将解绑出来的鼠标位置作为输入，二维图片空间作为输出。然后在颜色、画笔两个接线端上右键-创建输入控件。
![](https://img-blog.csdnimg.cn/2021041511362575.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![](https://img-blog.csdnimg.cn/20210415113914747.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
**（3）画出连续的点，即保存之前鼠标经过的点**
&emsp;&emsp;将刚才画好点的二维图片，通过移位寄存器传入下一次循环，作为下一次循环要画点的初始图片。（注意：移位寄存器使用时一定要初始化）
![](https://img-blog.csdnimg.cn/20210415114631829.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![](https://img-blog.csdnimg.cn/2021041511473756.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
**（4）实现鼠标按下时画点**
&emsp;&emsp;利用二维图片的鼠标属性节点的另一个属性，将鼠标按下这个属性节点拖出来，左键点击，选择**Mouse Modifiers-Button Down**。
![](https://img-blog.csdnimg.cn/20210415115651372.png#pic_center)
&emsp;&emsp;这个属性节点的输出值是一个布尔值，因此我们使用条件结构实现此功能。条件为真，即按键按下时，画当前点；条件为假，即按键未按下时，不做任何操作。
![](https://img-blog.csdnimg.cn/20210415115705970.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![](https://img-blog.csdnimg.cn/20210415115715409.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
**（5）设置清屏按钮**
&emsp;&emsp;清屏操作十分简单，只需要在前面板添加一个布尔按钮，然后在后面板利用条件结构判断按钮状态，如果按下，就将一个空白图片传给二维图片控件，如果未按下，则不进行任何操作。
![](https://img-blog.csdnimg.cn/20210415120235489.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![](https://img-blog.csdnimg.cn/2021041512025229.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![](https://img-blog.csdnimg.cn/2021041512091197.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
**（5）调整一下面板布局、颜色和风格**
![](https://img-blog.csdnimg.cn/20210415121101174.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)