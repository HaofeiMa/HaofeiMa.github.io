---
title: 前端笔记 | CSS盒子模型
date: 2021-03-15 11:53:06
description: 网页布局学习有三大核心，盒子模型，浮动和定位，学习盒子模型可以帮助我们很好的布局页面。网页布局过程：先准备好相关的网页元素，利用CSS设置盒子样式，然后摆放到相应位置，往盒子里面装内容。
categories:
- 程序设计
- HTML
tags:
- 笔记
- html
---

## 一、盒子模型

网页布局学习有三大核心，盒子模型，浮动和定位，学习盒子模型可以帮助我们很好的布局页面。

### 1.1 网页布局的本质

网页布局过程：

1. 先准备好相关的网页元素，网页元素基本都是盒子Box
2. 利用CSS设置盒子样式，然后摆放到相应位置
3. 往盒子里面装内容

因此网页布局的本质：利用CSS摆盒子

### 1.2 盒子模型的组成

CSS盒子模型本质上是一个盒子，封装周围的HTML元素，它包括：边框、外边距、内边距和实际内容

1. border边框
2. content内容
3. padding内边距
4. margin外边距

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231711309-html-notes4-1.png)


### 1.3 边框border

**boder**可以设置元素的边框。边框有三部分组成：边框粗细、边框样式、边框颜色

语法：

```css
border: border-width || border-style || border-color
```

| 属性         | 作用                                                        |
| ------------ | ----------------------------------------------------------- |
| border-width | 定义边框粗细，单位是px                                      |
| border-style | 边框的样式（none默认无\|solid实线\|dashed虚线\|dotted点线） |
| border-color | 边框颜色（默认黑色）                                        |

**（1）边框的复合写法：**（没有顺序）

```css
border: 1px solid red;
```

**（2）边框的分开写法：**

```css
border-top: 1px solid red;
```

**（3）表格的细线边框**

**border-collapse**属性控制浏览器绘制表格边框的方式。（绘制表格时两个单元格的边框重叠在一起，边框宽度会变粗）

语法：

```css
border-collpse: collapse;
```

* collpse单词是合并的意思
* border-collapse: collapse;表示相邻边框合并在一起

**（4）边框会影响盒子大小**

边框会额外增加盒子的实际大小，因此我们有两种方案解决：

1. 测量盒子大小的时候，不量边框
2. 如果测量的时候包含了边框，则需要width/height减去边框宽度

例：

```css
div {
    width: 200px;
    height: 200px;
    background-color: skyblue;
    border: 10px solid red;
}
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231711571-html-notes4-2.png)

### 1.4 内边距padding

padding属性用于设置内边距，即边框与内容之间的距离。

| 属性           | 作用     |
| -------------- | -------- |
| padding-left   | 左内边距 |
| padding-right  | 右内边距 |
| padding-top    | 上内边距 |
| padding-bottom | 下内边距 |

**padding简写**：

| 值的个数                     | 释义                                                   |
| ---------------------------- | ------------------------------------------------------ |
| padding: 5px;                | 1个值，代表上下左右都有5px内边距                       |
| padding: 5px 10px;           | 2个值，代表上下内边距是5px，左右内边距是10px           |
| padding: 5px 10px 20px;      | 3个值，代表上内边距5px，左右内边距10px，下内边距20px   |
| padding: 5px 10px 20px 30px; | 4个值，上是5px，右是10px，下是20px，左是30px（顺时针） |

**padding影响了盒子实际大小**

如果盒子已经有了宽度和高度，此时再指定内边框，会增大盒子。即内容不变只能使盒子变大。

解决方案：width/height减去多出来的内边距大小

例：

```css
div {
    width: 200px;
    height: 200px;
    background-color: skyblue;
    padding: 20px;
}
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231712713-html-notes4-3.png)


### 1.5 外边距margin

**margin**属性用于设置外边距，即控制盒子和盒子之间的距离

| 属性          | 作用     |
| ------------- | -------- |
| margin-left   | 左外边距 |
| margin-right  | 右外边距 |
| margin-top    | 上外边距 |
| margin-bottom | 下外边距 |

