---
title: 【个人网站搭建教程】阿里云服务器+宝塔+wordpress
description: 建设一个网站需要服务器和域名。本文介绍了服务器和域名购买和申请的全部过程，以及后续服务器配置，wordpress安装，直到博客顺利搭建的全过程，供参考。
categories:
  - 程序设计
  - 网站
tags:
  - 网站搭建
  - WordPress
  - 阿里云
cover: 'https://img.mahaofei.com/img/202112231629303-ali-bt-wp-1.png'
abbrlink: bd8011a0
date: 2021-02-14 23:21:21
updated: 2021-02-14 23:21:21
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


## 一、服务器和域名的申请

### 1.1 服务器的购买
1. 进入阿里云官网，购买ECS云服务器（可以看看[开发者成长计划](https://developer.aliyun.com/plan/promotion/1?spm=a2c6h.13813017.1364563.d100010001.5ab41d3cmWpHDS&utm_content=g_1000199894)，虽然我当时是在618这里买的学生ECS）。服务器的系统选择CentOS或Ubuntu。
![](https://img.mahaofei.com/img/202112231629303-ali-bt-wp-1.png)
购买完成后会进入[控制台](https://ecs.console.aliyun.com/)，在这里可以看到自己刚才购买的服务器。
![](https://img.mahaofei.com/img/202112231630259-ali-bt-wp-2.png)
2. 服务器使用之前，我们需要先重置root用户密码。
![](https://img.mahaofei.com/img/202112231630681-ali-bt-wp-3.png)
3. 重置密码完成后就可以通过**公网IP**，使用xshell或者PuTTy或者阿里平台的远程连接工具登陆服务器了。

### 1.2 域名申请与备案
1. 进入[域名注册平台](https://wanwang.aliyun.com/domain?utm_content=se_1008301712)，选一个合适的域名，点击结算。（如果之前没有申请过域名的话，在结算时需要创建个人的信息模板，按要求填写信息即可）。
![](https://img.mahaofei.com/img/202112231631536-ali-bt-wp-4.png)
2. 购买后域名的注册就完成了，然后需要网站备案。进入阿里[备案首页](https://beian.aliyun.com/)，开始备案。
![](https://img.mahaofei.com/img/202112231631757-ali-bt-wp-5.png)
3. 填写完成个人信息，点击信息校验（**注意：要求域名注册后两到三天再来备案**）
![](https://img.mahaofei.com/img/202112231631006-ali-bt-wp-6.png)
然后按要求填写自己的信息，网站的信息，进行身份验证，提交审核。**注意各项信息都要填写准确，不符合要求的后续还要打电话修改**。
4. 提交审核后，在一个工作日之内，阿里云的客服会打电话确认身份，同时告知备案信息需要修改的地方，这期间需要保持电话畅通。
5. 阿里云初审完成后，会将备案信息提交管局，大概一天之内你会收到一条工信部的验证短信，根据短信上的验证码，进入[工信部官网](https://beian.miit.gov.cn/#/Integrated/ComplaintA)验证。
![](https://img.mahaofei.com/img/202112231631498-ali-bt-wp-7.png)
6. 等待7-20天，管局审核完成后，备案也就ok了。
![](https://img.mahaofei.com/img/202112231631767-ali-bt-wp-8.png)

## 二、宝塔面板的安装
### 2.1 准备工作
进入[宝塔官网](https://www.bt.cn/)注册一个宝塔账号，后续需要使用。
### 2.2 安装宝塔面板
>以下安装过程参考官网：[https://www.bt.cn/bbs/thread-19376-1-1.html](https://www.bt.cn/bbs/thread-19376-1-1.html)
1. **开放服务器端口**
进入控制台，点击实例名称，进入安全组-安全组列表页面，点击配置规则。
![](https://img.mahaofei.com/img/202112231632152-ali-bt-wp-9.png)
如下图所示，放行8888端口，并开放所有ip访问，点击保存即可
![](https://img.mahaofei.com/img/202112231632312-ali-bt-wp-10.png)
另外在这里同时开启其他端口，点击快速添加，选择SSH、HTTP、HTTPS、MySQL添加，方便后续网站的访问。
![](https://img.mahaofei.com/img/202112231632208-ali-bt-wp-11.png)
2. **安装面板**
* CentOS 安装命令：
```bash
yum install -y wget && wget -O install.sh http://download.bt.cn/install/install_6.0.sh && sh install.sh
```
* Ubuntu 安装命令：
```bash
wget -O install.sh http://download.bt.cn/install/install-ubuntu_6.0.sh && sudo bash install.sh
```
> 安装成功后可以看到显示宝塔后台的地址，以及用户名和密码。打开浏览器登录宝塔后台。
3. **宝塔面板设置**
为了安全考虑，进入面板后先修改宝塔面板用户和面板密码。（这里的面板用户和密码不是官网账户，而是每个云服务器访问宝塔面板需要用到的账户面板）
![](https://img.mahaofei.com/img/202112231633585-ali-bt-wp-12.png)
4. **安装LNMP环境**
LNMP网站环境就是指Linux+Nginx+MySQL+PHP的组合，用来快速搭建各种开源的网站程序如Wordpress、Typecho等。
![](https://img.mahaofei.com/img/202112231633033-ali-bt-wp-13.png)
安装需要10~20分钟，安装过程是自动完成的。稍等一段时间即可。
![](https://img.mahaofei.com/img/202112231633644-ali-bt-wp-14.png)
5. **宝塔账号实名认证**
进入[宝塔官网](https://www.bt.cn/)，点击右上角会员后台，或者点此链接进入后台[https://www.bt.cn/admin/userinfo](https://www.bt.cn/admin/userinfo)。
![](https://img.mahaofei.com/img/202112231633993-ali-bt-wp-15.png)
左侧选择账户管理，进行实名认证。
![](https://img.mahaofei.com/img/202112231634655-ali-bt-wp-16.png)
6.**添加站点**
点击左侧网站-添加站点
![](https://img.mahaofei.com/img/202112231634375-ali-bt-wp-17.png)
![](https://img.mahaofei.com/img/202112231634033-ali-bt-wp-18.png)
网站站点添加成功后，就可以进入网站的根目录了。后面搭建网站都会在这个网站的根目录下进行。
![](https://img.mahaofei.com/img/202112231635182-ali-bt-wp-19.png)
## 三、安装WordPress
### 3.1 上传WordPress安装包
1. 前往[WordPress中国官网](https://cn.wordpress.org/download/)下载zip安装包
> 下载链接：[https://cn.wordpress.org/latest-zh_CN.zip](https://cn.wordpress.org/latest-zh_CN.zip)
2. 回到宝塔，点击文件，进入域名的根目录，点击左上角上传文件，上传刚才下载的wordpress安装包。
![](https://img.mahaofei.com/img/202112231635535-ali-bt-wp-20.png)
3. 上传成功后，解压zip格式的安装包
![](https://img.mahaofei.com/img/202112231635231-ali-bt-wp-21.png)
![](https://img.mahaofei.com/img/202112231635899-ali-bt-wp-22.png)
### 3.2 修改站点配置文件
![](https://img.mahaofei.com/img/202112231636769-ali-bt-wp-23.png)

由于安装包解压到站点目录/wordpress下，因此配置文件中的root需要改为
```bash
root /www/wwwroot/huffie.top/wordpress;
```
修改完成后，点击保存。
### 3.3 域名解析绑定
1. 进入阿里云的域名控制台
![](https://img.mahaofei.com/img/202112231636690-ali-bt-wp-24.png)
2. 添加记录
![](https://img.mahaofei.com/img/202112231636345-ali-bt-wp-25.png)
![](https://img.mahaofei.com/img/202112231637130-ali-bt-wp-26.png)
ps.这里遇到了一个小问题，总是显示**您的请求在Web服务器中没有找到对应的站点！**，尝试了许多方法，最后是将PHP版本从7.4更改为5.6，然后成功的，不知道是不是因为这个原因，后来版本改回7.4后也可以继续访问了。
### 3.4 WordPress的在线安装
在浏览器地址栏输入自己的域名，即可看到wordpress的欢迎页面。接下来的步骤就是进行wordpress的配置了。
![](https://img.mahaofei.com/img/202112231637983-ali-bt-wp-27.png)

1. **填写数据库信息**
数据库名、用户名、密码可以到宝塔控制台的数据库栏查到。
![](https://img.mahaofei.com/img/202112231637649-ali-bt-wp-28.png)
按要求填写，填写完成后点击提交。
![](https://img.mahaofei.com/img/202112231637587-ali-bt-wp-29.png)
![](https://img.mahaofei.com/img/202112231637349-ali-bt-wp-30.png)
2. **填写网站信息**
![](https://img.mahaofei.com/img/202112231638637-ali-bt-wp-31.png)
3. **安装成功**
登陆后台，可以看到熟悉的wordpress管理界面。
![](https://img.mahaofei.com/img/202112231638272-ali-bt-wp-32.png)
![](https://img.mahaofei.com/img/202112231638796-ali-bt-wp-33.png)