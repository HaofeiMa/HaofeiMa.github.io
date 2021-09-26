---
title: Labview子VI的创建与调用
date: 2021-04-20 17:33:28
description: 程序设计中很重要的一个思想就是模块化思想，也就是将程序划分为若干个区块，这样对程序某个区块进行修改就不会影响到其它区块。在Labview中，我们通过子VI来实现模块化的编程。
categories:
- 嵌入式
- LabVIEW
tags:
- 实验
- labview
---

**LabVIEW专栏：**[https://blog.csdn.net/weixin_44543463/category_10714833.html](https://blog.csdn.net/weixin_44543463/category_10714833.html)

---
## 一、什么是子VI
&emsp;&emsp;程序设计中很重要的一个思想就是模块化思想，也就是将程序划分为若干个区块，这样对程序某个区块进行修改就不会影响到其它区块。在Labview中，我们通过子VI来实现模块化的编程。

&emsp;&emsp;任何一个VI本身就可以作为子VI被其他VI调用，子VI只是需要在普通VI的基础上定义连接端子和图标即可。当一个VI被其它VI调用，则该VI被称为子VI，子VI相当于程序语言中的子程序。

## 二、子VI的创建与调用
&emsp;&emsp;这里以角度转弧度的函数为例，说明子VI的创建和调用方法。
#### 2.1 子VI的创建
&emsp;&emsp;如下图是一个将角度转为弧度值的简单程序。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420171030130.png#pic_center)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420171113415.png#pic_center)
**（1）定义接线端**
&emsp;&emsp;在前面板中右上角的小框框中，点击选择一个接线端的位置，然后再点击这个接线端要对应的输入输出控件，若方块变红，说明这个接线端设置完成了。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420171749460.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
&emsp;&emsp;例如，先点击小框框左上角的小方块，会发现点击的小方块变黑，然后点击角度控件，会看到小方块变橙色，这就说明子VI左上角的接线端被设定为角度输入。同理可设置右上角的接线端为弧度输出。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420172201441.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
**（2）设置图标**
&emsp;&emsp;双击右上角的图标，可以打开一个图标编辑器。这里可以使用Labview的模板图标，也可以自己画图标，画图标的方法与windows中的画图工具很类似。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420172814312.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![在这里插入图片描述](https://img-blog.csdnimg.cn/2021042017282462.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

#### 2.2 子VI的调用
&emsp;&emsp;新建一个VI，在程序框图的空白处**右键-选择VI...**，打开刚才保存的子VI程序，可以看到我们刚刚创建的子VI被调用出来了。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420172427396.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420172954115.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
&emsp;&emsp;可以利用这个子VI创建一个简单的正弦曲线。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420173227213.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)