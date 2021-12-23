---
title: 【学习OpenCV4】如何操作图像中的像素?
date: 2021-07-18 11:22:31
description: 图像的像素操作包括读写操作、算数操作、逻辑运算操作等。像素的操作方式不仅多样，对于灰度图的操作和对彩色图的操作也有各自的特点。对像素点的操作可以使我们访问图像的每一个像素点，实现许多意想不到的功能。
categories:
- 程序设计
- OpenCV
tags:
- 笔记
- opencv
- c++
---

## 一、读写操作
### 1.1 数组遍历
&emsp;&emsp;由于图像本质就是Mat矩阵，因此要读写像素点，可以**采用数组遍历的方式访问**Mat矩阵内的每一个元素。但我们要注意，灰度图和彩色图的通道数是不一样的，**灰度图是单通道的，彩色图是三通道的**。因此读写像素点就分为了读写灰度图像素和读写彩色图像素两种情况。

① 读写灰度图像素

&emsp;&emsp;灰度图内每一个像素点对应Mat矩阵的一个值，因此访问灰度图的像素就相当于访问Mat矩阵的元素。其语法如下

```cpp
//读灰度图像素
int pv = image.at<uchar>(row, col);
//写灰度图像素（反转颜色）
image.at<uchar>(row, col) = 255 - pv;
```
&emsp;&emsp;其中由于每个灰度图像素为1个字节（0-255），因此使用uchar。其中的row代表Mat矩阵行数，col代表列数。


② 读写彩色图像

&emsp;&emsp;彩色图像中每个像素点对应Mat矩阵的三个值，访问方式类似灰度图像。
```cpp
//读彩色图像素
Vec3b bgr = image.at<Vec3b>(row, col);
//写彩色图像素（反转颜色）
image.at<Vec3b>(row, col)[0] = 255 - bgr[0];
image.at<Vec3b>(row, col)[1] = 255 - bgr[1];
image.at<Vec3b>(row, col)[2] = 255 - bgr[2];
```
&emsp;&emsp;由于访问彩色图像素点需要一次性读取三个值，因此我们使用了Vec3b这个结构（可以看成一个数组），可以直接将访问得到的三个值存储在Vec3b这个结构定义的变量中。
&emsp;&emsp;如果彩色像素点的值是整型，需要用Vec3i；如果是浮点数类型，需要用vec3f。


③ 示例程序
```cpp
void MyDemo::pixelVisit_Demo(Mat& image) {
	int w = image.cols;
	int h = image.rows;
	int dims = image.channels();
	for (int row = 0; row < h; row++) {
		for (int col = 0; col < w; col++) {

			//灰度图像
			if (dims == 1) {
				int pv = image.at<uchar>(row, col);
				image.at<uchar>(row, col) = 255 - pv;
			}

			//彩色图像
			if (dims == 3) {
				Vec3b bgr = image.at<Vec3b>(row, col);
				image.at<Vec3b>(row, col)[0] = 255 - bgr[0];
				image.at<Vec3b>(row, col)[1] = 255 - bgr[1];
				image.at<Vec3b>(row, col)[2] = 255 - bgr[2];
			}
		}
	}
	imshow("Pixel Visit Demo", image);
}
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231901936-opencv-notes3-1.png)

### 1.2 指针遍历
&emsp;&emsp;指针遍历的原理与数组遍历类似。定义一个指针指向当前行的首地址，然后利用此指针即可遍历访问本行所有像素点。

```cpp
void MyDemo::pixelVisit_Demo(Mat& image) {
	int w = image.cols;
	int h = image.rows;
	int dims = image.channels();
	for (int row = 0; row < h; row++) {
		uchar* current_row = image.ptr<uchar>(row);
		for (int col = 0; col < w; col++) {

			//灰度图像
			if (dims == 1) {
				*current_row++ = 255 - *current_row;
			}

			//彩色图像
			if (dims == 3) {
				*current_row++ = 255 - *current_row;
				*current_row++ = 255 - *current_row;
				*current_row++ = 255 - *current_row;
			}
		}
	}
	imshow("Pixel Visit Demo", image);
}
```
其中`current_row`随着循环的进行指向每一行的首地址。
`*current_row++ = 255 - *current_row;`是指将 current_row 指向的值（灰度图的像素点或彩色图像素点的一个通道）色彩反转，然后令指针+1，使其指向下一个像素或像素的下一个通道。

## 二、算术操作

### 2.1 像素的
&emsp;&emsp;对一个图像Mat矩阵可以直接进行加减乘除（注意彩色图加法需要Scalar），**加减法处理的结果就是增大/减小图像的亮度，乘除法同理**，但要注意在处理时可能会使像素值**超出(0~255)的范围，可以使用saturate_cast函数进行截断**。


```cpp
//image * m -> dst
void MyDemo::operators_Demo(Mat& image) {
	Mat m = Mat::zeros(image.size(), image.type());
	m = Scalar(20, 20, 20);
	Mat dst = Mat::zeros(image.size(), image.type());
	
	int w = image.cols;
	int h = image.rows;
	int dims = image.channels();

	for (int row = 0; row < h; row++) {
		for (int col = 0; col < w; col++) {

			//灰度图像
			if (dims == 1) {
				int pv = image.at<uchar>(row, col);
				image.at<uchar>(row, col) = 255 - pv;
			}

			//彩色图像
			if (dims == 3) {
				Vec3b p1 = image.at<Vec3b>(row, col);
				Vec3b p2 = m.at<Vec3b>(row, col);
				dst.at<Vec3b>(row, col)[0] = saturate_cast<uchar>(p1[0] * p2[0]);
				dst.at<Vec3b>(row, col)[1] = saturate_cast<uchar>(p1[1] * p2[1]);
				dst.at<Vec3b>(row, col)[2] = saturate_cast<uchar>(p1[2] * p2[2]);
			}
		}
	}
	imshow("operator",dst);
}
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231901960-opencv-notes3-2.png)