margin的简写方式与padding一致。

**（1）外边距的典型应用**

margin可以让**块级盒子水平居中**，但必须满足两个条件：

1. 盒子必须指定宽度（width）
2. 盒子左右的外边距都设置为auto。

```css
.header { width: 960px; margin: 0 auto; }
```

以下三种写法都可以：

* margin-left:auto; margin-right:auto;
* margin: auto;
* margin: 0 auto;

**行内元素或行内块元素水平居中**：给父元素添加 text: align:center 即可。

**（2）外边距合并**

使用margin定义块元素的垂直外边距时，可能会出现外边距的合并。

1. 相邻块元素垂直外边距的合并

当上下相邻的两个块元素相遇时，如果上面的元素有下外边距margin-bottom，下面的元素有上外边距margin-top，则它们之间的垂直间距不是两者之和。**取两个值中较大者，这种现象被称为相邻块元素垂直外边距的合并。**

解决方案：尽量只给一个盒子添加margin值。

2. 嵌套块元素垂直外边距的塌陷

对于两个嵌套关系（父子关系）的元素，父元素有上外边距同时子元素也有上外边距，此时父元素会塌陷较大的外边距值。 

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231712550-html-notes4-4.png)


解决方案：

1. 为父元素定义上边框
2. 为父元素定义上内边距
3. 为父元素添加overflow:hidden

### 1.6 清除内外边距

网页元素很多都带有默认的内外编剧，而且不同浏览器默认的值也不一致。因此我们在布局前，首先要清除网页元素的内外边距。

```css
* {
	padding: 0;
	margin: 0;
}
```

注意：行内元素为了照顾兼容性，尽量只设置左右内外边距，不要设置上下内外边距。

## 二、特殊样式

### 2.1 圆角边框

CSS3中新增了圆角边框杨适，这样我们的盒子就可以变圆角了。

**border-radius**属性用于设置元素的外边框圆角

语法：

```css
border-radius:length;
```

* 参数值可以为数值或百分比

  ```css
  border-radius: 50%;
  ```

* 如果是正方形，想要设置为一个圆，把数值修改为高度或宽度的一般即可，或者直接写为50%

  同理如果是个矩形，半径设置为高度的一般就成了圆角矩形

* 该属性是一个简写属性，可以跟四个值，分别代表左上角、右上角、右下角、左下角。跟两个值，分别代表左上右下、右上左下。

* 圆角边框也可以分开写：如border-top-left-radius

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231712931-html-notes4-5.png)

### 2.2 盒子阴影

CSS3中新增了盒子阴影，可以使用box-shadown属性为盒子添加阴影。

语法：

```css
box-shadow: h-shadow v-shadow blur spread color inset;
```

| 参数值   | 描述                               |
| -------- | ---------------------------------- |
| h-shadow | 必须。水平阴影的位置，允许负值。   |
| v-shadow | 必须。垂直阴影的位置，允许负值。   |
| blur     | 可选。模糊距离。                   |
| spread   | 可选。阴影的尺寸。                 |
| color    | 可选。阴影的颜色。                 |
| inset    | 可选。将外部阴影outset改为内部阴影 |

* 默认是外阴影outset，但是不可以写outset，否则会使阴影失效
* 盒子阴影不占用空间，不影响其他盒子的位置

例：

```css
box-shadow: 10px 10px 10px -3px rgba(0, 0, 0, 0.3);
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231712448-html-notes4-6.png)


### 2.3 文字阴影

**text-shadow**属性可以将阴影应用于文本

语法：

```css
text-shadow: h-shadow v-show blur color;
```

| 参数值   | 描述                             |
| -------- | -------------------------------- |
| h-shadow | 必须。水平阴影的位置，允许负值。 |
| v-shadow | 必须。垂直阴影的位置，允许负值。 |
| blur     | 可选。模糊距离。                 |
| color    | 可选。阴影的颜色。               |

> 本文参考了黑马程序员pink老师的视频教程
> 		**黑马程序员pink老师前端入门视频教程：** [https://www.bilibili.com/video/BV14J4114768](https://www.bilibili.com/video/BV14J4114768)