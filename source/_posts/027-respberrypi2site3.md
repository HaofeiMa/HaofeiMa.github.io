---
title: 【树莓派搭建个人网站】花生壳内网穿透
date: 2021-01-20 22:57:09
description: 如果wordpress已经安装设置完成后，浏览器输入 localhost 或者 树莓派的ip地址，就可以访问到网站了，但是外网（不在一个路由器内）仍然无法访问，而内网穿透的目的就是使外网的计算机能够访问你的网站。为了减少配置的难度和复杂度，我使用了花生壳进行配置。
categories:
- 嵌入式
- 树莓派
tags:
- 树莓派
- 网站搭建
---

如果wordpress已经安装设置完成后，浏览器输入`localhost`或者 `树莓派的ip地址`，就可以访问到网站了，但是外网（不在一个路由器内）仍然无法访问，而内网穿透的目的就是使外网的计算机能够访问你的网站。为了减少配置的难度和复杂度，我使用了花生壳进行配置。
（虽然说是免费内网穿透，但是过程中是花费了6元）
## 一、 安装花生壳
1. 进入[官网下载页面](https://hsk.oray.com/download/)，下载**树莓派32位系统**。
2. 通过cd命令进入对应下载目录，输入下面的命令进行安装：
```bash
dpkg -i phtunnel_5_0_rapi_armhf.deb
```
3. 安装成功后，将显示此树莓派的SN码、默认密码以及远程管理地址。记住这里的SN码。
<img src="https://img-blog.csdnimg.cn/20210119150828190.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
## 二、配置花生壳
1. 浏览器输入远程管理地址[b.oray.com](b.oray.com)进入花生壳远程管理页面，输入安装花生壳时生成的SN码及默认密码admin进入。
2. 首次登录，需要通过扫码或者密码进行激活操作，两种方法任选一种。
3. 激活成功后，即可免费开通内网穿透。
## 三、配置内网穿透
1. 点击控制台左侧的花生壳-账号列表，点击自己的账号名，即可进入内网穿透的配置页面
2. 添加映射，映射类型选择http，这里就需要支付6元了。
3. 其它配置按下图配置即可，域名只能选择固定的域名，外网端口只能选择动态端口，内网主机为树莓派的ip地址，端口一般是80。
<img src="https://img-blog.csdnimg.cn/20210119152257306.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">

这样就已经实现外网访问自己用wordpress搭建的个人网站了。