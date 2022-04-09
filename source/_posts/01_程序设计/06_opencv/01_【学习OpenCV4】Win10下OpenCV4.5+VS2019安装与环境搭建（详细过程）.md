---
title: 【学习OpenCV4】Win10下OpenCV4.5+VS2019安装与环境搭建（详细过程）
description: >-
  首先下载并解压OpenCV。建议到opencv的官网下载windows版本的安装包。如果觉得下载速度过慢，我也把opencv4.5.2安装包上传了阿里云https://www.aliyundrive.com/s/VGkaM7vyuck 注意解压的路径，一定要是一个英文路径
categories:
  - 程序设计
  - OpenCV
tags:
  - 笔记
  - OpenCV
  - C++
abbrlink: d2828609
date: 2021-07-16 22:29:13
---

## 一、软件准备

### 1.1 下载并解压OpenCV
&emsp;&emsp;建议到[opencv的官网](https://opencv.org/)下载windows版本的安装包。
>如果觉得下载速度过慢，我也把opencv4.5.2安装包上传了阿里云
>[https://www.aliyundrive.com/s/VGkaM7vyuck](https://www.aliyundrive.com/s/VGkaM7vyuck)



![](https://img.mahaofei.com/img/202112231843882-opencv-notes1-1.png)



![](https://img.mahaofei.com/img/202112231843681-opencv-notes1-2.png)



&emsp;&emsp;下载完之后，双击运行这个文件，**注意解压的路径，一定要是一个英文路径**，等待一段时间解压完成即可。

![](https://img.mahaofei.com/img/202112231844664-opencv-notes1-3.png)




### 1.2 下载并安装Visual Studio
&emsp;&emsp;这里我使用的是Visual Studio 2019 专业版，[官网](https://visualstudio.microsoft.com/zh-hans/vs/)就可以下载。使用其他版本的VS也可以，没有特别要求。

&emsp;&emsp;安装时勾选**使用C++的桌面开发**，然后修改安装位置，其他配置都可以默认。

![](https://img.mahaofei.com/img/202112231844878-opencv-notes1-4.png)



![](https://img.mahaofei.com/img/202112231844934-opencv-notes1-5.png)



>安装完成后，如果需要VS2019 Pro注册码：`NYWVH-HT4XC-R2WYW-9Y3CM-X4V3Y`

## 二、配置OpenCV环境
### 2.1 创建项目
&emsp;&emsp;新建一个**控制台项目**。

![](https://img.mahaofei.com/img/202112231845061-opencv-notes1-6.png)



![](https://img.mahaofei.com/img/202112231845142-opencv-notes1-7.png)



&emsp;&emsp;配置如下图中为**Release**和**x64**版本。

![](https://img.mahaofei.com/img/202112231846358-opencv-notes1-8.png)



### 2.2 配置属性
&emsp;&emsp;打开**视图-其他窗口-属性管理器**（其他版本的VS可能是视图-属性管理器）。

![](https://img.mahaofei.com/img/202112231846533-opencv-notes1-9.png)



&emsp;&emsp;在属性管理器内**右键“Microsoft Cpp x64 user”并点击属性**，打开它的属性页。

![](https://img.mahaofei.com/img/202112231846979-opencv-notes1-10.png)



&emsp;&emsp;①配置**VC++ 目录->包含目录**

![](https://img.mahaofei.com/img/202112231847544-opencv-notes1-11.png)



&emsp;&emsp;在编辑页面添加两个新行，第一个是解压的opencv下面的  **`opencv/build/include`**  这个目录，第二个是  **`opencv/build/include/opencv2`**  这个目录，添加完成后点击确定回到属性页。

![](https://img.mahaofei.com/img/202112231847282-opencv-notes1-12.png)

&emsp;&emsp;

![](https://img.mahaofei.com/img/202112231847556-opencv-notes1-13.png)

&emsp;&emsp;

![](https://img.mahaofei.com/img/202112231848108-opencv-notes1-14.png)

&emsp;&emsp;

![](https://img.mahaofei.com/img/202112231848973-opencv-notes1-15.png)

&emsp;&emsp;②继续配置**VC++目录->库目录**

![](https://img.mahaofei.com/img/202112231849542-opencv-notes1-16.png)

&emsp;&emsp;在编辑页面添加项  **`opencv/build/x64/vc15`**  ，添加完成后同样点击确定回到属性页。

>这里如果是vs2019，那么用最新的vc15会好一些，如果是之前的版本，可以选择vc14目录

![](https://img.mahaofei.com/img/202112231849165-opencv-notes1-17.png)



&emsp;&emsp;

![](https://img.mahaofei.com/img/202112231850283-opencv-ontes1-18.png)



&emsp;&emsp;③继续配置**链接器->输入->附加依赖性**

![](https://img.mahaofei.com/img/202112231850837-opencv-notes1-19.png)

&emsp;&emsp;复制release版本的lib文件名，在编辑项中粘贴即可

![](https://img.mahaofei.com/img/202112231851269-opencv-notes1-20.png)

&emsp;&emsp;

![](https://img.mahaofei.com/img/202112231851586-opencv-notes1-21.png)

&emsp;&emsp;完成以上配置之后，点击右下角的**应用-确定**就可以了。

![](https://img.mahaofei.com/img/202112231851285-opencv-notes1-22.png)

### 2.3 配置环境变量
&emsp;&emsp;复制bin文件夹目录。

![](https://img.mahaofei.com/img/202112231852406-opencv-notes1-23.png)

&emsp;&emsp;回到桌面，**右键计算机-属性-高级系统设置**，打开环境变量。

![](https://img.mahaofei.com/img/202112231852254-opencv-notes1-24.png)



![](https://img.mahaofei.com/img/202112231852926-opencv-notes1-25.png)



&emsp;&emsp;找到系统变量中的Path，点击编辑。

![](https://img.mahaofei.com/img/202112231853801-opencv-notes1-26.png)

&emsp;&emsp;添加一项新项，将刚才复制的bin文件夹目录粘贴过来，然后确定。

![](https://img.mahaofei.com/img/202112231853227-opencv-notes1-27.png)

&emsp;&emsp;**关掉Visual Studio，再重新打开软件**。

## 三、测试程序
&emsp;&emsp;在创建的cpp文件中，添加如下代码：
```cpp
#include <opencv2/opencv.hpp>
#include <iostream>

using namespace cv;

int main(int argc, char** argv) {
	Mat src = imread("F:/NutStore/Documents/素材库/Logo/Huffie.jpg");//自己找一张图片
	imshow("input", src);
	waitKey(0);
	destroyAllWindows();;
	return 0;
}
```
然后生成解决方案，如果没有报错，那么恭喜你！	如果出现错误，那么请自习搜索一下错误原因，或者仔细检查以上的每一步。

![](https://img.mahaofei.com/img/202112231854239-opencv-notes1-28.png)



测试->开始执行（不调试）

![](https://img.mahaofei.com/img/202112231854619-opencv-notes1-29.png)

![](https://img.mahaofei.com/img/202112231854767-opencv-notes1-30.png)

&emsp;&emsp;