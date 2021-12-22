---
title: 前端笔记 | CSS浮动
date: 2021-03-16 09:07:38
description: CSS提供了三种传统布局方式：普通流（标准流）、浮动、定位。三种布局方式都是用来摆放盒子的，盒子摆放到合适的位置，布局自然就完成了。实际开发中，一个页面基本都包含了这三种布局方式（移动端有新的布局方式）
categories:
- 程序设计
- HTML
tags:
- 笔记
- html
---

## 一、浮动

### 1.1 传统网页布局的三种方式

CSS提供了三种传统布局方式：

1. 普通流（标准流）
2. 浮动
3. 定位

三种布局方式都是用来摆放盒子的，盒子摆放到合适的位置，布局自然就完成了。

实际开发中，一个页面基本都包含了这三种布局方式（移动端有新的布局方式）

### 1.2 标准流

所谓标准流：就是标签按照规定好的默认方式排列

1. 块级元素独占一行，从上向下顺序排序
   * div、hr、p、h1~h6、ul、ol、dl、form、table
2. 行内元素会按照顺序，从左到右顺序排序，碰到父元素边缘则会自动换行
   * span、a、i、em

标准流是最基本的布局方式

### 1.3 为什么需要浮动

有很多的布局效果，标准流没有办法完成，此时就可以利用浮动完成布局。因为浮动可以改变元素标签默认的排序方式。

**浮动的典型应用：块级元素横向排列**

多个块级元素纵向排列用标准流，多个块级元素横向排列找浮动。

### 1.4 什么是浮动

**float**属性用于创建浮动框，将其移动到一边，直到左边缘或右边缘及包含块或另一个浮动框的边缘。

语法：

```css
选择器 { float: 属性值; }
```

| 属性值 | 描述                 |
| ------ | -------------------- |
| none   | 元素不浮动（默认值） |
| left   | 元素向左浮动         |
| right  | 元素向右浮动         |

### 1.5 浮动的特性

**（1）浮动元素会脱离标准流**

* 多利标准流的控制，移动到指定位置（浮动）

* 浮动的盒子不再保留原先的位置

  > 如果有两个盒子一个设置浮动，一个没有
  >
  > ![](https://img-blog.csdnimg.cn/20210315165336189.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)


**（2）浮动的元素会在一行内显示并且元素顶部对齐**

* 要在一行内显示，各个元素都要设置浮动特性
* 浮动的元素是互相贴靠在一起的，如果父级宽度装不下这些浮动的盒子，多出的盒子会另起一行对齐

**（3）浮动的元素会具有行内块元素的特性**

* 任何元素都可以浮动，不管原先是什么元素，添加浮动之后都具有行内块元素相似的特性

### 1.6 浮动元素经常和标准流父级搭配使用

为了约束浮动元素位置，网页布局一般采取的策略是：

先用标准流的父元素排列上下位置，之后内部子元素采取浮动排列左右位置。
![](https://img-blog.csdnimg.cn/2021031516535332.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70#pic_center)


## 二、常见网页布局

### 2.1 常见网页布局
![](https://img-blog.csdnimg.cn/20210315165419336.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70#pic_center)
![](https://img-blog.csdnimg.cn/20210315165438761.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70#pic_center)
![](https://img-blog.csdnimg.cn/20210315165453473.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70#pic_center)

### 2.2 浮动布局注意点

**（1）浮动和标准流父盒子配合使用**

先用标准流的父元素排列上下位置，之后内部子元素用浮动排列左右位置

**（2）一个元素浮动了，理论上其余的兄弟元素也要浮动**

一个盒子里面有多个滋贺子，如果其中一个盒子浮动了，那么其他兄弟元素也应该浮动，以防止引起问题。

浮动的盒子只会影响浮动盒子后面的标准流，不会影响前面的标准流。



## 三、清除浮动

### 3.1 为什么需要清除浮动

由于父盒子在很多情况下，不方便给高度，但是子盒子浮动又不占有位置，导致父盒子高度为0，进而影响下面的标准流盒子。
![](https://img-blog.csdnimg.cn/20210315165527115.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)


* 浮动元素不在占用原标准流位置，所以会对后面元素的排版产生影响

### 3.2 清除浮动本质

* 清除浮动的本质就是清除浮动元素造成的影响

* 如果父盒子本身有高度，则不需要清除浮动
* 清除浮动之后，父级就会根据浮动的子盒子自动检测高度，父级有了高度，就不会影响下面的标准流了

语法：

```css
选择器 { clear: 属性值; }
```

| 属性值 | 描述                                       |
| ------ | ------------------------------------------ |
| left   | 不允许左侧有浮动元素（清除左侧浮动的影响） |
| right  | 不允许右侧有浮动元素（清除右侧浮动的影响） |
| both   | 同时清除左右两侧浮动的影响                 |

实际工作中，几乎只用`clear:both`

清除浮动的策略是：闭合浮动

### 3.3 清除浮动的方法

**（1）额外标签法，也称为隔墙法**

额外标签法会在浮动元素末尾添加一个空标签。如`<div style=""clear:both></div>`或其它标签`<br/>`等。

* 优点：通俗易懂，书写方便
* 缺点：添加许多无意义的钱钱，结构化较差
* 注意：新增的空标签必须是一个块级元素。

**（2）父级添加 overflow 属性**

可以给父级添加overflow属性，将其属性设置为hidden、auto或scroll。`overflow: hidden;`

注意：给父元素添加代码

* 优点：代码简洁
* 缺点：无法显示溢出的部分

**（3）父级添加 after 伪元素**

:after 方式是额外标签发的升级版。也是给父元素添加。

```css
/* 添加如下样式 */
.clearfix:after{
    content: "";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}
.clearfix{ /* IE6、7专有 */
    *zoom: 1;
}
/* 为父元素添加clearfix类 */
<div class="clearfix">
```

* 优点：没有增加标签，结构更简单
* 缺点：照顾低版本浏览器

（4）父级添加双伪元素

```css
/* 添加如下样式 */
.clearfix:before,
.clearfix:after {
    content: "";
    display: table;
}

.clearfix:after {
    clear: both;
}

.clearfix {
    *zoom: 1;
}
/* 为父元素添加clearfix类 */
<div class="clearfix">
```

* 优点：代码更简洁
* 缺点：照顾低版本浏览器