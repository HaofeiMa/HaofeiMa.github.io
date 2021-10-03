---
title: 【学习OpenCV4】图像的基本操作
date: 2021-07-17 11:56:08
description: 色彩空间转换函数：cvtColor。GRAY：指灰度，只有一个参数灰度值Channel。BGR：指BGR颜色空间，以红绿蓝三基色(0~255)为基础，叠加形成各种颜色。HSV：指六角椎体模型，色调Hue用角度度量（0~180），饱和度Saturation（0 ~ 255），亮度Value（0 ~ 255）。
categories:
- 程序设计
- OpenCV
tags:
- 笔记
- opencv
- c++
---


## 一、图像色彩空间转换
### 1.1 基本知识
1. 色彩空间转换函数：cvtColor
```cpp
COLOR_BGR2GRAY = 6	//6彩色到灰度
COLOR_GRAY2BGR = 8	//8灰度到彩色
COLOR_BGR2HSV = 40	//40BGR到HSV
COLOR_HSV2BGR = 54	//54HSV到BGR
```
>GRAY：指灰度，只有一个参数灰度值Channel
>BGR：指BGR颜色空间，以红绿蓝三基色(0~255)为基础，叠加形成各种颜色
>HSV：指六角椎体模型，色调Hue用角度度量（0~180），饱和度Saturation（0 ~ 255），亮度Value（0 ~ 255）
><img src="https://img-blog.csdnimg.cn/20210717084729949.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="40%">


2. 图像保存函数：imwrite
>第一个参数是图像保存路径
>第二个参数是图像内存对象

### 1.2 创建类
①首先添加一个头文件。

<img src="https://img-blog.csdnimg.cn/20210717085808806.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;

<img src="https://img-blog.csdnimg.cn/2021071710584123.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">
&emsp;&emsp;

②头文件内定义一个MyDemo类，代码如下

```cpp
#pragma once

#include <opencv2/opencv.hpp>

using namespace cv;

class MyDemo {
public:
	void colorSpace_Demo(Mat &image);

};
```

③添加包含目录。首先在项目名称上**右键-属性**，打开属性页后，编辑**VC++目录->包含目录**这一项，新建项为头文件所在的目录如图。

<img src="https://img-blog.csdnimg.cn/20210717090541121.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;

<img src="https://img-blog.csdnimg.cn/20210717090624883.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;

<img src="https://img-blog.csdnimg.cn/20210717090745775.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;

④创建一个cpp文件，实现刚才定义的类。

<img src="https://img-blog.csdnimg.cn/20210717090834711.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="50%">


```cpp
#include <mydemo.h>

void MyDemo::colorSpace_Demo(Mat &image) {
	Mat gray, hsv;
	cvtColor(image, hsv, COLOR_BGR2HSV);
	cvtColor(image, gray, COLOR_BGR2GRAY);
	imshow("HSV Image", hsv);
	imshow("Gray Image", gray);
	imwrite("E:/Program/OpenCV/vcworkspaces/opencv_452/img/hsv.png", hsv);
	imwrite("E:/Program/OpenCV/vcworkspaces/opencv_452/img/gray.png", gray);
}
```

### 1.3 编写主函数
```cpp
#include <opencv2/opencv.hpp>
#include <iostream>
#include <mydemo.h>

using namespace cv;

int main(int argc, char** argv) {
	Mat src = imread("E:/Program/OpenCV/vcworkspaces/opencv_452/img/opencv.jpg");//自己找一张图片
	imshow("opencv.jpg", src);

	MyDemo demo;
	demo.colorSpace_Demo(src);

	waitKey(0);
	destroyAllWindows();;
	return 0;
}
```
### 1.4 测试结果

<img src="https://img-blog.csdnimg.cn/20210717100121460.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;

>使用技巧：由于RGB三个参数仅代表颜色，HSV分别代表色调、饱和度、亮度。
>因此对于一个图片想要调整亮度，可以先转换到HSV色彩空间调节亮度，再返回RGB色彩空间即可。

