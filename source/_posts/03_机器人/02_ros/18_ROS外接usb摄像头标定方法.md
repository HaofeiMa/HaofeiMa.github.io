---
title: ROS外接usb摄像头标定方法
description: >-
  摄像头标定的目的是消除相机畸变，具体畸变原理可以参考之前的文章。usb摄像头在ros系统标定过程大致可以分成几个步骤。①安装usb_camera驱动包；②
  运行usb_cam读取usb摄像头图像；③下载打印棋盘格并进行摄像头标定。
categories:
  - 机器人
  - ROS
tags:
  - ROS
  - 实验
abbrlink: 130b716a
date: 2021-10-20 11:20:28
---



usb_cam官方文档：[http://wiki.ros.org/camera_calibration](http://wiki.ros.org/camera_calibration)
camera_calibrate官方文档：[http://wiki.ros.org/camera_calibration/Tutorials/MonocularCalibration](http://wiki.ros.org/camera_calibration/Tutorials/MonocularCalibration)
棋盘格也在上面的链接中下载。

摄像头标定的目的是消除相机畸变，具体畸变原理可以参考之前的文章[【相机模型与去畸变方法详解】](https://blog.csdn.net/weixin_44543463/article/details/120659447)。usb摄像头在ros系统标定过程大致可以分成几个步骤。①安装usb_camera驱动包；② 运行usb_cam读取usb摄像头图像；③下载打印棋盘格并进行摄像头标定。

### 1. 安装usb_camera驱动包
* 进入工作空间的src目录（这里工作空间目录可能都不一样，自行修改）
* 下载usb_cam源代码
* 编译安装
```bash
cd ~/catkin_ws/src
git clone https://github.com/ros-drivers/usb_cam.git
cd ..
catkin_make
```

### 2. 运行usb_cam读取摄像头图像
首先打开一个终端，运行`roscore`

然后再打开一个终端，运行`usb_cam-test.launch`启动文件（由于刚才下载的源代码中由测试文件，因此可以直接启动）
```bash
cd ~/catkin_ws/src/usb_cam/launch
roslaunch usb_cam-test.launch
```

默认情况下开启的是电脑自带摄像头，如果需要启动外置摄像头，则修改一下launch文件，将参数第一行的value改为`value="/dev/video1"`，然后重新编译一下。
> 如果更改后启动报错，那么执行`ls /dev/video*`命令看看外界摄像头是那个，再将launch文件改为对应的video2或video3。
> 比如我的usb摄像头就是 /dev/video2
```xml
<param name="video_device" value="/dev/video1" />
```

### 3. 进行摄像头标定
再次打开一个终端（前两个分别运行`roscore`和`usb_cam-test`）

**① 查看主题名称**

输入`rostopic list`查看ros中的主题，检查是否有`/usb_cam/camera_info`和`/usb_cam/image_raw`两个主题。（主题名可能会不一样，有可能是/usb_cam_node记住自己的这两个主题的名字）



![](https://img.mahaofei.com/img/202112232015769-camera-calibrate-1.png)



> 如果出现 ImportError: No module named cv2的问题，请参考下面这篇文章
> 文章链接：[【ImportError: No module named cv2问题的解决方法（修改python默认版本）】](https://blog.csdn.net/weixin_44543463/article/details/120717831#pic_center)
>

**② 执行命令启动标定程序**

```bash
rosrun camera_calibration cameracalibrator.py --size 8x6 --square 0.03 image:=/usb_cam/image_raw camera:=/usb_cam
```
其中的8x6是指的棋盘格内部角点的个数，如下图我下载的棋盘格内部角点是8x6的。如果你是11x8角点的棋盘格，那么命令里面的8x6替换成11x8即可。



![](https://img.mahaofei.com/img/202112232016343-camera-calibrate-2.png)



**③ 变换角度使程序记录样本**

拿着棋盘格纸多变幻几个角度，离远离近，边边角角都采集一些样本，当命令行里看到sample接近50的时候，标定按钮calibrate就会变亮了。

**④ 进行标定并保存**
点击CALIBRATE按钮进行标定，等待一小段时间后，就可以在命令行中看到标定的结果。
标定没有问题的花，点击COMMIT按钮就可以保存了，保存之后，下次再启动usb_camera就会自动使用标定的参数，可以发现摄像头不再畸变了。



![](https://img.mahaofei.com/img/202112232016191-camera-calibrate-3.png)



![](https://img.mahaofei.com/img/202112232016631-camera-calibrate-4.png)
