---
title: Hexo为文章设置目录与标签的方法
description: >-
  首先创建目录页与标签页，创建方法如下。然后在source\_posts目录中创建.md文件即新建了一篇博客，在文章的开头部分添加如下代码即可为文章设置目录与标签，各部分作用见注释。
categories:
  - 程序设计
  - 网站
tags:
  - 网站搭建
  - Hexo
cover: 'https://img.mahaofei.com/img/20220428113422.png'
abbrlink: c30fb19e
date: 2021-08-16 17:40:33
updated: 2021-08-16 17:40:33
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

### 1. 创建目录页
&emsp;&emsp;在网站根目录下执行以下代码。
```git
hexo new page categories
```
&emsp;&emsp;<font color='red'> Hexo\source</font> 目录中会生成一个<font color='red'> categories </font>文件夹，文件夹内有一个<font color='red'> index.md </font>文件，打开此文件，将其中的<font color='red'> type</font> 修改为<font color='red'> categories</font> 即可。
```md
title: 分类
date: 2021-08-16 10:27:28
type: "categories"
comments: false
```
### 2. 创建标签页
&emsp;&emsp;创建标签页与创建目录页方法相同。在网站根目录下执行以下代码。
```git
hexo new page tags
```
&emsp;&emsp;<font color='red'> Hexo\source</font> 目录中会生成一个<font color='red'> tags</font>文件夹，文件夹内也有一个<font color='red'> index.md </font>文件，打开此文件，将其中的<font color='red'> type</font> 修改为<font color='red'> tags</font> 即可。
```md
title: 分类
date: 2021-08-16 10:27:28
type: "tags"
comments: false
```
### 3. 为文章设置目录与标签**
&emsp;&emsp;在<font color='red'> Hexo\source\_posts</font> 目录中创建.md文件即新建了一篇博客，在文章的开头部分添加如下代码
```md
---
title: 这里是文章的标题
date: 这里是发表时间，如：2021-08-15 08:15:16
description: 这里填写摘要。也可以把摘要这一段删去，在文章中想要截断的地方加入<!--more-->，这样在首页就只显示开头到截断的内容，而不会显示全文
categories:
- 分类
- 子分类
tags:
- 标签1
- 标签2
---
```