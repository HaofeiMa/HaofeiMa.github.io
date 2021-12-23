---
title: Labview生成三维曲面 | 花瓶
date: 2021-04-08 12:17:19
description: 花瓶这种回转曲面生成的本质是轮廓沿引导线扫描。而对于花瓶来说，其生成方法就是一个圆沿一条曲线进行扫描。圆的生成方法如下：循环总数为360，对应360度，i则对应从0~360的每一角度。
categories:
- 嵌入式
- LabVIEW
tags:
- 实验
- labview
---

**LabVIEW专栏：**[https://blog.csdn.net/weixin_44543463/category_10714833.html](https://blog.csdn.net/weixin_44543463/category_10714833.html)

---
## 一、程序思路

花瓶这种回转曲面生成的本质是**轮廓沿引导线扫描**。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231723953-labview-vise-1.png)
而对于花瓶来说，其生成方法就是一个圆沿一条曲线进行扫描

### 1.1 底面圆轮廓的生成
**圆的生成方法如下：**
循环总数为360，对应360度，i则对应从0~360的每一角度。将i转换为弧度制，即可得到圆上各点的x坐标和y坐标，将两个坐标进行捆绑，得到的就是圆这个曲线。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231723797-labview-vise-2.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231724316-labview-vise-3.png)

### 1.2 引导线的生成
花瓶的生成，就是平面曲线圆的基础上，再加一个z轴曲线，作为圆的扫描引导线，这里以正弦曲线作为圆的扫描引导线。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231724512-labview-vise-4.png)

### 1.3 圆沿引导线扫描
基本思路为：
在刚才生成圆的循环外，再套一个循环。循环的输入是引导线输出的数组。
引导线上每一个点位数据进入大循环时，内循环就画一个以此数据为半径的圆。
当引导线上所有数据都进入循环，生成了一个一次为半径的圆时，花瓶的侧面就完成了。
在前面板插入三维图形中的曲面控件即可看到生成的侧面。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231724504-labview-vise-5.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231724697-labview-vise-6.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231725898-labview-vise-7.png)
生成哑铃状图像的原因是，刚才是以z轴正弦曲线的各个数据作为半径画圆，因此根据正弦图像，可以知道在**起始、终止以及中间位置半径为零**，画出来的图形也就是现在所看到的哑铃。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231725038-labview-vise-8.png)
要解决这个问题，只需要将正弦曲线整体向上平移即可。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231725571-labview-vise-9.png)
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231725803-labview-vise-10.png)

## 二、改进方法
### 2.1 修复裂缝
可以看到生成的曲面上有一条裂缝，原因是起始点和终止点没有重合。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231726918-labview-vise-11.png)
**解决方法：**将起始点添加到终止点，手动实现曲面封闭。索引数组中的第一个元素，将其添加到原数组的最后。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231726775-labview-vise-12.png)

### 2.2 添加底面
添加底面的方法十分简单，因为labview的三维曲面生成是连接相邻的点组成曲面，因此只需要在底面最中心添加一个点即可。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231726743-labview-vise-13.png)