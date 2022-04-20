---
title: 【学习OpenCV4】在OpenCV中响应键盘与鼠标操作
description: 主要介绍了OpenCV中键盘和鼠标的响应方法，其中用到的各种函数，以及函数各个参数的解释。利用鼠标和键盘的响应编写了一些有趣的小程序。
categories:
  - 程序设计
  - OpenCV
tags:
  - 笔记
  - OpenCV
  - C++
cover: 'https://img.mahaofei.com/img/202112231912888-opencv-notes9-2.png'
abbrlink: a8150f32
date: 2021-07-24 10:29:40
updated: 2021-07-24 10:29:40
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

## 一、键盘的响应
### 1.1 基本知识
&emsp;&emsp;按键的读取只需要使用waitKey()函数就可以实现，十分简单。
 ```cpp
 int waitKey（int delay=0）
 ```
&emsp;&emsp;**函数参数为延时时间(ms)**。
&emsp;&emsp;delay<=0时，等待时间无限长，按下按键时函数结束，**返回按键的键值**。·
&emsp;&emsp;delay>0时，等待delay毫秒按键响应，等待时间结束仍未按下按键则返回-1。
>  本人opencv4+vs2019实操时，没有按键时不返回值，有按键按下时返回对应键值。
### 1.2 确定按键响应值
&emsp;&emsp;使用如下代码，可以测试自己的键盘对应的键值是多少。
```cpp
void MyDemo::key_Demo(Mat& image) {
	while(true) {
		char k = waitKey(0);
		std::cout << k << std::endl;
	}
}
```


![](https://img.mahaofei.com/img/202112231911085-opencv-notes9-1.png)



### 1.3 按键调节亮度

```cpp
/*按下1时：图片亮度增大
按下2时，图片亮度减小
按下q时，程序退出*/
void MyDemo::key_Demo(Mat& image) {
	Mat m = Mat::zeros(image.size(),image.type());
	m = Scalar(10, 10, 10);	//增大或减小图片亮度的变化量
	while(true) {
		char k = waitKey(10);
		if (k == 'q') {	// Quit
			break;
		}
		if (k == '1') {	//Key 1
			std::cout << "You enter key 1 - Lightness Up." << std::endl;
			add(image, m, image);
		}
		if (k == '2') {	//Key 2
			std::cout << "You enter key 2 - Lightness Down." << std::endl;
			subtract(image, m, image);
		}
		imshow("Key", image);
	}
}
```
## 二、鼠标的响应
### 1.1 基本知识
&emsp;&emsp;鼠标响应所使用的函数主要是 `setMouseCallback()` 。
```cpp
 void setMousecallback(
	 const string& 	winname,	//窗口的名字
	 MouseCallback 	onMouse,	//鼠标响应回调函数
	 void* 			userdata=0	//传给回调函数的参数
 );
```


&emsp;&emsp;其中onMouse响应回调函数函数，作用为指定窗口里每次鼠标时间发生的时候，被调用的函数指针。 这个函数的原型应该为的原型如下：
```cpp
void on_Mouse(
	int 	event,		//事件回传代号
	int 	x,			//鼠标指针在图像坐标系的坐标x
	int		y,			//鼠标指针在图像坐标系的坐标y
	int 	flags,		//CV_EVENT_FLAG的组合
	void* 	userdata	//传递的参数
);
```


| Event               | 作用     |
| ------------------- | -------- |
| EVENT_MOUSEMOVE     | 滑动     |
| EVENT_LBUTTONDOWN   | 左键点击 |
| EVENT_RBUTTONDOWN   | 右键点击 |
| EVENT_MBUTTONDOWN   | 中键点击 |
| EVENT_LBUTTONUP     | 左键放开 |
| EVENT_RBUTTONUP     | 右键放开 |
| EVENT_MBUTTONUP     | 中键放开 |
| EVENT_LBUTTONDBLCLK | 左键双击 |
| EVENT_RBUTTONDBLCLK | 右键双击 |
| EVENT_MBUTTONDBLCLK | 中键双击 |

### 1.2 示例程序
&emsp;&emsp;在图像上实现拖动绘制矩形的画板功能。

![](https://img.mahaofei.com/img/202112231912888-opencv-notes9-2.png)



```cpp
Point sp(-1, -1);	//起始点（初始值-1，-1）
Point ep(-1, -1);	//结束点（初始值-1，-1）
Mat temp;			//原图的克隆，用于实时刷新图片

static void on_draw(int event, int x, int y, int flags, void* userdata) {
	Mat bg = *(Mat*)userdata;	//回调函数传过来的图像数据
	if (event == EVENT_LBUTTONDOWN) {	//如果左键被按下
		sp.x = x;	//保存左键按下时的xy值
		sp.y = y;
		std::cout << "Start point: " << sp << std::endl;
	}
	else if (event == EVENT_LBUTTONUP) {//如果左键被抬起
		ep.x = x;	//保存左键抬起时的xy值
		ep.y = y;
		int dx = ep.x - sp.x;	//计算矩形长宽
		int dy = ep.y - sp.y;
		if (dx > 0 && dy > 0) {	//当矩形长宽都为正数时
			Rect box(sp.x, sp.y, dx, dy);
			rectangle(bg, box, Scalar(0, 0, 255), 2, 8, 0);	//绘制矩形
			imshow("Mouse Drawing", bg);
			imshow("ROI", temp(box));	//显示ROI区域（被框选的区域）
			sp.x = -1;	//起始点坐标复位
			sp.y = -1;
		}
	}
	else if (event == EVENT_MOUSEMOVE) {
		if (sp.x > 0 && sp.y > 0) {		//当起始点坐标不是初始值，且鼠标移动时
			ep.x = x;
			ep.y = y;
			int dx = ep.x - sp.x;
			int dy = ep.y - sp.y;
			if (dx > 0 && dy > 0) {
				Rect box(sp.x, sp.y, dx, dy);
				temp.copyTo(bg);	//刷新屏幕，清除上一循环绘制的矩形
				rectangle(bg, box, Scalar(0, 0, 255), 2, 8, 0);	//绘制新矩形
				imshow("Mouse Drawing", bg);
			}
		}
	}
}

void MyDemo::mouseDrawing_Demo(Mat& image) {
	namedWindow("Mouse Drawing", WINDOW_AUTOSIZE);	//创建一个窗口
	setMouseCallback("Mouse Drawing", on_draw,(void*)(&image));	//调用鼠标回调函数
	imshow("Mouse Drawing", image);
	temp = image.clone();
}
```