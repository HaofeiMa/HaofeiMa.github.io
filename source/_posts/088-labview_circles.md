---
title: Labview绘制圆/椭圆
date: 2021-04-06 22:16:38
description: for循环是固定次数的循环，其也有条件接线端，可以提前结束while循环，相当于C语言的break语句。for循环与数组操作是密不可分的，for循环最重要的功能就是处理数组数据。
categories:
- 嵌入式
- LabVIEW
tags:
- 实验
- labview
---

**LabVIEW专栏：**[https://blog.csdn.net/weixin_44543463/category_10714833.html](https://blog.csdn.net/weixin_44543463/category_10714833.html)

---

### 一、介绍
1.1 for循环
for循环是固定次数的循环，其也有条件接线端，可以提前结束while循环，相当于C语言的break语句。for循环与数组操作是密不可分的，for循环最重要的功能就是处理数组数据。
![](https://img-blog.csdnimg.cn/20210406210855773.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
1.2 XY图
将x数组和y数组进行捆绑，形成一系列x和y组合的数据，将捆绑后的结果传递给xy图，即可生成一条曲线。
![](https://img-blog.csdnimg.cn/20210406211312382.png)
1.3 创建数组
创建数组这个控件的作用是将元素添加入数组，或连接多个数组。向下拖动此控件，会自动增加新的输入端和输出端。
![](https://img-blog.csdnimg.cn/20210406211657298.png)
1.4 移位寄存器
添加移位寄存器后，循环结构的左右两侧的平行位置将各增加一个包含三角形的方框。左侧的方框代表上一次循环的运行结果，右侧的代表本次循环要输入的结果。
![](https://img-blog.csdnimg.cn/20210406221034655.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 二、实验目标
显示x坐标随角度的变化曲线，y坐标随角度的变化曲线。同时实时绘制一个椭圆，展示椭圆绘制的全过程。
![](https://img-blog.csdnimg.cn/20210406212734602.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 三、实验思路
以循环次数i作为角度变化，每循环一次相当于角度+1，角度从0到360，因此循环总数设置为360。
考虑圆的参数方程，x=r·cos(φ)，y=r·sin(φ)，这里以r=1为例。
因为循环次数作为角度，故每个循环对应的x和y的值的计算方法为：$\frac{iπ}{180}$
将生成的数据添加到移位寄存器传过来的数组中，再将x数据数组和y数据数组捆绑送给xy图即可。
![](https://img-blog.csdnimg.cn/2021040622160628.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)