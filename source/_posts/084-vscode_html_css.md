---
title: Vscode中HTML与CSS代码的快速写法
date: 2021-03-17 13:46:39
description: Emmet语法的前身是Zen coding，它使用缩写来提高html/css的编写速度，vscode内部已经集成该语法
categories:
- 程序设计
- HTML
tags:
- 笔记
- html
---

Emmet语法的前身是Zen coding，它使用缩写来提高html/css的编写速度，vscode内部已经集成该语法

### 1. 快速生成Html结构

* 生成标签，直接输入标签名，按`tab`键即可，比如div然后按tab键，就可以生成`<div></div>`

* 如果想要生成多个相同标签，加上`*`就可以了，比如`div*3`可以快速生成三个div
* 如果有父子级关系的标签，可以用`>`，比如ul > li
* 如果有兄弟关系的标签，用`+`，比如div+p
* 如果生成带有类名或者id名的，直接写`.demo`或者`#two`，再按tab键即可，例如`div.banner`
* 如果生成的div类名是有顺序的，可以使用自增符号`$`，例如`div.demo$*5`
* 如果想要在生成的标签内部写内容可以用{}biaoshi

### 2. 快速生成CSS样式

CSS取每个单词得首字母简写即可：

比如，ti2em，按tab，可以生成text-indent: 2em;

比如，w200，按tab，可以生成width: 200px;

### 3. 格式化代码

在VSCode中，保存时默认格式化代码，如果没有自动格式化可以按照如下步骤设置：

> 【新版本】：
>
> 打开文件-首选项-设置，搜索format，勾选保存自动格式化。
>
> 【旧版本】：
>
> 打开：文件->首选项->设置
>
> 搜索：emmet.include
>
> 在setting.json下的【用户】中添加以下语句
>
> ```json
> "editor.formatOnType":true,
> "editor.formatOnSave":true,
> ```
>
> 设置好以后，保存时都会格式化文档

也可以手动格式化文档：右键-格式化文档，或者`Shift+Alt+F`