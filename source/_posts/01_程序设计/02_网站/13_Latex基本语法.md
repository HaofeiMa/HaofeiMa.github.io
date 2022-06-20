---
title: Latex基本语法
categories:
  - 程序设计
  - 网站
tags:
  - Latex
description: 由于在博客撰写中用到了许多公式的输入，每次遇到不会的Latex语法都要现查，很费劲，因此在这里总结一下。
cover: 'https://www.latex-project.org/img/latex-project-logo.svg'
katex: true
abbrlink: 15b7fde1
date: 2022-04-26 15:27:12
updated: 2022-04-26 15:27:12
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
aplayer:
highlight_shrink:
aside:
stick:
---

# 1. 公式插入

## 行内公式

```latex
$f(x)=x$
```

## 行间公式

$f(x)=x$

```latex
$f(x)=x$
```

$$f(x)=x$$
# 2. 数学运算符号

## 乘法除法

```latex
$a \times b$
$a \div b$
```

$a \times b$
$a \div b$


## 除法分式

```latex
$\frac{a}{b}$
```

$\frac{a}{b}$

## 根号开方

```latex
$\sqrt{}$
$\sqrt[m]{n}$
```

$\sqrt{3}$
$\sqrt[m]{n}$

## 求导导数偏导

```latex
$\frac{\mathrm{d}y}{\mathrm{d}x}$ %求导
$\frac{\partial f}{\partial x}$   %偏导
$f^{'}(x)$     %求导撇
$f^{''}(x)$
$\dot{y}$      %求导点
$\ddot{y}$
$\dddot{y}$
$\nabla{f}$    %全微分
```

$\frac{\mathrm{d}y}{\mathrm{d}x}$

$\frac{\partial f}{\partial x}$

