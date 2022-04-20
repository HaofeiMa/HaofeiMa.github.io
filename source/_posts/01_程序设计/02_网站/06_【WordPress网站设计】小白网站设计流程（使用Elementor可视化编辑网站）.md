---
title: 【WordPress网站设计】小白网站设计流程（使用Elementor可视化编辑网站）
description: >-
  首先准备工作（安装Elementor插件、主题、辅助插件），然后导入模板，使用Elementor进行可视化编辑，最后在wordpress后台修改网站导航即可。
categories:
  - 程序设计
  - 网站
tags:
  - WordPress
  - 网站搭建
cover: 'https://img.mahaofei.com/img/202112231136994-wordpress-elementor-8.png'
abbrlink: ab6dd331
date: 2021-01-25 15:38:07
updated: 2021-01-25 15:38:07
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


## 一、准备工作
### 1. 安装Elementor插件
进入wordpress后台，搜索插件Elementor进行安装。

> 如果安装失败，可以在官网下载安装包，手动上传安装，安装方法参考[此篇文章](https://blog.csdn.net/weixin_44543463/article/details/112839933)
> 下载地址：[https://cn.wordpress.org/plugins/elementor/](https://cn.wordpress.org/plugins/elementor/)
### 2. 安装主题
这里以Astra主题为例，进入wordpress后台，搜索主题Astra进行安装。
![](https://img.mahaofei.com/img/202112231129572-wordpress-elementor-2.png)
### 3. 安装辅助插件
根据不同主题的要求，可能需要安装不同的辅助插件，才能导入网站模板。Astra主题需要的插件是Starter Templates。
<img src="https://img-blog.csdnimg.cn/20210125142716805.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
## 二、导入模板
点击**外观-Starter Templates**，可以看到Astra的一些网站模板。在这里我们可以选择一个符合自己网站主题的模板（点击详情可以预览网页），导入到我们的网站中。
![](https://img.mahaofei.com/img/202112231134720-wordpress-elementor-3.png)
![](https://img.mahaofei.com/img/202112231135722-wordpress-elementor-4.png)

## 三、可视化编辑
### 1. 修改网站logo和标识
（1）进入自己的网站界面，点击上方的使用Elementor编辑，进入Elementor的编辑界面。
![](https://img.mahaofei.com/img/202112231135491-wordpress-elementor-5.png)
（2)点击左上角进入**站点设置-网站标识**，可以修改网站的Logo和标识。
![](https://img.mahaofei.com/img/202112231135732-wordpress-elementor-6.png)
![](https://img.mahaofei.com/img/202112231136081-wordpress-elementor-7.png)
![](https://img.mahaofei.com/img/202112231136994-wordpress-elementor-8.png)

### 2. 修改内容
Elementor是模块化的编辑器，它将网站从上到下按不同段进行拼接，每个段内部分成一个或多个栏，可以填加不同的功能模块。
（1）修改文字：将鼠标放在要求改的文字上，单击可以直接修改，或者在左侧编辑菜单中修改。
![](https://img.mahaofei.com/img/202112231136545-wordpress-elementor-9.png)
（2）更换图片：点击要修改的图片，可以看到左侧编辑菜单出现了相应的选项，此处可以更换图像，图像可以选择媒体库中已存在的图像，也可以上传图像。同时下方能够修改图像的尺寸和对齐方式。此外还可以在高级设置中进行更多的设置。
![](https://img.mahaofei.com/img/202112231136332-wordpress-elementor-10.png)
![](https://img.mahaofei.com/img/202112231137596-wordpress-elementor-11.png)
（3)更改图标：还是点击要求改的图标，以Read More→的→为例，在左侧可以选择图标库中已经有的图标，也可以自己上传图标。
![](https://img.mahaofei.com/img/202112231137045-wordpress-elementor-12.png)
![](https://img.mahaofei.com/img/202112231138675-wordpress-elementor-13.png)

### 3. 修改布局
（1）点击段上方中间的按钮，在左侧可以更改此段的布局（边距、对齐）、结构（分栏数）等。
![](https://img.mahaofei.com/img/202112231138481-wordpress-elementor-14.png)
（2）点击段内部各个栏的左上方的小窗子，可以修改内部各栏的布局。
![](https://img.mahaofei.com/img/202112231138081-wordpress-elementor-15.png)
（3)修改段的位置，点击Elementor编辑菜单下方的导航器。可看到右侧出现了网站的大纲列表，直接拖动对应的段即可直接排序。
![](https://img.mahaofei.com/img/202112231138476-wordpress-elementor-16.png)
![](https://img.mahaofei.com/img/202112231139125-wordpress-elementor-17.png)

### 4. 添加段
（1）翻到页面最下端或者点击某段上方的+，可以添加段
![](https://img.mahaofei.com/img/202112231139207-wordpress-elementor-18.png)
（2）添加新段：选择分栏的方式数目，然后从左侧Elementor的编辑菜单直接拖动需要的功能模块至各栏即可。
![](https://img.mahaofei.com/img/202112231140673-wordpress-elementor-19.png)
![](https://img.mahaofei.com/img/202112231140366-wordpress-elementor-20.png)
（3）使用Elementor的模板，这里可以在左上角选择模板的分类，比如我要添加About的相关模块。选好后直接插入即可。
![](https://img.mahaofei.com/img/202112231140428-wordpress-elementor-21.png)
（4)有些主题也有自己内置的模块，添加方法类似。
![](https://img.mahaofei.com/img/202112231140591-wordpress-elementor-22.png)

## 四、修改网页导航
网页导航就是网站最上方的一排导航按钮，在wordpress后台的外观-菜单中可以修改。可以选择不同的页面添加到导航菜单中，也可以修改导航菜单的顺序，或者修改页面之间的从属关系，实现下拉菜单的效果。
![](https://img.mahaofei.com/img/202112231141181-wordpress-elementor-23.png)
![](https://img.mahaofei.com/img/202112231141438-wordpress-elementor-24.png)