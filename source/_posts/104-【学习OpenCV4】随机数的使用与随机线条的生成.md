---
title: 【学习OpenCV4】随机数的使用与随机线条的生成
date: 2021-07-23 10:54:17
description: C和C++中提供了rand() 和srand()函数用于产生随机数，使用C++编写OpenCV代码时也可以使用。同时OpenCV自身也提供了生成随机数的类RNG，使用起来也十分方便，本文主要介绍RNG的使用方法，以及基于RNG生成的随机数，绘制随机线条的方法。
categories:
- 程序设计
- OpenCV
tags:
- 笔记
- opencv
- c++
---

## 一、随机数的使用方法
&emsp;&emsp;C和C++中提供了 `rand()` 和 `srand()` 函数用于产生随机数，使用C++编写OpenCV代码时也可以使用。同时OpenCV自身也提供了生成随机数的类RNG，使用起来也十分方便，以下主要介绍RNG类的使用方法。
```cpp
//RNG类对象的创建
 RNG rng(int seed);	//使用种子seed产生一个RNG类对象

//产生一个在区间[a,b)的均匀分布的整数随机数
int x = rng.uniform(a, b);
//产生一个在区间[0,1)的均匀分布的浮点随机数
int x = rng.uniform(0.f,1.f);
//产生一个均值为0，标准差为2的高斯分布的随机数
int x = rng.gaussian(2);
```

## 二、生成随机线条示例程序
```cpp
void MyDemo::random_Demo() {
	Mat bg = Mat::zeros(Size(512, 512), CV_8UC3);	//创建背景
	int width = bg.cols;
	int height = bg.rows;
	RNG rng(666);	//种子随意设置
	while (true) {
		//等待按键按下，同时限制两线条生成间隔实现
		char k = waitKey(100);
		if(k == 'q')
		{
			break;
		}
		int x1 = rng.uniform(0, width);
		int y1 = rng.uniform(0, height);
		int x2 = rng.uniform(0, width);
		int y2 = rng.uniform(0, height);
		int b = rng.uniform(0, 255);
		int g = rng.uniform(0, 255);
		int r = rng.uniform(0, 255);

		line(bg, Point(x1, y1), Point(x2, y2), Scalar(b, g, r), 1, LINE_AA, 0);
		imshow("Randow image", bg);
	}
}
```

<img src="https://img-blog.csdnimg.cn/img_convert/805c15894954a39e81d5e8e019646617.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="50%">