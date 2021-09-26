---
title: Hexo添加Follow me on CSDN效果
date: 2021-08-17 10:52:06
description: 网络上比较多的是Fork me on Github效果，其实要实现Follow me on CSDN原理是一样的。只需要将想要的效果图片下载下来ps一下，然后再上传到某个图床（或者说上传到CSDN），就可以得到此图片的url，替换到代码中即可。
categories:
- 程序设计
- 网站
tags:
- 网站搭建
- hexo
---

&emsp;&emsp;[http://huffie.cn/](http://huffie.cn/)这是我的博客，可以在此查看效果。
### 简介：
&emsp;&emsp;效果图如下（右上角）：
![请添加图片描述](https://img-blog.csdnimg.cn/315cdc0169d54692a386d2dac503db50.jpg?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

&emsp;&emsp;网络上比较多的是Fork me on Github效果，其实要实现Follow me on CSDN原理是一样的。

&emsp;&emsp;只需要将想要的效果图片下载下来ps一下，然后再上传到某个图床（或者说上传到CSDN），就可以得到此图片的url，替换到代码中即可。如下是我制作的两张图片，需要的小伙伴直接拿。（源代码见文末）

![在这里插入图片描述](https://img-blog.csdnimg.cn/abe3797b7d77419b81ecc02dd1bf8c34.png)
![请添加图片描述](https://img-blog.csdnimg.cn/1f8e1ef9be9f4f7db01fe3a2d57829de.png)
&emsp;&emsp;更多的效果图片可以在[项目地址](https://github.blog/2008-12-19-github-ribbons/)下载，想要其他效果的自己p一下就可以了。
### 实现方法：
粘贴复制如下的代码到`themes\hexo-theme-next\layout\_layout.njk`文件中(放在`<div class="headband"></div>`的下面 如图)，并把href改为你的csdn主页

黑色版本：
```html
  <!--Follow me on CSDN-->
  <a href="https://blog.csdn.net/weixin_44543463"><img loading="lazy" width="149" height="149" style="position: absolute; top: 0; right: 0; border: 0;" src="https://img-blog.csdnimg.cn/abe3797b7d77419b81ecc02dd1bf8c34.png" class="attachment-full size-full" alt="Fork me on GitHub" data-recalc-dims="1"></a>
```

白色版本
```html
  <!--Follow me on CSDN-->
  <a href="https://blog.csdn.net/weixin_44543463"><img loading="lazy" width="149" height="149" style="position: absolute; top: 0; right: 0; border: 0;" src="https://img-blog.csdnimg.cn/1f8e1ef9be9f4f7db01fe3a2d57829de.png" class="attachment-full size-full" alt="Fork me on GitHub" data-recalc-dims="1"></a>
```
![在这里插入图片描述](https://img-blog.csdnimg.cn/fadabe4afa5a4bad8a23c95089247c25.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)