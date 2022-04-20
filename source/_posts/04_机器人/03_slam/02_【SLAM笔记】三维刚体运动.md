---
title: 【SLAM笔记】三维刚体运动
description: >-
  两个坐标系之间的旋转、平移关系，统称为坐标系之间的变换关系。机器人运动过程中，往往会设定一个惯性坐标系（即世界坐标系），可以认为它是固定不动的。机器人则是一个移动坐标系。
categories:
  - 机器人
  - SLAM
tags:
  - 笔记
  - slam
cover: 'https://img.mahaofei.com/img/202112231727349-slam-notes2-3.png'
abbrlink: 98891cce
date: 2021-04-10 12:03:11
updated: 2021-04-10 12:03:11
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

**SLAM笔记专栏：**[https://blog.csdn.net/weixin_44543463/category_10925276.html](https://blog.csdn.net/weixin_44543463/category_10925276.html)

---
## 一、旋转矩阵
### 1.1 向量
&emsp;&emsp;向量与坐标是两个不同的概念。向量只是有大小和方向的量。只有当指定了三维空间中某个坐标系的时候，才能谈论向量在此坐标系下的坐标。**因此向量的坐标，既和向量本身有关，也和坐标系的选取有关。**
&emsp;&emsp;向量的内积描述了向量之间的投影关系。

![](https://img.mahaofei.com/img/202112231726158-slam-notes2-1.png)

&emsp;&emsp;向量的外积，方向垂直于这两个向量，大小为|a||b|sin<a,b>。

![](https://img.mahaofei.com/img/202112231727876-slam-notes2-2.png)



### 1.2 欧氏变换
&emsp;&emsp;两个坐标系之间的旋转、平移关系，统称为坐标系之间的变换关系。机器人运动过程中，往往会设定一个惯性坐标系（即世界坐标系），可以认为它是固定不动的。机器人则是一个移动坐标系。
&emsp;&emsp;如果需要知道某个向量在机器人坐标系中与世界坐标系中如何转换的，就需要先得到该向量对机器人坐标系的坐标值，再根据机器人位姿转换到世界坐标系中，这个转换关系用矩阵T来描述。
&emsp;&emsp;机器人移动是一个刚体运动，即同一个向量在各个坐标系下的长度和夹角都不会发生变化，这种变化就是**欧式变换**。

![](https://img.mahaofei.com/img/202112231727349-slam-notes2-3.png)



**（1）旋转矩阵**
&emsp;&emsp;假设某个单位正交基($\boldsymbol{e_1}$,$\boldsymbol {e_2}$,$\boldsymbol{e_3}$)经过了一次旋转，变成了($\boldsymbol {e_1}'$,$\boldsymbol{e_2}'$,$\boldsymbol {e_3}'$)，则对于同一个向量$\boldsymbol{a}$（该向量没有随坐标系旋转而运动），则可知

用矩阵表示如下

![](https://img.mahaofei.com/img/202112231727592-slam-notes2-4.png)



&emsp;![](https://img.mahaofei.com/img/202112231727422-slam-notes2-5.png)



&emsp;为了表示两个坐标之间的变换关系，等式两边同乘[$\boldsymbol{e_1}^T$ $\boldsymbol{e_2}^T$ $\boldsymbol{e_3}^T$]T，则左侧矩阵变成了单位矩阵：

![](https://img.mahaofei.com/img/202112231728395-slam-notes2-6.png)

&emsp;&emsp;中间这个行列式为1的正交矩阵，就是所谓的旋转矩阵。
&emsp;&emsp;同时，此旋转矩阵的逆描述了一个相反的旋转。

![](https://img.mahaofei.com/img/202112231729153-slam-notes2-7.png)

**（2)平移矩阵**
&emsp;&emsp;平移矩阵十分简单，只需要将平移量加到旋转之后的坐标上就可以了。

![](https://img.mahaofei.com/img/202112231729229-slam-notes2-8.png)

### 1.3 变换矩阵
&emsp;&emsp;使用下面这种形式进行变换时，变化多次之后往往会变得过于复杂且不满足线性关系。

![](https://img.mahaofei.com/img/202112231729425-slam-notes2-9.png)

&emsp;&emsp;因此通常我们会使用如下的齐次坐标和变换矩阵进行变换。即把三维向量末尾加一，变成四维向量，称为齐次坐标$\tilde{a}$。将旋转矩阵和平移矩阵写在同一个矩阵里面，这个矩阵T称为变换矩阵。

![](https://img.mahaofei.com/img/202112231730503-slam-notes2-10.png)

&emsp;&emsp;引入齐次坐标就可以实现多个变换矩阵的连乘，得到一个总的变换矩阵，实现多次变换的累加。

![](https://img.mahaofei.com/img/202112231731355-slam-notes2-11.png)



## 二、角轴和欧拉角
### 2.1 问题提出
&emsp;&emsp;旋转矩阵有九个量，但一次旋转只有三个自由度，变换矩阵用十六个量表达六自由度变换，表达方式可能冗余。同时旋转矩阵本身要求必须是正交矩阵，变换矩阵一样都需要约束条件，有些情况下这些约束会使求解变得困难。
### 2.2 角轴
**（1）定义**
&emsp;&emsp;**任意旋转都可以用一个旋转轴和一个旋转角来刻画**。我们可以使用一个向量，其方向与旋转轴一致，长度等于旋转角，这种向量就称为旋转向量或角轴。
&emsp;&emsp;使用角轴表示方法只需要一个三维向量即可描述旋转。同样对于变换矩阵，我们使用一个角轴和一个平移向量即可表达。
**（2）角轴与旋转矩阵的转换**
&emsp;&emsp;假设有一个旋转轴为$\boldsymbol {n}$，角度为θ的旋转，显然旋转向量为θ$\boldsymbol {n}$。由角轴转化为旋转矩阵，可以使用罗德里格斯公式：

![](https://img.mahaofei.com/img/202112231731480-slam-notes2-12.png)

&emsp;&emsp;同样也可以计算从旋转矩阵到角轴的转换。（由于旋转轴上的向量旋转后不发生变化，因此旋转轴就是旋转矩阵$\boldsymbol {R}$的特征值1对应的特征向量）。

![](https://img.mahaofei.com/img/202112231732000-slam-notes2-13.png)



### 2.3 欧拉角
&emsp;&emsp;旋转矩阵和角轴都不太直观，而欧拉角的表达方式比较利于人的理解。（但是在程序中不常用）
&emsp;&emsp;欧拉将将旋转分解为三次不同轴上的转动，例如按Z-Y-X顺序转动，可以得到yaw-pitch-roll角。

> 1. 绕物体的 Z 轴旋转，得到偏航角 yaw；
> 2. 绕旋转之后的 Y 轴旋转，得到俯仰角 pitch；
> 3. 绕旋转之后的 X 轴旋转，得到滚转角 roll。

![](https://img.mahaofei.com/img/202112231732937-slam-notes2-14.png)



&emsp;&emsp;欧拉角存在万向锁的问题，例如在ZYX顺序中，第一次绕Z轴旋转，第二次绕Y轴旋转90°，这时候x轴和系统初始时的Z轴重合了，导致第三次旋转和第一次是绕同一个轴旋转，丢失了一个自由度。所以程序中很少用欧拉角表示机器人的位姿。

![](https://img.mahaofei.com/img/202112231732880-slam-notes2-15.png)



## 三、四元数
### 3.1 简介
&emsp;&emsp;四元数是一种扩展的复数。我们知道复数可以表示复平面内的旋转，乘i表示复平面内逆时针转90度，单位圆上的复数可以表达二维平面的旋转。
&emsp;&emsp;四元数有三个虚部，可以表达三维空间中的旋转。

![](https://img.mahaofei.com/img/202112231733226-slam-notes2-16.png)

![](https://img.mahaofei.com/img/202112231733270-slam-notes2-17.png)

&emsp;&emsp;四元数的虚部相乘，类似于虚数i的相乘，也有对应的关系，且其关系很想三维空间中的叉积。

![](https://img.mahaofei.com/img/202112231734265-slam-notes2-18.png)



### 3.2 四元数的运算

| 运算   | 公式                                                         |
| ------ | ------------------------------------------------------------ |
| 加减法 | ![](https://img.mahaofei.com/img/202112231734688-slam-notes2-19.png) |
| 乘法   | ![](https://img.mahaofei.com/img/202112231734564-slam-notes2-20.png) |
| 共轭   | ![](https://img.mahaofei.com/img/202112231735700-slam-notes2-21.png) |
| 模长   | ![](https://img.mahaofei.com/img/202112231735117-slam-notes2-22.png) |
| 逆     | ![](https://img.mahaofei.com/img/202112231736441-slam-notes2-23.png) |
| 数乘   | ![](https://img.mahaofei.com/img/202112231736563-slam-notes2-24.png) |
| 点乘   | ![](https://img.mahaofei.com/img/202112231736291-slam-notes2-25.png) |



#### 3.3 用四元数表示旋转



**（1）四元数与角轴、旋转矩阵的转换**  



| 转换             | 公式                                                         |
| ---------------- | ------------------------------------------------------------ |
| 角轴到四元数：   | ![](https://img.mahaofei.com/img/202112231740376-slam-notes2-26.png) |
| 四元数到角轴     | ![](https://img.mahaofei.com/img/202112231740724-slam-notes2-27.png) |
| 四元数到旋转矩阵 | ![](https://img.mahaofei.com/img/202112231740443-slam-notes2-28.png) |



**（2）使用四元数表示旋转**



&emsp;&emsp;四元数有三个虚部i, j, k，将三个坐标值作为三个虚部的系数，另实部为零，这样就将一个三维空间坐标转换为纯虚四元数表示的坐标。

&emsp;&emsp;用一个四元数$\boldsymbol{q}$表示旋转。



![](https://img.mahaofei.com/img/202112231740466-slam-notes2-29.png)



&emsp;&emsp;空间点的旋转可以用四元数的乘法表示，旋转后的点$\boldsymbol{p'}$如下



![](https://img.mahaofei.com/img/202112231741907-slam-notes2-30.png)



>参考：**高翔-视觉SLAM十四讲**
>相关Github：[https://github.com/gaoxiang12/slambook](https://github.com/gaoxiang12/slambook)