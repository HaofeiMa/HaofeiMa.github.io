---
title: Solidworks装配体常见问题汇总（随时更新）
categories:
  - 机械
  - Solidworks
tags:
  - bugs
  - Solirworks
description: >-
  在使用Solidworks的过程中遇到很多奇怪的错误比如修改的标准件装配好后重新打开装配体会还原默认形状等，在这里记录遇到的各种问题以及对应的解决方法，供各位参考。
cover: 'https://img.mahaofei.com/img/20220415203208.png'
abbrlink: bc899151
date: 2022-04-15 20:23:20
updated: 2022-04-16 09:00:00
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


## 1. 修改的标准件在装配体保存后又会还原

**问题描述：**

修改标准件后插入装配体中，可是当我们保存退出装配体后，再打开时发现修改好的标准件自动被替换成原来的那个标准件。

**解决方法：**

打开【**工具-选项**】，找到【**异性孔向导/Toolbox**】，**取消**勾选【**将此文件夹设为Toolbox零部件的默认搜索位置**】，重新打开装配体，可以看到修改后的零件被正确的装配好了

![](https://img.mahaofei.com/img/20220415203208.png)

## 2. 调出标准件后如何再对其尺寸修改

**问题描述：**

在Solidworks画装配体中，经常会调用标准件，但有的时候装配时会发现标准件尺寸不合适需要修改，不想重新生成零件再重新配合，想要直接修改现有零件。

**解决方法：**

在装配体中，【**右键**】需要修改的标准件，选择【**编辑Toolbox零部件**】即可修改其参数。（需要提前加载Toolbox插件）

![](https://img.mahaofei.com/img/20220415203738.png)

## 3. Solidworks如何计算质量

在模型树中对各个零件设置材质，然后点击质量属性即可。