## 二、图像对象的创建与复制
### 2.1 什么是Mat

>关于Mat的问题
>1. 如何操作读进来的图像
>2. 如何遍历访问图像的每个像素点
>3. 如何创建一个空图像

在OpenCV中Mat的数据分为两个部分，**头部和数据部分**。头部包括数据类型、通道数量。


### 2.2 创建空白图像
**创建图像的过程**
①所用函数
```cpp
Mat m_new = Mat::zeros(Size(8, 8),CV_8UC1);
Mat m_new = Mat::ones(Size(8, 8),CV_8UC1);
```
函数中的参数CV_8UC1，表示8位、unsigned char型、Channel通道数为1。

②添加头文件

接下来写demo尝试创建图像，在头文件内添加一行函数的声明。
```cpp
#pragma once

#include <opencv2/opencv.hpp>

using namespace cv;

class MyDemo {
public:
	void colorSpace_Demo(Mat& image);
	void matCreation_Demo();	//这一行是新加的
};
```
③实现创建图像的函数

在mydemo.cpp文件中添加以下代码实现此函数
```cpp
void MyDemo::matCreation_Demo() {

	//创建空白图像
	Mat m_new = Mat::zeros(Size(8, 8),CV_8UC1);
	std::cout << "width = " << m_new.cols << "\theight = " << m_new.rows << "\tchannels = " << m_new.channels() << std::endl;
	std::cout << m_new << std::endl;

}
```
④主函数调用并测试

```cpp
#include <opencv2/opencv.hpp>
#include <iostream>
#include <mydemo.h>

using namespace cv;

int main(int argc, char** argv) {

	MyDemo demo;
	demo.matCreation_Demo();

	waitKey(0);
	destroyAllWindows();;
	return 0;
}
```
输出结果如下图所示，是一个8x8的矩阵：
<img src="https://img-blog.csdnimg.cn/20210717112130660.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

**注意事项：**
&emsp;&emsp;
如果将通道数改为3，也就是`Mat m_new = Mat::zeros(Size(8, 8),CV_8UC3);`，那么输出结果会变成8x24的矩阵，也就是每个像素点会有三个值：

<img src="https://img-blog.csdnimg.cn/20210717112233126.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="100%">
&emsp;&emsp;

如果对三通道使用ones进行初始化，那么只会使每个像素点的第一个通道初始化为1，第二、第三通道仍然初始化为0.

<img src="https://img-blog.csdnimg.cn/2021071711305096.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="100%">
&emsp;&emsp;

可以通过使用`Scalar`函数对图像所有像素点同时进行赋值。**Scalar的三个参数分别为B、G、R**
```cpp
void MyDemo::matCreation_Demo() {

	//创建空白图像
	Mat m_new = Mat::ones(Size(8, 8),CV_8UC3);
	m_new = Scalar(66, 66, 66);
	std::cout << m_new << std::endl;

}
```

<img src="https://img-blog.csdnimg.cn/20210717113957742.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="100%">

&emsp;&emsp;

**图像在哪里**
刚才我们通过io输出，在控制台将图像的像素点值一个一个打印出来。我们当然也可以将它作为一个图像进行输出。只需要将cout换成imshow即可。
```cpp
void MyDemo::matCreation_Demo() {

	//创建空白图像
	Mat m_new = Mat::ones(Size(800, 600),CV_8UC3);
	m_new = Scalar(66, 66, 66);
	imshow("new image",m_new);

}
```

这就是我们生成出来的一个图像

<img src="https://img-blog.csdnimg.cn/20210717114528458.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

### 2.3 图像的复制

对于Mat对象进行赋值操作时，只是相当于两个指针指向了同一块内存空间，只有进行**克隆和拷贝**操作时，才是真正的复制。

①克隆：clone
```cpp
m_clone = image.clone();
```

②拷贝：copyTo
```cpp
image.copyTo(m_copy);
```