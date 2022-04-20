---
title: 【学习OpenCV4】图像像素数据类型的转换与归一
description: 归一化就是要把需要处理的数据经过处理后（通过某种算法）限制在一定范围的之内。为了后面数据处理的方便，其次是保证程序运行时收敛加快。
categories:
  - 程序设计
  - OpenCV
tags:
  - 笔记
  - OpenCV
  - C++
cover: 'https://img.mahaofei.com/img/202112231858306-opencv-notes2-12.png'
abbrlink: f4ce9480
date: 2021-07-25 12:08:22
updated: 2021-07-25 12:08:22
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

## 一、什么是归一化
&emsp;&emsp;归一化就是要把需要处理的数据经过处理后（通过某种算法）限制在一定范围的之内。为了后面数据处理的方便，其次是保证程序运行时收敛加快。
&emsp;&emsp;归一化的目的，是使得没有可比性的数据变得具有可比性，同时又保持相比较的两个数据之间的相对关系，如大小关系；或是为了作图，原来很难在一张图上作出来，归一化后就可以很方便的给出图上的相对位置等。

## 二、归一化的方式
### 2.1 基本API
```cpp
void normalize(
	InputArray 			src,
	InputOutputArray 	dst, 
	double 		alpha = 1, 
	double 		beta = 0, 
	int 		norm_type = NORM_L2, 
	int 		dtype = -1, 
	InputArray 			mask = noArray()
);
```
| 参数      | 作用                                     |
| --------- | ---------------------------------------- |
| src       | 输入数组                                 |
| dst       | 输出数组                                 |
| alpha     | 归一化最小值                             |
| beta      | 归一化最大值                             |
| norm_type | 归一化的类型                             |
| dtype     | 负数时输出数组的type与输入数组的type相同 |
| mask      | 指示函数是否仅仅对指定的元素进行操作     |

其中norm_type有以下几种类型：
* NORM_MINMAX:数组的数值被平移或缩放到一个指定的范围，线性归一化，一般较常用。
* NORM_INF:此类型的定义没有查到，根据OpenCV 1的对应项，可能是归一化数组的C-范数(绝对值的最大值)
* NORM_L1 :  归一化数组的L1-范数(绝对值的和)
* NORM_L2: 归一化数组的(欧几里德)L2-范数

### 2.2 示例程序
```cpp
void MyDemo::normalize_Demo(Mat& image) {
	Mat dst;
	std::cout << image.type() << std::endl;	//CV_8UC3
	image.convertTo(image, CV_32F);			//像素数据转换为浮点数数据
	std::cout << image.type() << std::endl;	//CV_32FC3
	normalize(image, dst, 0, 1.0, NORM_MINMAX);	//归一化
	std::cout << dst.type() << std::endl;
	imshow("Normalize", dst);
}
```