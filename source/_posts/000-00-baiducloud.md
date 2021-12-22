---
title: 百度网盘不限速下载方法
date: 1946-02-14 00:00:00
description: 使用油猴插件+IDM直链下载实现百度网盘不限速下载。
tags:
- <font color="white"> WOW </font>
notshow: true
---


## 一、安装TamperMonkey扩展程序（油猴）
需要使用Edge浏览器或Chrome浏览器。

### 1.1 如何使用Edge浏览器安装油猴
使用Edge浏览器安装油猴十分简单，直接进入[【扩展应用商店】](https://microsoftedge.microsoft.com/addons/detail/tampermonkey/iikmkjmpaadaobahmlepeloendndfphd?hl=zh-CN)安装即可。
### 1.2 如何使用Chrome浏览器安装油猴
1. 如果可以科学上网，进入[【Chrome扩展程序商店】](https://chrome.google.com/webstore/detail/tampermonkey/dhdgffkkebhmkfjojejmpbldmpobfkfo?hl=zh-CN)，点击右侧的添加至chrome即可。
ps.查外文文献查资料会经常需要科学上网。
![](https://img-blog.csdnimg.cn/e6642d8c89b44e4b977b1fb2d49bd2c8.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
2. 如果无法打开上面的网页，可以[【点此下载】](https://huffie.lanzouw.com/i6TuUuhjdyd
)离线包。①将下载的压缩文件解压；②打开浏览器扩展程序管理页面；③右上角打开开发者模式；④将解压出来的【TamperMonkey.crx】文件拖到到此页面。
![](https://img-blog.csdnimg.cn/95cf0b5cda3b482f97784e643760b2b6.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
![](https://img-blog.csdnimg.cn/89c295ba5e1b4eaa9a4f02dea5b5e082.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

## 二、安装油猴脚本

这一步不论什么浏览器都一样。打开[【此网页】](https://greasyfork.org/zh-CN/scripts/418182-%E7%99%BE%E5%BA%A6%E7%BD%91%E7%9B%98%E7%AE%80%E6%98%93%E4%B8%8B%E8%BD%BD%E5%8A%A9%E6%89%8B-%E7%9B%B4%E9%93%BE%E4%B8%8B%E8%BD%BD%E5%A4%8D%E6%B4%BB%E7%89%88)，安装脚本即可。

ps. 油猴是一个非常实用的插件，GreasyFork里面有很多实用的脚本，想了解的可以自行探索。
![](https://img-blog.csdnimg.cn/87ff4755090f46388291ce76d686dfe8.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
![](https://img-blog.csdnimg.cn/524723165590413c802a8f0e3b8065ad.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

## 三、开始下载
### 3.1 准备IDM
如果你已经在使用IDM，那么可以跳过这一步。

如果没有，可以使用刚才解压的文件夹中的IDM绿色版。
1. 将压缩包解压后运行【绿化.bat】；
![](https://img-blog.csdnimg.cn/bf93366e169c4763a031b5fff36e25f0.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
2. 运行【IDMan.exe】
3. 打开【选项】菜单，点击【下载】栏，将用户代理UA修改为：**softxm;netdisk**
![](https://img-blog.csdnimg.cn/ca9d61b5f676414299c09e212b3ea39c.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
4. 点击【连接】栏，将最大连接数设置为**4**，点击【确定】
![](https://img-blog.csdnimg.cn/57cc91040b88415b82ac865d28c8ef26.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

### 3.2 选择文件下载
1. 打开[【百度网盘网页版】](https://pan.baidu.com/)，选择一个要下载的文件。（注意只能是一个文件，不能是文件夹）。

2. 点击上方的简易下载助手下载。
![](https://img-blog.csdnimg.cn/8ba86c7ea1e54237b82bf5348a668ba3.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
3. 点击【获取直链地址】，并【复制直链地址】
![](https://img-blog.csdnimg.cn/807244ac7fe848c8a4d5ea55ad08e441.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)
4. 打开IDM，选择新建下载任务，粘贴刚才的直链地址进行下载。
下载速度根据当前网络状况，校园网一般在**2MB/s~10MB/s**
![](https://img-blog.csdnimg.cn/214ed89178164d89b1ff66f1414754f7.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)