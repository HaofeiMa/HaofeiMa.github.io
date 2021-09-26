---
title: 【学习OpenCV4】图像变换方法总结（放缩、翻转、旋转）
date: 2021-07-26 11:48:41
description: 常见的图像变换方法包括图像的放缩、图像的翻转、图像的旋转等。在OpenCV中，这些图像变换操作都有着其对应的函数。通过对函数定义的解释以及具体例子，介绍各种图像变换的方法。
categories:
- 程序设计
- OpenCV
tags:
- 笔记
- opencv
- c++
---

@[TOC](图像变换方法)

### 一、图像放缩Resize
**1.1 基本知识**
&emsp;&emsp;图像放缩用到了许多插值方法，常见的差值算法有线性插值、立方差值、双立方差值、采样放缩算法等等。
&emsp;&emsp;所使用的API为 `resize()`，函数的定义如下
```cpp
void resize(
InputArray src,	//输入图像
OutputArray dst,//输出图像
Size dsize,		//输出尺寸
double fx=0,	//水平缩放比例
double fy=0,	//垂直缩放比例
int interpolation=INTER_LINEAR	//插值方式
)
```

>* 其中dsize为0时，fx和fy均不可为零；fx和fy为0时，输出图像按dsize输出
>* interpolation内插方式有以下四种：
>	- CV_INTER_NEAREST&emsp;&emsp;最邻近插值点法
>	- CV_INTER_LINEAR&emsp;&emsp;&emsp;双线性插值法
>	- CV_INTER_AREA&emsp;&emsp;&emsp;&emsp;邻域像素再取样插补
>	- CV_INTER_CUBIC &emsp;&emsp;&emsp; 双立方插补，4*4大小的补点

**1.2 示例程序**
```cpp
void MyDemo::resize_Demo(Mat& image) {
	Mat zoomin, zoomout;	//定义输出图像
	int h = image.rows;		//获取原图像的宽高
	int w = image.cols;
	resize(image, zoomin, Size(w * 1.5, h * 1.5), 0, 0, INTER_LINEAR);	//图像放大1.5倍
	imshow("zoomin", zoomin);
	resize(image, zoomout, Size(w / 2, h / 2), 0, 0, INTER_LINEAR);		//图像缩小2倍
	imshow("zoomout", zoomout);
}
```
<img src="https://img-blog.csdnimg.cn/987f0cfaee9847d4bf0412faea421bd4.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

### 二、图像翻转flip
&emsp;&emsp;图像反转就是将图像左右或上下反转镜像。所用到的函数是 `flip()`，函数的定义如下。
```cpp
	void cv::flip(
		cv::InputArray 	src, 			// 输入图像
		cv::OutputArray dst, 			// 输出图像
		int 			flipCode = 0	// >0: 沿y轴翻转, 0: 沿x轴翻转, <0: x、y轴同时翻转
	);
```
测试程序如下：

```cpp
void MyDemo::flip_Demo(Mat& image) {
	Mat dst;
	flip(image, dst, 0);	//上下翻转
	imshow("上下翻转", dst);
	flip(image, dst, 1);	//左右翻转
	imshow("左右翻转", dst);
	flip(image, dst, -1);	//对角线翻转（180°旋转）
	imshow("对角线翻转（180°旋转）", dst);
}
```


<img src="https://img-blog.csdnimg.cn/e2029c4ad3e244ff9e66bb31c5754475.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

### 三、图像旋转warpAffine

```cpp
void cv::warpAffine (
	InputArray 		src,	//输入图像
	OutputArray 	dst,	//输出图像
	InputArray 		M,		//变换矩阵
	Size			dsize,	//输出图像大小
	int				flags = INTER_LINEAR,			//插值方式
	int 			borderMode = BORDER_CONSTANT,	//图像边缘像素模式
	const Scalar&	borderValue = Scalar()			//边界填充值
```

其中M变换矩阵可以通过如下函数获得，旋转矩阵的形式如下：
```cpp
M=cv2.getRotationMatrix2D(center, angle, scale)
```
![在这里插入图片描述](https://img-blog.csdnimg.cn/ba9cdfa1a2fa47bc8b00d41066f6a368.png)
![在这里插入图片描述](https://img-blog.csdnimg.cn/89c181d9f82540a2825e2d83307fd13e.png)

由于旋转之后，图像的大小会发生变化，因此需要重新计算图像的长宽，计算方法可以参考下图：

<img src="https://img-blog.csdnimg.cn/8f4af030a0e84267b032af302d0f8f5b.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

图像旋转的示例程序如下：
```cpp
void MyDemo::rotate_Demo(Mat& image) {
	Mat dst, M;
	int h = image.rows;
	int w = image.cols;
	M = getRotationMatrix2D(Point2f(w / 2, h / 2), 45, 1.0);	//定义变换矩阵M
	double cos = abs(M.at<double>(0, 0));	//求cos值
	double sin = abs(M.at<double>(0, 1));	//求sin值
	int nw = cos * w + sin * h;		//计算新的长、宽
	int nh = sin * w + cos * h;
	M.at<double>(0, 2) += (nw / 2 - w / 2);		//计算新的中心
	M.at<double>(1, 2) += (nh / 2 - h / 2);
	warpAffine(image, dst, M, Size(nw,nh), INTER_LINEAR,0,Scalar(255,255,255));
	imshow("Rotation", dst);
}
```

<img src="https://img-blog.csdnimg.cn/e5971bef2056432e84b36bc93d34cb08.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">