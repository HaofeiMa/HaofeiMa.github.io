---
title: Labview状态机的介绍与程序示例
date: 2021-04-20 21:45:58
description: 状态机是在工程应用中使用最多的设计模型。使用状态机，我们可以很容易的实现程序流程图中的判断、分支。Labview状态机是由一个While循环、一个条件结构和一个移位寄存器组成的。
categories:
- 嵌入式
- LabVIEW
tags:
- 实验
- labview
---



## 一、状态机简介

&emsp;&emsp;状态机是在工程应用中使用最多的设计模型。使用状态机，我们可以很容易的实现程序流程图中的判断、分支。
&emsp;&emsp;Labview状态机是由**一个While循环、一个条件结构和一个移位寄存器**组成的。其中while循环用来保证程序可以连续的运行；条件结构的各种分支中的代码用来描述状态机的各种状态，以及下一状态的选择；移位寄存器用来将之前状态所作出的选择传递到下一次循环的选择端子。
## 二、状态机的基本框架
&emsp;&emsp;在程序框图中创建一个while循环，并在while循环上添加移位寄存器，然后再while循环内创建一个条件结构，条件结构的选择端是一个枚举常量。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420175605662.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)


## 三、例程
#### 3.1 运行效果

按下开始按钮后，LED开始以输入的时间间隔闪烁，按下停止按钮，程序停止运行。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420214013472.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

#### 3.2 程序框图

**程序框图如下：**

![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420214206601.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420214221611.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420214231106.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)


**枚举类型的分支情况如下：**
&emsp;&emsp;设置三项分别为：“开始”、“亮”、灭。然后在条件结构的分支处，**右键-为每个值添加分支**
&emsp;&emsp;其中左侧初始值与”开始“分支内的都是同一个枚举常量（即通过复制粘贴得到的）。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420175448105.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210420175434109.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

#### 3.3 程序逻辑

* 初始条件的输入值为“开始”，进入“开始”的条件分支进行判断。
  * 如果按钮按下，输出“亮”，并作为下一次条件的输入；
  * 如果按钮未按下，输出“开始”，并作为下一次条件的输入，即保持原状态。

* 如果条件的输入为“亮”，此时条件输出“灭”，并作为下一次的输入。

* 如果条件的输入为“灭”，此时条件输出“亮”，并作为下一次的输入。

在“开始”和“灭”分支进行期间，为LED赋值False；在“亮”分支期间，为LED赋值True。

这样就实现了：启动程序后，程序一直循环执行“开始”分支，LED灯灭。按下按钮后，程序在“亮”分支和”灭“分支交替执行，实现LED灯的亮灭变化。

可以通过为while循环添加等待延时调整LED闪烁时间。