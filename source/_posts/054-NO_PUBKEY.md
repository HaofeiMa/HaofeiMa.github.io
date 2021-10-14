---
title: 由于没有公钥，无法验证下列签名 :NO_PUBKEY 的解决方法
date: 2021-02-16 15:45:50
description: 今天运行apt-get update时突然出现了由于没有公钥，无法验证下列签名的问题，尝试了网上许多方法，最终找到了一种亲测有效的解决方法。
categories:
- 机器人
- ROS
tags:
- bug解决
- ubuntu
---






### 问题描述

今天运行apt-get update时突然出现了由于没有公钥，无法验证下列签名的问题，尝试了网上许多方法，最终找到了一种亲测有效的解决方法：
### 解决方法
**在终端输入：**
```bash
sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 76F1A20FF987672F
```
其中最后的代码为报错语句中的最后一部分：由于没有公钥，无法验证下列签名： NO_PUBKEY **76F1A20FF987672F**
### 解决结果
```bash
Executing: /tmp/apt-key-gpghome.uBwlOPqFFF/gpg.1.sh --keyserver hkp://keyserver.ubuntu.com:80 --recv 76F1A20FF987672F
gpg: key 76F1A20FF987672F: 1 signature not checked due to a missing key
gpg: 密钥 76F1A20FF987672F：公钥“WineHQ packages <wine-devel@winehq.org>”已导入
gpg: 合计被处理的数量：1
gpg:               已导入：1
```