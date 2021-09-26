---
title: 【学习OpenCV4】Win10下OpenCV4.5+VS2019安装与环境搭建（详细过程）
date: 2021-07-16 22:29:13
description: 首先下载并解压OpenCV。建议到opencv的官网下载windows版本的安装包。如果觉得下载速度过慢，我也把opencv4.5.2安装包上传了阿里云https://www.aliyundrive.com/s/VGkaM7vyuck 注意解压的路径，一定要是一个英文路径
categories:
- 程序设计
- OpenCV
tags:
- 笔记
- opencv
- c++
---

## 一、软件准备

#### 1.1 下载并解压OpenCV
&emsp;&emsp;建议到[opencv的官网](https://opencv.org/)下载windows版本的安装包。
>如果觉得下载速度过慢，我也把opencv4.5.2安装包上传了阿里云
>[https://www.aliyundrive.com/s/VGkaM7vyuck](https://www.aliyundrive.com/s/VGkaM7vyuck)

<img src="https://img-blog.csdnimg.cn/img_convert/58ebcb7903702e479292e81f4ddb70c3.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

<img src="https://img-blog.csdnimg.cn/img_convert/7fcdd6daaf59b6348a801b75853dce1f.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;下载完之后，双击运行这个文件，**注意解压的路径，一定要是一个英文路径**，等待一段时间解压完成即可。
<img src="https://img-blog.csdnimg.cn/img_convert/d6262de5383006717ba6700941e85e2d.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">


#### 1.2 下载并安装Visual Studio
&emsp;&emsp;这里我使用的是Visual Studio 2019 专业版，[官网](https://visualstudio.microsoft.com/zh-hans/vs/)就可以下载。使用其他版本的VS也可以，没有特别要求。

&emsp;&emsp;安装时勾选**使用C++的桌面开发**，然后修改安装位置，其他配置都可以默认。

<img src="https://img-blog.csdnimg.cn/img_convert/cb0c8efb4ceb3ebe695aa460fa232ce5.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

<img src="https://img-blog.csdnimg.cn/img_convert/7628f067e20237fc9e9db31c838672ad.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

>安装完成后，如果需要VS2019 Pro注册码：`NYWVH-HT4XC-R2WYW-9Y3CM-X4V3Y`

## 二、配置OpenCV环境
#### 2.1 创建项目
&emsp;&emsp;新建一个**控制台项目**。
<img src="https://img-blog.csdnimg.cn/img_convert/7e245920aa0908dabe4943be4a69f3b5.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

<img src="https://img-blog.csdnimg.cn/img_convert/ba6acdb91b130e1fbe78f7186d1658d1.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;配置如下图中为**Release**和**x64**版本。
<img src="https://img-blog.csdnimg.cn/img_convert/9d2be154393957abac93b482c367d760.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

#### 2.2 配置属性
&emsp;&emsp;打开**视图-其他窗口-属性管理器**（其他版本的VS可能是视图-属性管理器）。

<img src="https://img-blog.csdnimg.cn/img_convert/e081a18b614a44e6ce22535970679079.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;在属性管理器内**右键“Microsoft Cpp x64 user”并点击属性**，打开它的属性页。

<img src="https://img-blog.csdnimg.cn/img_convert/e329837facba80b57592d0121cf14ec7.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;①配置**VC++ 目录->包含目录**

<img src="https://img-blog.csdnimg.cn/img_convert/51591ac9a403ff5b6249622ad9b91e20.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;在编辑页面添加两个新行，第一个是解压的opencv下面的  **`opencv/build/include`**  这个目录，第二个是  **`opencv/build/include/opencv2`**  这个目录，添加完成后点击确定回到属性页。

<img src="https://img-blog.csdnimg.cn/img_convert/9ebac5643a03dc6cd366a0c3929d2797.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;

<img src="https://img-blog.csdnimg.cn/img_convert/a975fd9e4b9153139a6c1ae7c4bd1037.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;

<img src="https://img-blog.csdnimg.cn/img_convert/00fdf0f70c4d331b1ec609e33c0cd914.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;

<img src="https://img-blog.csdnimg.cn/img_convert/891d2e116d39dbe5e5b5478389243106.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;②继续配置**VC++目录->库目录**
&emsp;&emsp;
<img src="https://img-blog.csdnimg.cn/img_convert/9836148df92c27e350ab6947e88555ae.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">
&emsp;&emsp;在编辑页面添加项  **`opencv/build/x64/vc15`**  ，添加完成后同样点击确定回到属性页。
>这里如果是vs2019，那么用最新的vc15会好一些，如果是之前的版本，可以选择vc14目录

<img src="https://img-blog.csdnimg.cn/img_convert/b5d8cb486c7af5269a2dfdcfdba1973f.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">
&emsp;&emsp;
<img src="https://img-blog.csdnimg.cn/img_convert/df376a1c2392d47b46eebff044ad378a.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;③继续配置**链接器->输入->附加依赖性**

<img src="https://img-blog.csdnimg.cn/img_convert/9f75a83445120d6b60e0653b8e8bf039.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;复制release版本的lib文件名，在编辑项中粘贴即可

<img src="https://img-blog.csdnimg.cn/img_convert/a371f4d584dc84e6875643cf3587ed7d.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">
&emsp;&emsp;
<img src="https://img-blog.csdnimg.cn/img_convert/8a632206d5cebaff8a08b3fa1f45aa5d.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;完成以上配置之后，点击右下角的**应用-确定**就可以了。

<img src="https://img-blog.csdnimg.cn/img_convert/f6ab12c5f78033318e5bca7cc2af218d.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

#### 2.3 配置环境变量
&emsp;&emsp;复制bin文件夹目录。
<img src="https://img-blog.csdnimg.cn/img_convert/fa6e04a589a630088098d0e60f986dde.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">
&emsp;&emsp;回到桌面，**右键计算机-属性-高级系统设置**，打开环境变量。
<img src="https://img-blog.csdnimg.cn/img_convert/092696a76edf928b3cbb12a97ff24935.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

<img src="https://img-blog.csdnimg.cn/img_convert/e98abda2bb7338b82723329c501242ee.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;找到系统变量中的Path，点击编辑。
<img src="https://img-blog.csdnimg.cn/img_convert/f445d0ff81b7d6a57c7e3a237433f668.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="60%">

&emsp;&emsp;添加一项新项，将刚才复制的bin文件夹目录粘贴过来，然后确定。
<img src="https://img-blog.csdnimg.cn/img_convert/a20530bdd48fb50af6d2634a020494db.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">
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

<img src="https://img-blog.csdnimg.cn/img_convert/d0c491156520fe70d48963852113bb0d.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

测试->开始执行（不调试）
<img src="https://img-blog.csdnimg.cn/img_convert/f931623d36254451538bc83dfd79ea4d.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

<img src="https://img-blog.csdnimg.cn/img_convert/9994db93fb562b346644f83ee736ebed.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70#pic_center" width="80%">

&emsp;&emsp;