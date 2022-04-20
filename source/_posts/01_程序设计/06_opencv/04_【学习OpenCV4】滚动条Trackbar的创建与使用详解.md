---
title: 【学习OpenCV4】滚动条Trackbar的创建与使用详解
description: OpenCV中使用 createTrackbar() 来创建滚动条，函数的使用方法如下，各个参数的作用也在下面的表格中给出。
categories:
  - 程序设计
  - OpenCV
tags:
  - 笔记
  - OpenCV
  - C++
cover: 'https://img.mahaofei.com/img/202112231905321-opencv-notes4-1.png'
abbrlink: 9a77b96c
date: 2021-07-19 11:58:27
updated: 2021-07-19 11:58:27
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

## 一、Trackbar的创建方法
### 1.1 createTrackbar
&emsp;&emsp;OpenCV中使用`createTrackbar()`来创建滚动条，函数的使用方法如下：
```cpp
createTrackbar(const String& trackbarname, const String& winname,int value, int count,TrackbarCallback onChange = 0,void userdata = 0); 
```
| 位置 | 参数名           | 作用                                |
| ---- | ---------------- | ----------------------------------- |
| 1    | trackbar name    | 滚动条的名字                        |
| 2    | winname          | 绑定的窗口名字                      |
| 3    | value            | 滑块的初始位置                      |
| 4    | count            | 滑块的最大位置                      |
| 5    | TrackbarCallback | 回调函数，拨动Trackbar返回的函数    |
| 6    | userdata         | 用户传给回调函数的数据，不用默认为0 |

### 1.2 回调函数
&emsp;&emsp;第五个参数回调函数TrackbarCallback，是指拨动Trackbar会产生一个事件，系统会捕捉这个事件，然后发送给相应的处理者，因此需要定义一个函数进行相应的处理。回调函数的定义规范如下：
```cpp
void callbackfunc(int value, void* userdata);
```
value传入的是滑块位置变量。
userdata是打包的其他数据，可以通过如结构体的方法打包数据发送给回调函数。当createTrackbar函数最后一个参数为0时表示不使用userdata，这时可以通过全局变量为回调函数传递数据。

## 二、使用Trackbar调节图片亮度

```cpp
//部分代码
static void onTrack(int lightness, void* data) {
	Mat src = *(Mat*)data;	//将void类型指针转换为Mat类型指针，然后再取数据
	Mat m = Mat::zeros(src.size(), src.type());
	Mat dst = Mat::zeros(src.size(), src.type());
	m = Scalar(lightness, lightness, lightness);

	add(src, m, dst);
	imshow("Change Lightness", dst);
}

void MyDemo::checkBar_Demo(Mat& image) {
	namedWindow("Change Lightness", WINDOW_AUTOSIZE);

	int lightness = 50;
	int max_value = 100;

	createTrackbar("Value Bar", "Change Lightness", &lightness, max_value, onTrack,(void *)&image);//最后一个参数强制转换为void类型指针
	onTrack(lightness, &image);
}
```
![](https://img.mahaofei.com/img/202112231905321-opencv-notes4-1.png)