---
title: 【学习OpenCV4】图像的模糊处理方法（均值滤波与高斯模糊）
description: 均值滤波用到的是图像卷积原理。由下图所示，卷积核为三阶单位矩阵时，进行均值滤波，原图像的每个三阶子矩阵都会求其均值，并将均值赋给中间的元素。
categories:
  - 程序设计
  - OpenCV
tags:
  - 笔记
  - OpenCV
  - C++
cover: 'https://img.mahaofei.com/img/202112231921584-opencv-notes14-3.png'
abbrlink: f5f492d2
date: 2021-08-13 18:50:08
updated: 2021-08-13 18:50:08
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

## 一、均值滤波

### 1.1 均值滤波的原理
&emsp;&emsp;均值滤波用到的是图像卷积原理。由下图所示，卷积核为三阶单位矩阵时，进行均值滤波，原图像的每个三阶子矩阵都会求其均值，并将均值赋给中间的元素。

&emsp;&emsp;以左上角为例：
（$A_{11}$·1+$A_{12}$·1+$A_{13}$·1+
 &emsp;$A_{21}$·1+$A_{22}$·1+$A_{23}$·1+
&emsp;$A_{31}$·1+$A_{32}$·1+$A_{33}$·1 ）/  9 ->$A_{22}$

![](https://img.mahaofei.com/img/202112231920160-opencv-notes14-1.png)



### 1.2 OpenCV中的均值滤波
&emsp;&emsp;在OpenCV/C++中，提供了blur函数用于实现上述的均值滤波操作：
```cpp
void blur(
	InputArray 	src,						//输入图像
	OutputArray dst,						//输出图像
	Size 		ksize,						//卷积核Size类型
	Point 		anchor=Point(-1,-1),		//Point类型的锚点（-1表示锚点在核中心）
	int 		borderType=BORDER_DEFAULT	//边界模式
)
```
&emsp;&emsp;其中 `Size(w, h)`来表示内核的大小，w 为像素宽度，h为像素高度。


&emsp;&emsp;根据上面的 `blur()` 函数的定义，可以写出均值滤波的测试代码。

```cpp
void MyDemo::blur_Demo(Mat& image) {
	Mat dst;
	blur(image, dst, Size(10, 10), Point(-1, -1));
	imshow("Blur", dst);
}
```
&emsp;&emsp;下图是卷积核为 `Size(10,10)` 的效果。

![](https://img.mahaofei.com/img/202112231920250-opencv-notes14-2.png)

&emsp;&emsp;下图为卷积核为 `Size(1,15)` 的效果。

![](https://img.mahaofei.com/img/202112231921584-opencv-notes14-3.png)




## 二、高斯模糊
&emsp;&emsp;有时候我们并不希望模糊处理时卷积核的系数都一样。而高斯模糊就是用于解决这类问题的一个方法。高斯模糊产生的系数在中心最大，离中心越远系数越小。

```cpp
void cv::GaussianBlur(
	InputArray 	src,		//输入图片，可以使是任意通道数，该函数对通道是独立处理的
	OutputArray dst,		//输出图片
	Size 		ksize,		//高斯内核大小
	double 		sigmaX,		//高斯内核在X方向的标准偏差
	double 		sigmaY,		//高斯内核在Y方向的标准偏差
	int 		borderType	//判断图像边界的模式
)
```
其中`ksize`的行数和列数允许不相同，但必须是正奇数。
如果sigmaY为0，他将和sigmaX的值相同，如果他们都为0，那么他们由ksize的行数列数计算得出。

示例程序：
```cpp
void MyDemo::gaussianBlur_Demo(Mat& image) {
	Mat dst;
	GaussianBlur(image, dst, Size(5, 5), 15);
	imshow("GaussianBlur", dst);
}

```
![](https://img.mahaofei.com/img/202112231921544-opencv-notes14-4.png)