### 2.2 图像算术操作API
| 功能 | 函数                          |
| ---- | ----------------------------- |
| 加法 | add(img1, img2, imgout);      |
| 减法 | subtract(img1, img2, imgout); |
| 乘法 | multiply(img1, img2, imgout); |
| 除法 | divide(img1, img2, imgout);   |
```cpp
void MyDemo::operators_Demo(Mat& image) {
	Mat dst = Mat::zeros(image.size(), image.type());
	Mat m = Mat::zeros(image.size(), image.type());
	m = Scalar(20, 20, 20);

	//add(image, m, dst);
	//subtract(image, m, dst);
	multiply(image, m, dst);
	//divide(image, m, dst);

	imshow("operator",dst);

}
```

## 三、逻辑操作
### 3.1 基本知识—真值表
| A    | B    | 与   | 或   | 异或 |
| ---- | ---- | ---- | ---- | ---- |
| 0    | 0    | 0    | 0    | 0    |
| 1    | 0    | 0    | 1    | 1    |
| 0    | 1    | 0    | 1    | 1    |
| 1    | 1    | 1    | 1    | 0    |

### 3.2 画个矩形
&emsp;&emsp;为了更直观的显示像素逻辑运算的结果，我们可以画两个矩形，让两个矩形的相交区域进行逻辑运算。
&emsp;&emsp;画矩形方法很简单，只需要先创建一个空白图像，然后调用rectangle函数就可以。
```cpp
rectangle(m1, Rect(50, 50, 80, 80), Scalar(255, 255, 0), -1, LINE_8, 0);
rectangle(被处理图像, 左上点坐标, 颜色, 线宽, 线型, 坐标点的小数点位数);
```
示例程序如下：
```cpp
void MyDemo::bitWise_Demo(Mat& image) {
	Mat m1 = Mat::zeros(Size(256, 256), CV_8UC3);
	Mat m2 = Mat::zeros(Size(256, 256), CV_8UC3);
	rectangle(m1, Rect(50, 50, 80, 80), Scalar(255, 255, 0), -1, LINE_8, 0);
	rectangle(m2, Rect(100, 100, 80, 80), Scalar(0, 255, 255), -1, LINE_8, 0);
	imshow("m1", m1);
	imshow("m2", m2);
}
```

### 3.3 逻辑运算
| 运算 | 函数                      |
| ---- | ------------------------- |
| 与   | bitwise_and(m1, m2, dst); |
| 或   | bitwise_or(m1, m2, dst);  |
| 非   | bitwise_not(m1, dst);     |
| 异或 | bitwise_xor(m1, m2, dst); |

以“与”操作为例，试验代码如下：
```cpp
void MyDemo::bitWise_Demo(Mat& image) {
	Mat m1 = Mat::zeros(Size(256, 256), CV_8UC3);
	Mat m2 = Mat::zeros(Size(256, 256), CV_8UC3);
	rectangle(m1, Rect(50, 50, 80, 80), Scalar(255, 255, 0), -1, LINE_8, 0);
	rectangle(m2, Rect(100, 100, 80, 80), Scalar(0, 255, 255), -1, LINE_8, 0);
	imshow("m1", m1);
	imshow("m2", m2);
	Mat dst;
	bitwise_and(m1, m2, dst);
	imshow("bitWise", dst);
}
```
| 区域     | 颜色                |
| -------- | ------------------- |
| 背景     | Scalar(0, 0, 0)     |
| 矩形1    | Scalar(255, 255, 0) |
| 矩形2    | Scalar(0, 255, 255) |
| 相交区域 | Scalar(0, 255, 0)   |
| 其他区域 | Scalar(0, 0, 0)     |



![](https://gitee.com/huffiema/pictures/raw/master/image/202112231904528-opencv-notes3-3.png)



&emsp;&emsp;其他的“或”、“非”、“异或”操作类似，有兴趣的可以自己尝试。