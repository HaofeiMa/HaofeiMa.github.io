---
title: ImportError No module named cv2问题的解决方法（修改python默认版本）
description: >-
  在调用opencv安装包时，会出现ImportError  No module named
  cv2的问题。我确定我已经安装了opencv，查阅资料后发现是因为安装opencv是会安装的python版本，与系统默认使用的版本不一致，才会导致找不到模块。
categories:
  - 程序设计
  - OpenCV
tags:
  - bugs
  - OpenCV
  - C++
abbrlink: cad41dc4
date: 2021-10-12 10:14:12
---





### 问题描述

在调用opencv安装包时，会出现 **ImportError: No module named cv2** 的问题：



![](https://img.mahaofei.com/img/202112231958111-no-module-1.png)



### 产生原因
我确定我已经安装了opencv，但为什么还是显示没有此模块。查阅资料后发现是因为安装opencv是会安装到它默认的python版本，而这个python版本与系统默认使用的版本不一致，才会导致找不到模块。

例如我的电脑里安装了python2.7和python3.8两个版本，ubuntu系统启动程序默认使用python2.7，而opencv则安装在python3.8环境中。

### 解决方法



> 首先确定你是不是真的没有安装opencv的python支持，可以运行如下代码安装：
>
> sudo pip3 install opencv-python
>
> 如果安装完还不能解决问题，看以下步骤



更改系统的默认python版本，改为所使用的高版本。

可以先使用`ls /usr/bin/python*`查看系统中存在的python版本



![](https://img.mahaofei.com/img/202112231958436-no-module-2.png)



然后移除软连接，更改python默认版本

```bash
sudo rm /user/bin/python
sudo ln -s /usr/bin/python3.5 /usr/bin/python
```

&emsp;
 再次启动之前的程序，正常启动，不再显示ImportError: No module named cv2了！



![](https://img.mahaofei.com/img/202112231959476-no-module-3.png)

