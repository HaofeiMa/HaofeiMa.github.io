---
title: 前端笔记 | HTML基础
date: 2021-03-12 09:45:21
description: HTML是用来描述网页的一种语言。HTML指超文本标记语言。HTML不是编程语言，是一种标记语言。HTML标题、段落、链接、图像的使用方法。元素、属性、格式化；链接、样式、表格；列表、块、布局、表单的创建方法。
categories:
- 程序设计
- HTML
tags:
- 笔记
- html
---

### 一、HTML的介绍

#### 1.1 什么是HTML

HTML是用来描述网页的一种语言

HTML指超文本标记语言

HTML不是编程语言，是一种标记语言

#### 1.2 HTML5的新特性

用于绘画的canvas标签

用于媒介回放的video和audio元素

对本地离线存储的更好支持

新的特殊内容：article、footer、header、nav、section

新的表单控件：calendar、date、time、email、url、search

浏览器的支持：Safari、Chrome、Firefox以及Opera包括IE9以上

### 二、HTML基础

#### 2.1 声明
**声明：**`<!DOCTYPE html>`

HTML有多个不同的版本，只有明白页面使用的确切的HTML版本，浏览器才能完全正确的显示出HTML页面。

> HTML5：`<!DOCTYPE html>`
>
> HTML4.01:`<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
> "http://www.w3.org/TR/html4/loose.dtd">`

#### 2.2 基础标签
**基础标签：**`<head> & <body>`

1. head：定义头部。如编码格式(UTF-8)、标题(title)、文字的显示形式，
2. body：页面的内容，其他的标签等

#### 2.3 HTML标题
**标题：**`<h1> <h2>……<h6>`

```html
<body>
    <h1>标题h1</h1>
    <h2>标题h2</h2>
    <h3>标题h3</h3>
    <h4>标题h4</h4>
    <h5>标题h5</h5>
    <h6>标题h6</h6>
</body>
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231706893-html-notes1-1.png)

#### 2.4 HTML段落
**段落：**`<p>`

定义一个段落

```html
<body>
    Hello World
    <p>Hello</p>
    <p>World</p>
</body>
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231706461-html-notes1-2.png)


#### 2.5 HTML链接
**链接：**`<a>`

```html
<body>
    <a href="https://blog.csdn.net/weixin_44543463">Half_A的CSDN主页</a>
</body>
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231706044-html-notes1-3.png)


#### 2.6 HTML图像
**图像：**`<img>`

```html
<body>
    <img src="./images/Huffie.jpg">
</body>
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231707957-html-notes1-4.png)

### 三、HTML元素、属性和格式化

#### 3.1 元素

元素是指从开始标签到结束标签的所有内容

| 开始标签 | 元素内容        | 结束标签 |
| -------- | --------------- | -------- |
| `<p>`    | this is my page | `</p>`   |


> `<p></p>`是段落标记，`<br/>`是换行符
>
> 二者虽然都可以实现换行，但其行间距不一样
>
> ```html
> <body>
>  <p>this is my webpage</p>
>  Hello,world<br/>Huffie
> </body>
> ```
> ![](https://gitee.com/huffiema/pictures/raw/master/image/202112231707062-html-notes1-5.png)

* 元素内容是指从开始标签到结束标签之间的内容
* 空元素在开始标签中进行关闭（如`<br/>`）
* 大多数HTML元素可拥有属性
* 大多数HTML元素都是可以嵌套的

#### 3.2 HTML属性

1. 标签可以拥有属性为元素提供更多的信息

2. 属性以键/值对的形式出现

   ```html
   href="www.huffie.top"
   ```

3. 常用标签属性

   `<h1>:align` ：对齐方式

   ```html
   <h1 align="center">标题h1</h1>
   ```

   <body>:bgcolor`  背景颜色 

    ```html
   <body bgcolor="#ebebeb">
    ```

   注意：bgcolor设置背景颜色，background设置背景图片

   `<a>:target`  规定在何处打开链接  

   ```html
   <a href="test.html" target="_blank">链接</a>
   ```

4. 通用属性

   | 通用属性 | 作用               |
   | -------- | ------------------ |
   | class    | 规定元素的类名     |
   | id       | 规定元素唯一ID     |
   | style    | 规定元素样式       |
   | title    | 规定元素的额外信息 |

#### 3.3 格式化

| 标签       | 描述         |
| ---------- | ------------ |
| `<b>`      | 定义粗体文本 |
| `<big>`    | 定义大号字   |
| `<em>`     | 定义着重文字 |
| `<i>`      | 定义斜体字   |
| `<small>`  | 定义小号字   |
| `<strong>` | 定义加重语气 |
| `<sub>`    | 定义下标字   |
| `<sup>`    | 定义上标字   |
| `<ins>`    | 定义插入字   |
| `<del>`    | 定义删除字   |

```html
<body>
    Hello, I'm huffie!<br/>
    <b>标签 b：欢迎来到我的博客</b>
    <br/>
    <big>标签 big: 欢迎来到我的博客</big>
    <br/>
    <em>标签 em: 欢迎来到我的博客</em>
    <br/>
    <i>标签 i: 欢迎来到我的博客</i>
    <br/>
    <small>标签 small: 欢迎来到我的博客</small>
    <br/>
    <strong>标签 strong: 欢迎来到我的博客</strong>
    <br/> 标签 sub: 欢迎来到<sub>这是上标</sub>我的博客
    <br/> 标签 sup: 欢迎来到<sup>这是下标</sup>我的博客
    <br/>
    <ins>标签 ins: 欢迎来到我的博客</ins>
    <br/>
    <del>标签 del: 欢迎来到我的博客</del>
</body>
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231707703-html-notes1-6.png)



