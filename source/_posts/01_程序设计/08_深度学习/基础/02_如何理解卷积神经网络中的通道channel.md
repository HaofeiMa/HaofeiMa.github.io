---
title: 如何理解卷积神经网络中的通道channel
categories:
  - 程序设计
  - 深度学习
tags:
  - 笔记
  - 基础知识
  - 深度学习
description: 一般channels的含义是，每个卷积层中卷积核的数量。
cover: >-
  https://img-blog.csdn.net/20180404150134375?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvc3NjY19sZWFybmluZw
katex: false
abbrlink: e8acb40e
date: 2022-05-16 16:28:07
updated: 2022-05-16 16:28:07
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

## 什么是通道channel

> [【CNN】理解卷积神经网络中的通道 channel](https://blog.csdn.net/sscc_learning/article/details/79814146)

首先，是 [tensorflow](https://www.tensorflow.org/tutorials/layers) 中给出的，对于输入样本中 `channels` 的含义。一般的RGB图片，`channels` 数量是 3 （红、绿、蓝）；而monochrome图片，`channels` 数量是 1 。

其次，[mxnet](http://mxnet.incubator.apache.org/api/python/gluon/nn.html#mxnet.gluon.nn.Conv2D) 中提到的，一般 `channels` 的含义是，**每个卷积层中卷积核的数量**。

举例：假设现有一个为 6×6×3 的图片样本，使用 3×3×3 的卷积核（filter）进行卷积操作。此时输入图片的 channels 为 3 ，而卷积核中的 in_channels 与 需要进行卷积操作的数据的 channels 一致（这里就是图片样本，为3）。

接下来，进行卷积操作，卷积核中的27个数字与分别与样本对应相乘后，再进行求和，得到第一个结果。依次进行，最终得到 4×4 的结果。

![](https://img-blog.csdn.net/20180404113714719?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvc3NjY19sZWFybmluZw)

上面步骤完成后，由于只有一个卷积核，所以最终得到的结果为 4×4×1 ， out_channels 为 1 。

在实际应用中，都会使用多个卷积核。这里如果再加一个卷积核，就会得到 4×4×2 的结果。

![](https://img-blog.csdn.net/20180404150134375?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvc3NjY19sZWFybmluZw)

**总结**

- 最初输入的图片样本的 `channels` ，取决于图片类型，比如RGB；
- 卷积操作完成后输出的 `out_channels` ，取决于卷积核的数量。此时的 `out_channels` 也会作为下一次卷积时的卷积核的 `in_channels`；
- 卷积核中的 `in_channels` ，就是上一次卷积的 `out_channels` ，如果是第一次做卷积，就是1中样本图片的 `channels` 。