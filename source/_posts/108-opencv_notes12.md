---
title: 【学习OpenCV4】摄像头视频的读取与存储
date: 2021-07-27 11:42:52
description: 在图像处理中，读取视频并进行处理是必不可少的操作，在OpenCV中，读取摄像头的视频所用到的主要函数为 capture()。本文介绍了使用OpenCV读取摄像头视频的方法，以及对摄像头视频进行存储操作的函数实现过程以及具体的解释。
categories:
- 程序设计
- OpenCV
tags:
- 笔记
- opencv
- c++
---

### 1. 如何读取摄像头
&emsp;&emsp;在图像处理中，读取视频并进行处理是必不可少的操作，在OpenCV中，读取摄像头的视频所用到的主要函数为 `capture()`。
&emsp;&emsp;①VideoCapture类的构造函数：
```cpp
VideoCapture::VideoCapture()
VideoCapture::VideoCapture(const string& filename)
VideoCapture::VideoCapture(int device)
```
&emsp;&emsp;②读取摄像头视频的函数：
```cpp

VideoCapture& capture.read(Mat& image)
```
此函数用于捕获视频的每一帧，并返回刚刚捕获的帧如果没有视频帧被捕获，返回false。
&emsp;&emsp;
&emsp;&emsp;读取摄像头视频的示例程序如下：
```cpp
void MyDemo::video_Demo(Mat& image) {
	VideoCapture capture(0);	//创建VideoCapture类
	Mat frame;					//定义Mat对象用于存储每一帧数据
	while (true) {
		capture.read(frame);	//逐帧读取视频
		flip(frame, frame, 1);	//将读取的视频左右反转
		if (frame.empty()) {	//如果视频结束或未检测到摄像头则跳出循环
			break;
		}
		imshow("Video", frame);	//每次循环显示一帧图像
		char k = waitKey(10);	//两帧读取的间隔时间
		if (k == 'q') {			//按下q键退出循环
			break;
		}
	}
	capture.release();			//释放视频
}
```

### 2. 视频的存储
&emsp;&emsp;视频的存储所用到的是 `VideoWriter ` 类。所使用到的类属性和方法如下

```cpp
bool open(
	const string& 	filename,		//文件路径
	int 			fourcc,			//四个字符用来表示压缩帧的codec
	double 			fps,			//被创建视频流的帧率
	Size 			frameSize,		//视频流的大小
	bool 			isColor=true	//True则每一帧为彩色图，否则为灰度图
);
```
其中fourcc编码格式可选参数如下：
| 参数                          | 编码格式             |
| ----------------------------- | -------------------- |
| CV_FOURCC('P','I','M','1')    | MPEG-1               |
| CV_FOURCC('M','J','P','G')    | motion-jpeg          |
| CV_FOURCC('M', 'P', '4', '2') | MPEG-4.2             |
| CV_FOURCC('D', 'I', 'V', '3') | MPEG-4.3             |
| CV_FOURCC('D', 'I', 'V', 'X') | MPEG-4               |
| CV_FOURCC('U', '2', '6', '3') | H263                 |
| CV_FOURCC('I', '2', '6', '3') | H263I                |
| CV_FOURCC('F', 'L', 'V', '1') | FLV1                 |
| -1                            | 弹出一个编码器选择框 |

保存摄像头视频的程序：

```cpp
void MyDemo::video_Demo(Mat& image) {
	VideoCapture capture(0);	//创建VideoCapture类
	int frame_width = capture.get(CAP_PROP_FRAME_WIDTH);	//获取摄像头的宽、高
	int frame_height = capture.get(CAP_PROP_FRAME_HEIGHT);

	VideoWriter writer;		//创建VideoWriter类
	int fourcc = writer.fourcc('D', 'I', 'V', 'X');	//定义编码格式
	writer.open("E:/Program/OpenCV/vcworkspaces/opencv_452/img/test.mp4", fourcc, 30, Size(frame_width, frame_height), true);	//保存视频

	Mat frame;					//定义Mat对象用于存储每一帧数据
	while (capture.isOpened()) {
		capture.read(frame);	//逐帧读取视频
		flip(frame, frame, 1);	//将读取的视频左右反转
		if (frame.empty()) {	//如果视频结束或未检测到摄像头则跳出循环
			break;
		}
		writer.write(frame);
		imshow("Video", frame);	//每次循环显示一帧图像
		char k = waitKey(33);	//两帧读取的间隔时间 1s/30fps=33ms
		if (k == 'q') {			//按下q键退出循环
			break;
		}
	}
	capture.release();			//释放视频
	writer.release();
}
```


![](https://gitee.com/huffiema/pictures/raw/master/image/202112231918357-opencv-notes12-1.png)