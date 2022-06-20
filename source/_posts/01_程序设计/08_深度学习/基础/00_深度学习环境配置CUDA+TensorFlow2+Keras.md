---
title: 深度学习环境配置CUDA+TensorFlow2+Keras
categories:
  - 程序设计
  - 深度学习
tags:
  - 环境搭建
  - 深度学习
description: Anaconda + CUDA + TensorFlow2 + Keras的深度学习环境搭建过程。
cover: 'https://img.mahaofei.com/img/20220515141701.png'
katex: false
abbrlink: a858b698
date: 2022-05-16 11:03:16
updated: 2022-05-20 11:03:16
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
aplayer:
highlight_shrink:
aside:
stick:
---


# Anaconda

Anaconda是管理各个python包的工具，这里我们主要使用的是numpy，以及其他的一些常用包。

Anaconda官网链接：[https://www.anaconda.com/](https://www.anaconda.com/)

各个系统版本的Anaconda安装程序都可以直接下载安装即可，相关使用方法可以参考==该文章==

# CUDA

1. 首先**查看自己电脑GPU对应的cuda版本**，如图所示**打开 NVIDIA控制面板->帮助->系统信息->组件**（可在控制中心或右下角通知栏打开），我这里GPU对应的cuda版本是11.6.106，所以安装的cuda不能超过这个版本。

![](https://img.mahaofei.com/img/20220515111335.png)


2. **进入[CUDA Toolkit Archive](https://developer.nvidia.com/cuda-toolkit-archive)网站**选择低于刚才查到的版本的cudatoolkit，本文选择CUDA Toolkit 11.0 Update 3，**下载安装包**约2.7G。

> 注意：这里选择的cuda版本会决定后面安装cudnn和tensorflow-gpu的版本，三者是相关的，如果版本不匹配将无法使用，具体匹配版本参考[https://tensorflow.google.cn/install/source_windows](https://tensorflow.google.cn/install/source_windows)，下表为节选。


| 版本                  | Python 版本 | 编译器             | 构建工具            | cuDNN | CUDA |
|:--------------------- |:----------- |:------------------ |:------------------- |:----- |:---- |
| tensorflow_gpu-2.6.0  | 3.6-3.9     | MSVC 2019          | Bazel 3.7.2         | 8.1   | 11.2 |
| tensorflow_gpu-2.5.0  | 3.6-3.9     | MSVC 2019          | Bazel 3.7.2         | 8.1   | 11.2 |
| tensorflow_gpu-2.4.0  | 3.6-3.8     | MSVC 2019          | Bazel 3.1.0         | 8.0   | 11.0 |
| tensorflow_gpu-2.3.0  | 3.5-3.8     | MSVC 2019          | Bazel 3.1.0         | 7.6   | 10.1 |
| tensorflow_gpu-2.2.0  | 3.5-3.8     | MSVC 2019          | Bazel 2.0.0         | 7.6   | 10.1 |
| tensorflow_gpu-2.1.0  | 3.5-3.7     | MSVC 2019          | Bazel 0.27.1-0.29.1 | 7.6   | 10.1 |
| tensorflow_gpu-2.0.0  | 3.5-3.7     | MSVC 2017          | Bazel 0.26.1        | 7.4   | 10   |
| tensorflow_gpu-1.15.0 | 3.5-3.7     | MSVC 2017          | Bazel 0.26.1        | 7.4   | 10   |
| tensorflow_gpu-1.14.0 | 3.5-3.7     | MSVC 2017          | Bazel 0.24.1-0.25.2 | 7.4   | 10   |
| tensorflow_gpu-1.13.0 | 3.5-3.7     | MSVC 2015 update 3 | Bazel 0.19.0-0.21.0 | 7.4   | 10   |

![](https://img.mahaofei.com/img/20220515141105.png)


3. 双击下载的**exe安装包**，选择**临时解压**位置，然后点击ok，解压时间两分钟左右。

![](https://img.mahaofei.com/img/20220515140740.png)


4. **同意许可协议**，然后选择**自定义安装**选项，然后点击**下一步**

![](https://img.mahaofei.com/img/20220515141240.png)

![](https://img.mahaofei.com/img/20220515141310.png)

5. 选择驱动程序组件，一定要**勾选CUDA**，然后点击**下一步**。

![](https://img.mahaofei.com/img/20220515141348.png)

6. 选择自己电脑上的一个安装位置，然后**开始安装**。

![](https://img.mahaofei.com/img/20220515141701.png)


7. **等待安装结束**，本电脑18年笔记本机械硬盘安装**耗时约5分钟**

8. **检查环境变量**，一般安装完成后会自动配置好环境变量，打开**设置-系统-系统信息-高级系统设置-环境变量**进行检查，如果没有则需要自行添加（注意添加时修改成自己的安装路径）

- 系统变量中是否有**CUDA**和**NVCUDASAMPLES**两组环境变量。

![](https://img.mahaofei.com/img/20220515142616.png)


- 打开系统变量的Path，查看是否有以下环境变量。

![](https://img.mahaofei.com/img/20220515142701.png)


9. CUDA安装完成


# cnDNN

1. 打开[cudnn官网](https://developer.nvidia.com/rdp/cudnn-archive)，根据上面的表格查看自己应该下载的cuDNN版本，我的CUDA版本为11.0，对应cuDNN版本为8.0，注意看清cuDNN后面有对应的CUDA版本，一个cuDNN可能对应多个版本的CUDA，下载时会要求先注册NVIDIA账号。

![](https://img.mahaofei.com/img/20220515140956.png)

2. 解压文件，将解压后的文件移动到CUDA对应的安装目录中

![](https://img.mahaofei.com/img/20220515143854.png)


3. cuDNN安装完成


# 安装TensorFlow

1. 打开cmd命令行界面（建议以管理员身份打开），切换opentuna的pip镜像源

```shell
pip config set global.index-url https://opentuna.cn/pypi/web/simple
```

2. 创建虚拟环境，后面跟的是电脑安装的python版本，注意是否与

```shell
conda create -n tensorflow2 python=3.8
```

3. 激活虚拟环境

```shell
conda activate tensorflow2
```

4. 安装tensorflow，具体版本号根据上面的表格对应。

```shell
pip install tensorflow-gpu==2.3.0
```

![](https://img.mahaofei.com/img/20220515145711.png)

5. 验证安装是否成功，打开cmd界面，输入以下命令，查看输出是否Successfly

```python
python
import tensorflow as tf
tf.config.list_physical_devices('GPU')
```

![](https://img.mahaofei.com/img/20220515154240.png)

如果出现`Could not load dynamic library 'cudart64_110.dll'`不要慌，说明安装完成之后没有重启电脑，重启再运行就好了。

# Keras

1. TensorFlow与Keras版本对应参考下表

|Tensorflow|Keras|
|--|--|
|TensorFlow 2.0.0|Keras 2.3.1|
|TensorFlow 2.1.0|Keras 2.3.1|
|TensorFlow 2.2.0|Keras 2.3.1|
|TensorFlow 2.4.0|Keras 2.4.3|
|TensorFlow 2.6.0|Keras 2.6.0|

2. 运行仍然在Anaconda的**tensorflow2环境中运行下面的指令**

```shell
pip install keras==2.4.3
```

![](https://img.mahaofei.com/img/20220515151729.png)

