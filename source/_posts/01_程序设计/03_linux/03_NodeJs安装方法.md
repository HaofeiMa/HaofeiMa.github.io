---
title: NodeJs安装方法
description: 尝试在Ubuntu上使用Picgo，在安装插件时总出现提示需要安装nodejs，按流程安装后也无法解决，因此重新安装了一遍nodejs。
categories:
  - 程序设计
  - Linux
tags:
  - Ubuntu
  - 网站搭建
cover: 'https://img.mahaofei.com/img/20220410093312.png'
abbrlink: 7349121e
date: 2021-02-18 15:55:24
updated: 2021-02-18 15:55:24
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

# 问题描述

未正确安装nodejs，导致安装之后node -v有输出，npm -v无反应。

重新安装nodejs


# 解决方法

## 卸载nodejs

```shell
sudo apt-get remove nodejs
sudo apt-get remove --purge npm
sudo apt-get remove --purge nodejs
```

进入 /usr/local/lib 删除所有 node 和 node_modules文件夹 
进入 /usr/local/include 删除所有 node 和 node_modules 文件夹
（这里我删除的是nodejs文件夹）

## 安装nodejs
```shell
sudo apt-get install nodejs
node -v

# 安装最新的 node v10.x
curl -sL https://deb.nodesource.com/setup_16.x | sudo -E bash -
sudo apt-get install -y nodejs
node -v
npm -v
```

