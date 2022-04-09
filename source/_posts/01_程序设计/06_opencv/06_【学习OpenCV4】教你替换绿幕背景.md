---
title: 【学习OpenCV4】教你替换绿幕背景
description: 绿幕图像的背景替换需要经历①色彩空间转换、②提取绿幕区域、③反转绿幕区域、④复制图像，其中遇到的各种函数和代码也都在本文有详细介绍。
categories:
  - 程序设计
  - OpenCV
tags:
  - 笔记
  - OpenCV
  - C++
abbrlink: a5e6c283
date: 2021-07-21 11:30:03
---

绿幕图像的背景替换需要经历①色彩空间转换、②提取绿幕区域、③反转绿幕区域、④复制图像，其中遇到的各种函数和代码也都在本文有详细介绍。
## 一、色彩空间转换
&emsp;&emsp;要去除绿幕图像中的绿幕，首先需要**将图像转换到hsv色彩空间**，这样方便后续对图像的处理。使用 `cvtcolor()` 函数可以完成色彩空间的转换。
```cpp
void cv::cvtColor(
	InputArray 	src,		//输入图像矩阵
	OutputArray dst,		//输出图像矩阵
	int 		code,		//转换方式
	int 		dstCn = 0	//目标图像通道数
)	
```


一般的使用方法如下，图像转换至hsv色彩空间的示例程序：
```cpp
void MyDemo::inRange_Demo(Mat& image) {
	Mat hsv;	//存储转换后的hsv图像
	cvtColor(image, hsv, COLOR_BGR2HSV);//进行色彩空间转换
	imshow("hsv_image", hsv);
}
```

## 二、提取绿幕区域

&emsp;&emsp;图像转换到hsv色彩空间后，就可以进行色彩区域的提取了，这里使用的函数是 `inRange()` 。
```cpp
void inRange(
	InputArray 	src,	//输入图像
	InputArray	lowerb,	//下边界数组阈值
	InputArray	upperb,	//上边界数组阈值
	OutputArray dst		//输出图像
);
```

其中，由于HSV的取值范围为H(0-180)、S(0-255)、V(0-255)。因此上下边界数组阈值可以通过如下表格获取
| &emsp; | 黑   | 灰   | 白   | 红     | 橙   | 黄   | 绿   | 青   | 蓝   | 紫   |
| ------ | ---- | ---- | ---- | ------ | ---- | ---- | ---- | ---- | ---- | ---- |
| hmin   | 0    | 0    | 0    | 0/156  | 11   | 26   | 35   | 78   | 100  | 125  |
| hmax   | 180  | 180  | 180  | 10/180 | 25   | 34   | 77   | 99   | 124  | 155  |
| smin   | 0    | 0    | 0    | 43     | 43   | 43   | 43   | 43   | 43   | 43   |
| smax   | 255  | 43   | 30   | 255    | 255  | 255  | 255  | 255  | 255  | 255  |
| vmin   | 0    | 46   | 221  | 46     | 46   | 46   | 46   | 46   | 46   | 46   |
| vmax   | 46   | 220  | 255  | 255    | 255  | 255  | 255  | 255  | 255  | 255  |

 &emsp;&emsp;由于本文要替换绿幕，所以选择绿色的阈值，分别是：hmin=35、hmax=77、smin=43、smax=255、vmin=46、vmax=255。因此可以得到**下边界数组为 `Scalar(35, 43, 46)` ，上边界数组为 `Scalar(77, 255, 255)`** 。

 &emsp;&emsp;因此提取绿幕的程序如下：
 ```cpp
 void MyDemo::inRange_Demo(Mat& image) {
	Mat hsv;	//存储转换后的hsv图像
	cvtColor(image, hsv, COLOR_BGR2HSV);//进行色彩空间转换
	Mat mask;	//存储提取绿幕区域后的图像
	inRange(hsv, Scalar(35, 43, 46), Scalar(77, 255, 255), mask);
	imshow("mask", mask);
}
 ```

![](https://img.mahaofei.com/img/202112231907880-opencv-notes6-1.png)



![](https://img.mahaofei.com/img/202112231907662-opencv-notes6-2.png)




## 三、替换背景
&emsp;&emsp;前面已经完成了对绿幕区域的提取，接下来只需要对提取的区域反转，选择人物的区域，进而将人物复制到新背景即可。
&emsp;&emsp;反转选择区域使用的是 `bitwise_not()` 函数。
&emsp;&emsp;复制图像使用的是 `image.copyTo(newimage，mask)` 方法，作用是把mask和image重叠以后把mask中像素值为0（黑色）的点对应的image中的点变为透明，而保留其他点，将保留的点拷贝到newimage中。

```cpp
void MyDemo::inRange_Demo(Mat& image) {

	//转换色彩空间
	Mat hsv;
	cvtColor(image, hsv, COLOR_BGR2HSV);

	//提取绿幕区域
	Mat mask;
	inRange(hsv, Scalar(35, 43, 46), Scalar(77, 255, 255), mask);
	imshow("mask", mask);

	//反转提取人物区域	
	bitwise_not(mask, mask);

	//人物复制到新背景中
	Mat bg = imread("E:/Program/OpenCV/vcworkspaces/opencv_452/img/plantbg.jpg");//背景图片
	image.copyTo(bg, mask);
	imshow("Finished", bg);
}
```
![](https://img.mahaofei.com/img/202112231908540-opencv-notes6-3.png)



![](https://img.mahaofei.com/img/202112231908875-opencv-notes6-4.png)