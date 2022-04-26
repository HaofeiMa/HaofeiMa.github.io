---
title: Anaconda的基本使用与在Pycharm中调用
categories:
  - 程序设计
  - Python
tags:
  - Python
  - 笔记
description: >-
  我想要在电脑上安装许多不同版本的python，或者想要让python环境中只存在用到的包方便对程序打包发布，这些情况都需要我们创建python虚拟环境，Anaconda就是一个这样管理python环境的工具。
cover: 'https://img.mahaofei.com/img/20220426091219.png'
abbrlink: 8543c9d
date: 2022-04-22 17:00:27
updated: 2022-04-22 17:00:27
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

# 关于Anaconda

环境 = “好比一栋楼，在楼里面分配一间屋给各种‘包’放，每间房里面的‘包’互不影响”

激活环境 = “告诉电脑，我现在要用这个屋子里面的‘包’来做东西了所以要进这间屋子”

移除环境 = “现在这个屋子里面我原来要用的东西现在不需要了把它赶出去节省电脑空间”

Conda创建环境相当于创建一个虚拟的空间将这些包都装在这个位置，我不需要了可以直接打包放入垃圾箱，同时也可以针对不同程序的运行环境选择不同的conda虚拟环境进行运行。

例如：

我的某个程序需要使用python3.8以及一堆其他的包，另一个程序需要python2.7加其它的一些包，这就需要我为这两个程序分别创建虚拟环境。

这样就可以在一台电脑上实现**多个版本的python程序编写**，同时想**打包程序为exe**的时候，也不会打包进其它没用到的包。

# Anaconda的安装

Anaconda官网链接：[https://www.anaconda.com/](https://www.anaconda.com/)

各个系统版本的Anaconda安装程序都可以直接下载安装即可。

# Anaconda的使用

## 配置Anaconda源

通常anaconda的默认源在境外，下载速度会非常慢甚至导致网络错误下载包失败，打开`Anaconda Prompt`使用以下方法将清华镜像添加到`Anaconda`。

```shell
conda config --add channels https://mirrors.tuna.tsinghua.edu.cn/anaconda/pkgs/free/
conda config --add channels https://mirrors.tuna.tsinghua.edu.cn/anaconda/pkgs/main/ 
conda config --set show_channel_urls yes
```

使用如下命令查看当前channel

```shell
conda info
```

## Anaconda Prompt

**conda版本**

```shell
conda --version
```

**列出所有虚拟环境**

```shell
conda env list
conda info --envs
```


**创建虚拟环境**

```shell
conda create -n 环境名

# conda create --name python39 python=3.9
```

**删除已有的环境及其安装包**
```shell
conda remove --name 环境名 --all
```

**克隆环境**

```shell
conda create --name 新环境名 --clone 原环境名
```

**激活某个环境**

```shell
activate 环境名
```

**退出当前环境**

```shell
conda deactivate
```

**查看环境中现有的包**

```
conda list
```

**用conda或者pip安装包到当前环境**

```shell
conda install 包名称
```

**包更新**

```shell
conda update numpy
```

## Anaconda Navigtor

用于管理工具包和环境的图形用户界面，后续涉及的众多管理命令也可以在 Navigator 中手工实现。

# Pycharm中使用

**1. 新建工程后，选择使用现有的解释器**

![](https://img.mahaofei.com/img/20220422191328.png)

**2. 选择自己新建的虚拟环境**

![](https://img.mahaofei.com/img/20220422191623.png)
