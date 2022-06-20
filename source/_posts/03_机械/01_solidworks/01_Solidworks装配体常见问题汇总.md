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

问题目录
电脑端：左侧列表
手机端：右下角【三】按钮

## 【置顶】各种标准件和非标件的模型如何下载

大部分模型都可以在ToolBox里面下载到。没有的话，如果是标准件，推荐以下两个工具。


**推荐一个软件【今日制造】**（[http://www.maidiyun.com/download/softInfo.aspx?id=1](http://www.maidiyun.com/download/softInfo.aspx?id=1)）

![](https://img.mahaofei.com/img/20220510161027.png)


**推荐一个网站【三益精密】**（[http://www.3g-es.com/](http://www.3g-es.com/)）

可以在官网右侧找到2D/3D模型，然后下载电子相册和模型库。也可以直接使用下面的百度网盘。

>链接: https://pan.baidu.com/s/1Wby8zvjswjeNZNGwqe_0Gw
>提取码: xwsk

下载好后，打开cdstart.exe

![](https://img.mahaofei.com/img/20220510161120.png)

点击【2D/3D CAD】

![](https://img.mahaofei.com/img/20220510161141.png)

打开后可以看到有非常多的模型，包括常用机械零部件、电机、传感器等等。

![](https://img.mahaofei.com/img/20220510161341.png)

下载方式，打开一个想要的零件，点击上面的输出成档，然后选择3D，就可以下载STEP格式了

![](https://img.mahaofei.com/img/20220510161536.png)


## 1. 修改的标准件在装配体保存后又会还原

**问题描述：**

修改标准件后插入装配体中，可是当我们保存退出装配体后，再打开时发现修改好的标准件自动被替换成原来的那个标准件。

**解决方法：**

打开【**工具-选项**】，找到【**异性孔向导/Toolbox**】，**取消**勾选【**将此文件夹设为Toolbox零部件的默认搜索位置**】，重新打开装配体，可以看到修改后的零件被正确的装配好了

![](https://img.mahaofei.com/img/20220415203208.png)

## 2. 调出Toolbox标准件后如何再对其尺寸修改

**问题描述：**

在Solidworks画装配体中，经常会调用标准件，但有的时候装配时会发现标准件尺寸不合适需要修改，不想重新生成零件再重新配合，想要直接修改现有零件。

**解决方法：**

在装配体中，【**右键**】需要修改的标准件，选择【**编辑Toolbox零部件**】即可修改其参数。（需要提前加载Toolbox插件）

![](https://img.mahaofei.com/img/20220415203738.png)

## 3. 装配体模型灰色/无法修改零件外观/无法调整透明度

**问题描述：**

遇到了一个新bug，当我将装配体导出为工程图后，再回到装配体界面，发现模型颜色全部丢失，整体外观变成灰色，并且无论如何修改模型外观、修改模型透明度，都不起作用。

**解决方法：**

我的问题出在**装配体莫名其妙增加了几十个白色外观**。

打开界面左侧【DisplayManager -> 外观】，可以看到外观下面有几十个白色（这里我已经全部删除了）。选中第一个，按住shift，再选中最后一个，然后按下delete键，将颜色全部删除，这个时候就就可以更改外观了。

![](https://img.mahaofei.com/img/20220504162346.png)

如果觉得颜色还是发灰，可以到【布景、光源与相机】中，右键各个光源 选择在solidworks中打开，将所有光源打开后一般颜色就会恢复正常了。

![](https://img.mahaofei.com/img/20220504162704.png)

## 4. 如何加载Q235等其它材质材料

**问题描述：**

solidworks中配置零件的指定材质时，会发现有些材料比如Q235，在solidworks标准材质库中找不到。

**解决方法：**

需要我们自己加载GB材质库。下载下面的文件，将文件解压，放在任意一个目录下（建议放在Solidworks安装目录下，方便管理）

>链接: https://pan.baidu.com/s/124gGXvUhpHX3hxiElPC-rw?pwd=ysjp
>提取码: ysjp


![](https://img.mahaofei.com/img/20220510160149.png)


打开Solidworks选项，找到【文件位置】，添加材质数据库的位置为刚才解压的文件夹。

![](https://img.mahaofei.com/img/20220510160254.png)


再次打开材料列表，就可以看到新的材质了。

![](https://img.mahaofei.com/img/20220510160400.png)

## 5. 装配体如何替换零件


![](https://img.mahaofei.com/img/20220510162046.png)

![](https://img.mahaofei.com/img/20220510162120.png)


![](https://img.mahaofei.com/img/20220510162014.png)
