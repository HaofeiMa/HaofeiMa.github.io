---
title: 【学习OpenCV4】图像通道的分离、合并与混合方法（C++）
date: 2021-07-20 12:33:40
description: 图像通道的分离后输出的多通道序列一般使用 std::vector mv; 来存储，mv[0] 、mv[1]、mv[2]、分别对应BGR三个通道。但是现在显示的相当于是三张单通道的图像，也就相当于三张灰度图像。要想让三张图像恢复直观意义上的色彩，就需要使用下面通道合并的方法了。
categories:
- 程序设计
- OpenCV
tags:
- 笔记
- opencv
- c++
---

## 一、图像通道的分离
```cpp
void split(
	const cv::Mat& image, //输入图像
	vector<Mat>& mv // 输出的多通道序列（n个单通道序列）
);
```
&emsp;&emsp;输出的多通道序列一般使用 `std::vector<Mat> mv;` 来存储，`mv[0]` 、`mv[1]`、`mv[2]`、分别对应BGR三个通道。
&emsp;&emsp;
&emsp;&emsp;示例代码：

```cpp
void MyDemo::channels_Demo(Mat& image) {
	std::vector<Mat> mv;
	split(image, mv);
	imshow("Blue Channel", mv[0]);
	imshow("Green Channel", mv[1]);
	imshow("Red Channel", mv[2]);
}
```
<img src="https://img-blog.csdnimg.cn/20210720121303160.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">


## 二、通道的合并
&emsp;&emsp;但是现在显示的相当于是三张单通道的图像，也就相当于三张灰度图像。要想让三张图像恢复直观意义上的色彩，就需要使用下面通道合并的方法了。

&emsp;&emsp;通道的合并需要用到 `merge()` 函数。
```cpp
void merge(
	const vector<cv::Mat>& mv, // 输入的多通道序列(n个单通道序列)
	cv::OutputArray dst // 输出图像，包含mv
);
```
&emsp;&emsp;根据 `merge()` 函数的定义，我们只需要控制输入的多通道数组 `mv[]` 中的三个值，就可以实现通道的合并。

&emsp;&emsp;示例代码：
```cpp
void MyDemo::channels_Demo(Mat& image) {
	std::vector<Mat> mv;
	split(image, mv);
	
	Mat m1,m2,m3;
	mv[1] = 0;
	mv[2] = 0;
	merge(mv, m1);
	imshow("Blue Channel", m1);

	split(image, mv);
	mv[0] = 0;
	mv[2] = 0;
	merge(mv, m2);
	imshow("Green Channel", m2);

	split(image, mv);
	mv[0] = 0;
	mv[1] = 0;
	merge(mv, m3);
	imshow("Red Channel", m3);
}
```

<img src="https://img-blog.csdnimg.cn/20210720122023377.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;我们已经知道如何将图像的三个通道提取出来了，因此我们可以将三个通道进行任意组合，合并出我们想要的图片。

## 三、通道的混合
&emsp;&emsp;通道的混合也是将三个通道进行任意排列
```cpp
C++: void mixChannels(const Mat*src, size_t nsrcs, Mat* dst, size_t ndsts, const int* fromTo, size_t npairs)
```
| 参数   | 作用           |
| ------ | -------------- |
| src    | 输入矩阵       |
| nsrcs  | 输入矩阵的个数 |
| dst    | 输出矩阵       |
| ndsts  | 输出矩阵的个数 |
| fromTo | 序号对向量     |

```cpp
void MyDemo::channels_Demo(Mat& image) {
	Mat dst = Mat::zeros(image.size(), image.type());
	int ft[] = { 0,2,1,1,2,0 };//互换1、3通道
	mixChannels(&image,1, &dst,1, ft,3);
	imshow("Mix", dst);
}
```
<img src="https://img-blog.csdnimg.cn/20210720123205231.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">