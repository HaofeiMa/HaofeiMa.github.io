---
title: Labview多点正弦运动轨迹
date: 2021-04-13 21:55:41
description: 移位寄存器用于将上一次循环产生的值传递至下一次循环。移位寄存器以成对接线端的形式出现，分别位于循环两侧的边框上，位置相对。移位寄存器需要初始化，即需要设置移位寄存器传递给第一次循环的值。
categories:
- 嵌入式
- LabVIEW
tags:
- 实验
- labview
---

**LabVIEW专栏：**[https://blog.csdn.net/weixin_44543463/category_10714833.html](https://blog.csdn.net/weixin_44543463/category_10714833.html)

---
## 〇、须知
### 0.1 移位寄存器
&emsp;&emsp;在循环结构的边框上右键，可以创建移位寄存器。

&emsp;&emsp;移位寄存器用于将上一次循环产生的值传递至下一次循环。移位寄存器以成对接线端的形式出现，分别位于循环两侧的边框上，位置相对。

&emsp;&emsp;右侧接线端含有一个向上的箭头，用于存储每次循环结束时的数据。LabVIEW会将连接到右侧寄存器的数据传递到下一次循环中。循环执行完毕后，右侧接线端将返回移位寄存器最后一次保存的值。

&emsp;&emsp;移位寄存器需要初始化，即需要设置移位寄存器传递给第一次循环的值。
![](https://img-blog.csdnimg.cn/2021041317154237.png#pic_center)

### 0.2 NaN的使用
&emsp;&emsp;NaN：Not a Number。使用时直接创建常量输入NaN即可。
&emsp;&emsp;在绘制曲线时，NaN不会被显示在波形图上。
### 0.3 启用索引与禁用索引
&emsp;&emsp;将数组元素传入循环结构时，再循环结构的边框上会出现一个连接端子。
&emsp;&emsp;启用索引：指每循环一次，数组的值依次传入一个，此时连接端子为空心。
&emsp;&emsp;禁用索引：指无论循环如何，每次循环都会将整个数组传入，此时连接端子为实心。
![](https://img-blog.csdnimg.cn/20210413171325921.png#pic_center)

## 一、连续五个点正弦运动
### 1.1 目标
&emsp;&emsp;在波形图中生成正弦曲线的基础上，实现连续5个点在正弦曲线上跑的效果，如下图所示。
![](https://img-blog.csdnimg.cn/20210413122553724.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

### 1.2 实现思路
（1）产生一个正弦信号数组，数组的索引代表时间，数组的内容代表正弦信号值。
（2）将正弦信号数组，和一个长度相等、元素为NaN的数组同时传入循环结构。
（3）依次索引正弦信号数组的当前传入值和前4个值（如果有的话），并将NaN数组的对应位置用这五个数替换。
（4）正弦信号数组每传入一个数字，NaN数组就替换一次，同时更新一次波形，这样就实现了连续5个点在正弦曲线上运动的效果。
### 1.3 程序框图设计过程
**（1）产生正弦信号数组**
&emsp;&emsp;正弦信号数组的长度为360，相当于每个i对应1°，用正弦角度转弧度的公式即可计算出正弦值，360次循环就输出了一个周期的正弦数组。
![](https://img-blog.csdnimg.cn/20210413164210826.png#pic_center)
**（2）创建一个长度相等、元素为NaN的数组**
&emsp;&emsp;用到了**数组大小**和**初始化数组**这两个控件。数组大小控件传入一个数组，输出数组中元素的个数。初始化数组传入初始化元素和数组长度，输出一个数组。
&emsp;&emsp;这里将正弦信号数组传入，然后初始化一个长度相同，元素全为NaN的数组。
![](https://img-blog.csdnimg.cn/20210413164708184.png#pic_center)
**（3）索引前4个数并于当前值打包成一个数组**（用于接下来按这个数组进行元素替换）
&emsp;&emsp;先创建一个for循环，在循环结构的边框上右键-添加移位寄存器，然后拖拉左边的移位寄存器，使左边为4个端子，右边为一个端子，然后为移位寄存器添加初始值。
&emsp;&emsp;将正弦数组传入for循环，然后连接到右侧移位寄存器上。（默认是以索引的方式传入数组，即每一次循环传入一个数据）
&emsp;&emsp;使用创建数组控件，将当前值和前4个值打包成一个数组。
![](https://img-blog.csdnimg.cn/20210413211244221.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

&emsp;&emsp;这样实现的功能为：数组每传入一个值，会将传入的值和前4个值打包成一个数组，同时这个值会进入移位寄存器，更新移位寄存器中的四个值。
**（4）替换NaN数组的元素**
&emsp;&emsp;这一步的目的是将NaN数组中的对应位置，替换成前5个打包好的值。这样一来，随着每次循环更新，NaN只有的这5个数也随着更新，表现在图上就是5个点在正弦曲线上跑。
&emsp;&emsp;这一步的关键在于找到5个数的索引（即在数组中的位置）。由先前的逻辑可知，右侧for循环的 **i** 就是5个数中最后一个数的索引，前四个数是通过移位寄存器获得的，因此前4个数的索引是依次 -1。
![](https://img-blog.csdnimg.cn/20210413211418635.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

&emsp;&emsp;使用**替换数组子集**这个控件，其输入参数有三个：原数组，替换元素的索引，替换的元素。
&emsp;&emsp;其中，原数组就是前面的NaN数组，因为每次循环，都需要传入整个数组，因此要**禁用索引**。并且由于内层for循环单次循环只替换一个数，需要将替换后的数组通过**移位寄存器**传到下一次循环继续进行元素替换。
&emsp;&emsp;替换的元素，刚才打包的数组通过索引的方式，依次传入到内层for循环中，作为要替换的元素。同时for循环的次数也由这个数组长度确定了。
&emsp;&emsp;替换元素的索引使用外层循环的 i （最后一个数的索引），减内层循环的 i （从0~4五次循环对应五个数）。
**（5）将原先的正弦数组和替换后的NaN数组打包显示**
&emsp;&emsp;在前面板创建一个波形图控件。在程序框图使用创建数组控件连接两个数组和波形图控件即可。（注意：正弦数组也是每次循环传入全部数组，禁用索引）
&emsp;&emsp;然后为大循环添加一个等待延时，否则一旦运行就直接执行完毕，看不到点的运动过程。
![](https://img-blog.csdnimg.cn/20210413211621655.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

**注：前面板的曲线1（5个点）最好修改成其它线型，否则看不出效果**
![](https://img-blog.csdnimg.cn/20210413175710828.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

### 1.3 运行结果
![](https://img-blog.csdnimg.cn/20210413122553724.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
## 二、间隔五个点正弦运动
### 2.1 目标
&emsp;&emsp;仍然是五个点在正弦曲线上跑，但是这次五个点不是连续的，而是有间隔的。
![](https://img-blog.csdnimg.cn/202104132141076.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)

### 2.2 实现思路
&emsp;&emsp;因为目标是将NaN数组中的不连续点替换成相应的正弦坐标值。因此只需要将内循环的替换数组的索引乘一个系数，就可以实现不连续点的索引替换。比如系数为5，则之前外i-内i的结果是0-1-2-3-4，现在外i-内i的结果是0-5-15-20-25。
&emsp;&emsp;虽然索引变了，但是替换的元素没有变，仍然是上一个元素，这样不是我们要的结果，我们需要将传入的数组也等间隔缩短同样的倍数，再配合移位寄存器找到前4个值，**抽取数组**这个控件可以实现我们的目的。
### 2.3 程序框图
![](https://img-blog.csdnimg.cn/20210413215346309.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center)
### 拓展——香农采样定律
&emsp;&emsp;为了不失真地恢复模拟信号，采样频率应该不小于模拟信号频谱中最高频率的2倍。