### 四、样式、链接和表格

#### 4.1 样式

1. 标签：

   * `<style>`：样式定义
   * `<link>`：资源引用

2. 属性：

   * rel="stylesheet"：外部样式表
   * type="text/css"：引入文档的类型
   * margin-left：边距

3. 样式的插入方式

   * 外部样式表

     **语法：**`<link rel="stylesheet" type="text/css" href="mystyle.css">`

     即指定外部引用资源，文档类型为css，具体位置为mystyle.css

     **例：**index.html：

     ```html
     <!DOCTYPE html>
     <html lang="en">
     
     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>样式</title>
         <link rel="stylesheet" type="text/css" href="mystyle.css">
     </head>
     
     <body>
         <h1>标题h1</h1>
     
     </body>
     
     </html>
     ```

     mystyle.css

     ```css
     h1 {
         color: blue;
     }
     ```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231707135-html-notes1-7.png)


   * 内部样式表

     **语法：**

     ```html
         <style type="text/css">
             p {
                 color: aquamarine;
             }
         </style>
     ```

     **例：**

     ```html
     <!DOCTYPE html>
     <html lang="en">
     
     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>样式</title>
         <style type="text/css">
             p {
                 color: aquamarine;
             }
         </style>
     </head>
     
     <body>
         <p>欢迎来到我的博客</p>
     </body>
     
     </html>
     ```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231708041-html-notes1-8.png)


   * 内联样式表

     **语法：**`    <p style="color: blueviolet;">点击我跳转到CSDN</a>`

     **例：**

     ```html
     <!DOCTYPE html>
     <html lang="en">
     
     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>样式</title>
     </head>
     
     <body>
         <p style="color: blueviolet;">点击我跳转到CSDN</a>
     </body>
     
     </html>
     ```

#### 4.2 链接

1. 链接数据包括 文本链接、图片链接

2. 属性：
   * href属性：指向另一个文档的链接
   * name属性：创建文档内的链接

3. img标签属性：
   * alt：替换文本属性
   * width：宽
   * height：高

```html
<body>
    <a href="http://www.huffie.top">点击我跳转</a>
    <br/>
    <a href="http://www.huffie.top">
        <img src="./images/Huffie.jpg" width="100px" height="100px" alt="huffie.jpg">
    </a>
    <br/>
    <a name="tips">页内锚点</a>
    <br/>
    <a href="#tip">跳转到页内锚点</a>
</body>
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231708036-html-notes1-9.png)


#### 4.3 表格

**（1）表格标签：**

| 表格        | 描述             |
| ----------- | ---------------- |
| `<table>`   | 定义表格         |
| `<caption>` | 定义表格标题     |
| `<th>`      | 定义表格的表头   |
| `<tr>`      | 定义表格的行     |
| `<td>`      | 定义表格单元     |
| `<thead>`   | 定义表格的页眉   |
| `<tbody>`   | 定义表格的主体   |
| `<tfoot>`   | 定义表格的页脚   |
| `<col>`     | 定义表格的列属性 |

```html
<body>
    <table border="1">
        <caption>表格标题</caption>
        <tr>
            <th>表头1</th>
            <th>表头2</th>
            <th>表头3</th>
        </tr>
        <tr>
            <td>单元格</td>
            <td></td>
            <td>单元格</td>
        </tr>
        <tr>
            <td>
                <ul>
                    <li>列表1</li>
                    <li>列表2</li>
                    <li>列表3</li>
                </ul>
            </td>
            <td>单元格</td>
            <td>单元格</td>
        </tr>
    </table>
</body>
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231708632-html-notes1-10.png)

**（2）表格属性**

1. 边框属性：border	例：`<table border="1">`

2. 表格中的列表

   ```html
   <ul>
       <li>列表1</li>
       <li>列表2</li>
       <li>列表3</li>
   </ul>
   ```

3. 单元格大小：cellpadding    例：`<table border="1" cellpadding="10">`

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231708556-html-notes1-11.png)


4. 单元格间距：cellspacing    例：`<table border="1" cellspacing="10">`

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231708504-html-notes1-12.png)

5. 单元格背景颜色：bgcolor    例：`<table border="1" bgcolor="#cccccc">`
6. 单元格背景图片：background    例：`<table border="1" background="huffie.jpg">`

### 五、HTML列表、块和布局

#### 5.1 列表

**（1）标签**

| 标签   | 描述     |
| ------ | -------- |
| `<ol>` | 有序列表 |
| `<ul>` | 无序列表 |
| `<li>` | 列表项   |
| `<dl>` | 列表     |
| `<dt>` | 列表项   |
| `<dd>` | 描述     |

