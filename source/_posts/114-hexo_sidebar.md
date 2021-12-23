---
title: Hexo+next的侧边栏背景与字体颜色设置方法
date: 2021-08-17 10:26:53
description: 由于next主题经过了几次更新，查阅了许多资料都说要修改custom.styl这个配置文件，但是我的主题内没有此文件，经过翻阅大量的资料，终于找到了侧边栏的配置文件位置。
categories:
- 程序设计
- 网站
tags:
- 网站搭建
- hexo
---

&emsp;&emsp;由于next主题经过了几次更新，查阅了许多资料都说要修改<font color="red"> custom.styl </font>这个配置文件，但是我的主题内没有此文件，经过翻阅大量的资料，终于找到了侧边栏的配置文件位置。

&emsp;&emsp;对于<font color="red"> Muse </font>和<font color="red"> Mist</font>主题，其侧边栏的配置文件为`Hexo\themes\hexo-theme-next\source\css\_schemes\Muse\_sidebar.styl`。

&emsp;&emsp;对于<font color="red"> Pisces</font>和<font color="red"> Gemini</font>主题，其侧边栏的配置文件为`Hexo\themes\hexo-theme-next\source\css\_schemes\Pisces\_sidebar.styl`。

&emsp;&emsp;在此配置文件中，可以找到<font color="red"> .sidebar</font>，修改其内部的属性参数即可实现**设置侧边栏背景图片和字体颜色**的功能

```js
.sidebar {
  //设置背景图片，图片放在Hexo\themes\hexo-theme-next\source\images目录下
  background:url(/images/sidebar-bg.jpg);	
  background-size: cover;
  background-position:center;
  background-repeat:no-repeat;
  bottom: 0;
  if (not hexo-config('back2top.sidebar')) {
    box-shadow: inset 0 2px 6px black;
  }
  position: fixed;
  top: 0;
  transition: all $transition-ease-out;
  width: $sidebar-desktop;
  z-index: $zindex-2;

  a {
    //设置文字颜色
	border-bottom-color: #FFFFFF;
	color: #FFFFFF;
    &:hover {
	  border-bottom-color: $FFFFFF;
	  color: #FFFFFF;
    }
  }
}
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231923871-hexo-sidebar-1.png)

&emsp;&emsp;另外，侧边栏中头像下方的作者姓名和描述的字体颜色，可以在根目录下的站点配置文件中`_config.yml`中修改。
```yml
# Site
title: Half_A Studio
subtitle: Huffie's Blog
# 例如设置白色字体的description
description: <font color="#FFFFFF">Done is better than perfect.</font>
keywords: Control Robot Programming
author: Huffie
language: zh-CN
timezone: ''
```
设置完成后效果如下：

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231924723-hexo-sidebar-2.png)

[http://huffie.cn/](http://huffie.cn/)这是我的博客，可以在此查看效果。