$f^{'}(x)$
$f^{''}(x)$

$\dot{y}$
$\ddot{y}$
$\dddot{y}$

$\nabla{f}$

## 绝对值

```latex
$|x_n|$
$\lvert x_n\rvert$
```

$|x_n|$
$\lvert x_n\rvert$

## 累计求和

```latex
$\sum_{i=1}^{n}$
```

$\sum_{i=1}^{n}$

## 累计求积

```latex
$\prod_{i=1}^{n}$
```

$\prod_{i=1}^{n}$

## 积分

```latex
$\int_{i=1}^{n}$
```

$\int_{i=1}^{n}$

# 3. 字母附加符号

## 上下标

```latex
^{} %上标$x^{2}$
_{} %下标$x_{1}$
```

$x^{2}$
$x_{1}$

## 向量

```latex
$\vec{a}$
$\overrightarrow{AB}$
```

$\vec{a}$
$\overrightarrow{AB}$

## 省略号

```latex
$\cdots$   %省略号...$1,2,3,\cdots,n$
```

$1,2,3,\cdots,n$

## 大括号

```latex
$\underbrace{n}_{m}$ % 大括号 \underbrace{1,2,3,\cdots,n}_{m}
```

$\underbrace{1,2,3,\cdots,n}_{m}$

## 横线

```latex
$\overline{m+n}$ %m+n公式上面加上横杠 
$\underline{m+n}$%m+n公式下面加上横杠
```

$\overline{m+n}$

$\underline{m+n}$


# 4. 特殊字母

## 希腊字母表

| 小写希腊字母  | 代码        | 大写希腊字母 | 代码    |
| ------------- | ----------- | ------------ | ------- |
|$\alpha$     | \alpha      |              |         |
|$\beta$      | \beta       |              |         |
|$\gamma$     | \gamma      |$\Gamma$    | \Gamma  |
|$\delta$     | \delta      |$\Delta$    | \Delta  |
|$\epsilon$   | \epsilon    |              |         |
|$\varepsilon$| \varepsilon |              |         |
|$\zeta$      | \zeta       |              |         |
|$\eta$       | \eta        |              |         |
|$\theta$     | \theta      |$\Theta$    | \Theta  |
|$\vartheta$  | \vartheta   |              |         |
|$\iota$      | \iota       |              |         |
|$\kappa$     | \kappa      |              |         |
|$\lambda$    | \lambda     |$\Lambda$   | \Lambda |
|$\mu$        | \mu         |              |         |
|$\nu$        | \nu         |              |         |
|$\xi$        | \xi         |$\Xi$       | \Xi     |
|$\pi$        | \pi         |$\Pi$       | \Pi     |
|$\varpi$     | \varpi      |              |         |
|$\rho$       | \rho        |              |         |
|$\varrho$    | \varrho     |              |         |
|$\sigma$     | \sigma      |$\Sigma$    | \Sigma  |
|$\varsigma$  | \varsigma   |              |         |
|$\tau$       | \tau        |              |         |
|$\upsilon$   | \upsilon    |              |         |
|$\phi$       | \phi        |$\Phi$      | \Phi    |
|$\varphi$    | \varphi     |              |         |
|$\chi$       | \chi        |              |         |
|$\psi$       | \psi        |$\Psi$      | \Psi    |
|$\omega$     | \omega      |$\Omega$    | \Omega        |


## 常用关系符

关系符都可以前加`\not`表示否定形式

| 符号        | 代码          |
| ----------- | ------------- |
| $\neq$      | \neq or \not= |
| $\leq$      | \leq or \le   |
| $\geq$      | \geq or \ge   |
| $\ll$       | \ll           |
| $\gg$       | \gg           |
| $\subset$   | \subset       |
| $\supset$   | \supset       |
| $\subseteq$ | \subseteq     |
| $\supseteq$ | \supseteq     |
| $\in$       | \in           |
| $\ni$       | \ni           |
| $\bigcup$   | \bigcup       |
| $\bigcap$   | \bigcap       |
| $\propto$   | \propto       |
| $\infty$    | \infty        |



## 特殊符号

| 符号                | 代码              |
| ------------------- | ----------------- |
|$\leftarrow$       | \leftarrow        |
|$\Leftarrow$       | \Leftarrow        |
|$\rightarrow$      | \rightarrow       |
|$\Rightarrow$      | \Rightarrow       |
|$\leftrightarrow$  | \leftrightarrow   |
|$\Leftrightarrow$  | \Leftrightarrow   |
|$\leftharpoonup$   | \leftharpoonup    |
|$\leftharpoondown$ | \leftharpoondown  |
|$\rightharpoondown$| \rightharpoonup   |
|$\rightharpoondown$| \rightharpoondown |
|$\leftrightharpoons$  | \leftrightharpoons   |


## 特殊字体

| 字体样式              | 代码                |
| --------------------- | ------------------- |
|$\mathrm{ABCdef}$    | \mathrm{ABCdef}     |
|$\mathit{ABCdef}$    | \mathit{ABCdef}     |
|$\mathnormal{ABCdef}$| \mathnormal{ABCdef} |
|$\mathcal{ABC}$      | \mathcal{ABC}       |
|$\mathscr{ABC}$      | \mathscr{ABC}       |
|$\mathfrak{ABCdef}$  | \mathfrak{ABCdef}   |
|    $\mathbb{ABC}$                 | \mathbb{ABC}       |


# 5. 文字样式

## 文字颜色

```latex
$\color{blue}{文字}$             %文字颜色
$\color[rgb]{0.9,0.1,0.2}{文字}$%rgb三个参数取值[0,1]
```

$\color{blue}{文字}$
$\color[rgb]{0.9,0.1,0.2}{文字}$

## 文字高亮

```latex
$\colorbox{green}{文字}$              %文字颜色
$\colorbox{yellow}{\color{red}{文字}}$%复合用法
```

$\colorbox{green}{文字}$
$\colorbox{yellow}{\color{red}{文字}}$