```html
<body>
    <ul>
        <li>列表项1</li>
        <li>列表项2</li>
        <li>列表项3</li>
    </ul>
    <ol>
        <li>列表项1</li>
        <li>列表项2</li>
        <li>列表项3</li>
    </ol>
</body>
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231709158-html-notes1-13.png)


**（2）属性**

1. 无序列表

   * 标签：`<ul>`、`<li>`

   * 属性：实心圆disc、空心圆circle、方块square（默认是实心圆）

     ```html
     <ul type="square">
         <li>列表项1</li>
         <li>列表项2</li>
         <li>列表项3</li>
     </ul>
     ```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231709341-html-notes1-15.png)


2. 有序列表

   * 标签：`<ol>`、`<li>`

   * 属性：A、a、l、i（序号：默认是数字），start（开始位置：默认从1开始）

     ```html
         <ol type="a">
             <li>列表项1</li>
             <li>列表项2</li>
             <li>列表项3</li>
         </ol>
     ```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231709077-html-notes1-16.png)


3. 嵌套列表

   * 标签：`<ul>`、`<ol>`、`<li>`

4. 自定义列表

   * 标签：`<dl>`、`<dt>`、`<dd>`

     ```html
         <dl>
             <dt>hello,world</dt>
             <dd>Huffie</dd>
             <dt>hello,world</dt>
             <dd>Huffie</dd>
             <dt>hello,world</dt>
             <dd>Huffie</dd>
         </dl>
     ```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231710198-html-notes1-17.png)


#### 5.2 块

1. 块元素

   块元素在显示时，通常会以新行开始。如`<h1>`、`<p>`、`<ul>`

2. 内联元素

   内联元素通常不会以新行开始。如`<b>`、`<a>`、`<img>`

3. `<div>`元素

   `<div>`元素也被称为块元素，其主要是组合HTML元素的容器

4. `<span>`元素

   `<spac>`元素是内联元素，可作为文本的容器

#### 5.3 布局

1. 使用`<div>`布局
2. 使用`<table>`布局

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0px;
        }
        
        #container {
            width: 100%;
            height: 1000px;
            background-color: cornsilk;
        }
        
        #heading {
            width: 100%;
            height: 10%;
            background-color: cyan;
        }
        
        #content_menu {
            width: 30%;
            height: 80%;
            background-color: gold;
            float: left;
        }
        
        #content_body {
            width: 70%;
            height: 80%;
            background-color: darkgray;
            float: left;
        }
        
        #footing {
            width: 100%;
            height: 10%;
            background-color: darkslateblue;
            clear: both;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="heading">头部</div>
        <div id="content_menu">内容菜单</div>
        <div id="content_body">内容主体</div>
        <div id="footing">内容底部</div>
    </div>
</body>

</html>
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231710586-html-notes1-18.png)
### 六、HTML表单

1. 表单用于获取不同类型的用户输入

2. 常用表单标签

   | 标签         | 解释             |
   | ------------ | ---------------- |
   | `<form>`     | 表单             |
   | `<input>`    | 输入域           |
   | `<textarea>` | 文本域           |
   | `<label>`    | 控制标签         |
   | `<fieldset>` | 定义域           |
   | `<legend>`   | 域的标题         |
   | `<select>`   | 选择列表         |
   | `<optgroup>` | 选项组           |
   | `<option>`   | 下拉列表中的选项 |
   | `<button>`   | 按钮             |

3. 常见表单

   * 复选框：`<input type="checkbox">`

   * 单选框：

     `<input type="radio" name="sex">`

     单选框的几个选项需要有相同的name

     默认勾选要添加属性`checked="checked"`

   * 下拉列表：

     ```html
     <select>
                 <option>北京</option>
                 <option>上海</option>
                 <option>广州</option>
                 <option>深圳</option>
             </select>
     ```

   * 文本域：

     ```html
     <textarea name="" id="" cols="30" rows="10">文本内容</textarea>
     ```

   * 创建按钮：`<input type="button" value="按钮内容">`

```html
<body>
    <form>
        <!-- 输入框 -->
        账号:
        <input type="text">
        <br/> 密码:
        <input type="text">
        <br/>
        <!-- 复选框 -->
        <input type="checkbox">已阅读并同意《用户使用须知》
        <br/>
        <!-- 单选框 -->
        请选择您的性别： 男 <input type="radio" name="sex"> 女 <input type="radio" name="sex">
        <br/>
        <!-- 下拉列表 -->
        请选择居住地区
        <select>
            <option>北京</option>
            <option>上海</option>
            <option>广州</option>
            <option>深圳</option>
        </select>
        <br/>
        <!-- 按钮 -->
        <input type="button" value="人机验证">
        <br/>
        <!-- 提交按钮 -->
        <input type="submit" value="注册">
    </form>
    <!-- 文本域 -->
    <textarea name="" id="" cols="30" rows="10">请填写个人简介</textarea>
    <b/r>
</body>
```
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231710839-html-notes1-19.png)
ps.如果利用表格搭配表单，可以写出更规范的注册页面