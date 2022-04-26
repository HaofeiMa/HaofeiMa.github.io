---
title: 数据处理Numpy的基本使用方法
categories:
  - 程序设计
  - Python
tags:
  - Python
  - 笔记
description: >-
  关于使用Numpy进行一些数组操作的函数方法记录与部分例程，包括数组的创建、切片索引、数组的基本操作（转置、连接、排序、展开等），以及数组运算的一些基本函数的使用方法。
cover: 'https://www.numpy.org.cn/static/images/numpy.logo.jpeg'
abbrlink: 55ccd68
date: 2022-04-24 09:47:13
updated: 2022-04-24 09:47:13
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

**Numpy的安装**

建议使用Anaconda管理这些包，Anaconda的具体教程参考上一篇笔记【Anaconda的基本使用与在Pycharm中调用】

安装好Anaconda后可以在Anaconda Prompt使用`activate 环境名`进入自己创建的环境。

使用下面指令安装Numpy和Pandas

```shell
conda install numpy
conda install pandas
```

**导入numpy**

```python
import numpy as np
```

# 1. 数组创建


## （1）从已有数据创建数组

```python
numpy.array(object, dtype = None, copy = True, order = None, subok = False, ndmin = 0)
# object  数组或嵌套的数列
# dtype   数组元素的数据类型，可选
# copy    对象是否需要复制，可选
# order   创建数组的样式，C为行方向，F为列方向，A为任意方向（默认）
# subok   默认返回一个与基类类型一致的数组
# ndmin   指定生成数组的最小维度
```

> 例如：
> a = np.array([[1, 2], [3, 4]])
> print (a)
> [ [1  2] 
>   [3  4] ]
>  
>  a = np.array([1, 2, 3, 4, 5], ndmin = 2)
>  print (a)
>  [ [1 2 3 4 5] ]


## （2）从数值范围创建数组

numpy.arange：使用 arange 函数创建数值范围并返回 ndarray 对象
 
```python
numpy.arange(start, stop, step, dtype)
```

numpy.linspace 函数用于创建一个一维数组，数组是一个等差数列构成的

```python
np.linspace(start, stop, num=50, endpoint=True, retstep=False, dtype=None)
# num       要生成的等步长的样本数量，默认为50
# endpoint  该值为True时，数列中包含stop值，反之不包含，默认是True。
# retstep   如果为True时，生成的数组中会显示间距，反之不显示，默认是False
```

numpy.logspace 函数用于创建一个于等比数列。

```python
np.logspace(start, stop, num=50, endpoint=True, base=10.0, dtype=None)
# base  对数 log 的底数
```



## （3）创建全0数组

```python
numpy.zeros(shape, dtype = float, order = 'C')
```

## （4）创建全1数组

```python
numpy.ones(shape, dtype = None, order = 'C')
```

## （5）创建指定形状、指定数据类型、但未初始化的数组

```python
numpy.empty(shape, dtype = float, order = 'C')
```

# 2. 数组的基本属性

| 属性             | 说明                                                                                   |
|:---------------- |:-------------------------------------------------------------------------------------- |
| ndarray.ndim     | 秩，即轴的数量或维度的数量                                                             |
| ndarray.shape    | 数组的维度，对于矩阵，n 行 m 列                                                        |
| ndarray.reshape  | 调整数组的大小                                                                         |
| ndarray.size     | 数组元素的总个数，相当于 .shape 中 n·m 的值                                            |
| ndarray.dtype    | ndarray 对象的元素类型                                                                 |
| ndarray.itemsize | ndarray 对象中每个元素的大小，以字节为单位                                             |
| ndarray.flags    | ndarray 对象的内存信息                                                                 |
| ndarray.real     | ndarray元素的实部                                                                      |
| ndarray.imag     | ndarray 元素的虚部                                                                     |
| ndarray.data     | 包含实际数组元素的缓冲区，由于一般通过数组的索引获取元素，所以通常不需要使用这个属性。 |

> 例如：
>a = np.array([[1,2,3],[4,5,6]])   # (2, 3)
>
>a = np.array([[1,2,3],[4,5,6]])
>b = a.reshape(3,2)
>print (b)
>[[1, 2] 
 [3, 4] 
 [5, 6]]
>

# 3. 数组的切片与索引

## （1）slice函数切片

```python
slice(start, stop[, step])
# start  起始位置
# stop   结束位置
# step   间距
```

## （2）冒号`:`分割切片[start:stop:step]

```
a = np.arange(10) # [0 1 2 3 4 5 6 7 8 9]
b = a[2:7:2]
b = a[5]
b = a[2:]
```

>冒号 : 的解释：如果只放置一个参数，如 **[2]**，将返回与该索引相对应的单个元素。如果为 **[2:]**，表示从该索引开始以后的所有项都将被提取。如果使用了两个参数，如 **[2:7]**，那么则提取两个索引(不包括停止索引)之间的项。


## （3）split方法

numpy.split 函数沿特定的轴将数组分割为子数组

```python
numpy.split(ary, indices_or_sections, axis)
# ary：被分割的数组
# indices_or_sections：如果是一个整数，就用该数平均切分，如果是一个数组，为沿轴切分的位置（左开右闭）
# axis：设置沿着哪个方向进行切分，默认为 0，横向切分，即水平方向。为 1 时，纵向切分，即竖直方向
```



# 4. 数组基本操作

## （1）数组展开

numpy.ndarray.flatten 返回一份数组拷贝，对拷贝所做的修改不会影响原始数组。

```python
a = np.arange(8).reshape(2,4)
a.flatten()             # [0 1 2 3 4 5 6 7]
a.flatten(order = 'F')  # [0 4 1 5 2 6 3 7]
# order：'C'按行，'F'按列，'A'原顺序，'K'元素在内存中的出现顺序
```

numpy.ravel() 展平的数组元素，顺序通常是"C风格"，返回的是数组视图（view，有点类似 C/C++引用reference的意味），修改会影响原始数组。

```python
a = np.arange(8).reshape(2,4)
a.ravel()              # [0 1 2 3 4 5 6 7]
a.ravel(order = 'F')  # [0 4 1 5 2 6 3 7]
```

## （2）数组转置

```python
numpy.transpose(arr, axes)
# arr ：要操作的数组
# axes：整数列表，对应维度，通常所有维度都会对换
```

```python
numpy.T
# 数组全部转置
```


> 例如：
> a = np.arange(12).reshape(3,4)
> print (np.transpose(a))
> print (a.T)

## （3）数组轴的移动与交换

numpy.rollaxis 函数移动特定的轴到一个特定位置

```python
numpy.rollaxis(arr, axis, start)
# arr   ：数组
# axis  ：要移动的轴，其它轴的相对位置不会改变
# start ：默认为零，表示完整的滚动。会滚动到特定位置
```

numpy.swapaxes 函数用于交换数组的两个轴

```python
numpy.swapaxes(arr, axis1, axis2)
# arr   ：数组
# axis1 ：对应第一个轴的整数
# axis2 ：对应第二个轴的整数
```

## （4）连接数组

**数组连接**

```python
numpy.concatenate((a1, a2, ...), axis)
# a1, a2, ... ：相同类型的数组
# axis：沿着它连接数组的轴，默认为 0
```

>例如：
>a = np.array([[1,2],[3,4]])
>b = np.array([[5,6],[7,8]])
>print (np.concatenate((a,b)))
>[[1 2]
> [3 4]
> [5 6]
> [7 8]]
 >print (np.concatenate((a,b),axis = 1))
 >[[1 2 5 6]
 > [3 4 7 8]]

**数组堆叠**

numpy.stack 函数用于沿新轴连接数组序列

```python
numpy.stack(arrays, axis)
# arrays : 相同形状的数组序列
# axis   : 返回数组中的轴，输入数组沿着它来堆叠
```

>例如：
>a = np.array([[1,2],[3,4]])
>b = np.array([[5,6],[7,8]])
>print (np.stack((a,b),0))
>[[[1 2]
>  [3 4]]
> [[5 6]
>  [7 8]]]
> print (np.stack((a,b),1))
>[[[1 2]
>  [5 6]]
> [[3 4]
>  [7 8]]]

具体的数组堆叠方式，参考此文章：[【Python中numpy.stack()函数最形象易懂的理解】](https://blog.csdn.net/weixin_44330492/article/details/100126774)

## （5）数组形状改变

**numpy.resize**

numpy.resize 函数返回指定大小的新数组。如果新数组大小大于原始大小，则包含原始数组中的元素的副本。

```python
numpy.resize(arr, shape)
# arr   : 要修改大小的数组
# shape : 返回数组的新形状
```

## （6）数组元素的操作

**numpy.append**

numpy.append 函数在数组的末尾添加值。 追加操作会分配整个数组，并把原来的数组复制到新数组中。 此外，输入数组的维度必须匹配否则将生成ValueError。

```python
numpy.append(arr, values, axis=None)
# arr   ：输入数组
# values：要向arr添加的值，需要和arr形状相同（除了要添加的轴）
# axis  ：默认为 None。当axis无定义时，是横向加成，返回总是为一维数组！当axis有定义的时候，分别为0和1的时候。当axis有定义的时候，分别为0和1的时候（列数要相同）。当axis为1时，数组是加在右边（行数要相同）。
```

**numpy.insert**

numpy.insert 函数在给定索引之前，沿给定轴在输入数组中插入值。

```python
numpy.insert(arr, obj, values, axis)
# arr   ：输入数组
# obj   ：在其之前插入值的索引
# values：要插入的值
# axis  ：沿着它插入的轴，如果未提供，则输入数组会被展开
```

**numpy.delete**

numpy.delete 函数返回从输入数组中删除指定子数组的新数组。

```python
numpy.delete(arr, obj, axis)
# arr ：输入数组
# obj ：可以被切片，整数或者整数数组，表明要从输入数组删除的子数组
# axis：沿着它删除给定子数组的轴，如果未提供，则输入数组会被展开
```

**numpy.unique**

numpy.unique 函数用于去除数组中的重复元素。

```python
numpy.unique(arr, return_index, return_inverse, return_counts)
# arr：输入数组，如果不是一维数组则会展开
# return_index：如果为true，返回新列表元素在旧列表中的位置（下标），并以列表形式储
# return_inverse：如果为true，返回旧列表元素在新列表中的位置（下标），并以列表形式储
# return_counts：如果为true，返回去重数组中的元素在原数组中的出现次数
```

## （7）数组排序

| 种类                      | 速度 | 最坏情况      | 工作空间 | 稳定性 |
| :------------------------ | :--- | :------------ | :------- | :----- |
| `'quicksort'`（快速排序） | 1    | `O(n^2)`      | 0        | 否     |
| `'mergesort'`（归并排序） | 2    | `O(n*log(n))` | ~n/2     | 是     |
| `'heapsort'`（堆排序）    | 3    | `O(n*log(n))` | 0        | 否     |

**numpy.sort()**

numpy.sort() 函数返回输入数组的排序副本。

```python
numpy.sort(a, axis, kind, order)
# a: 要排序的数组
# axis: 沿着它排序数组的轴，如果没有数组会被展开，沿着最后的轴排序， axis=0 按列排序，axis=1 按行排序
# kind: 默认为'quicksort'（快速排序）
# order: 如果数组包含字段，则是要排序的字段

a = np.array([[3,7],[9,1]])
print (np.sort(a))  # [[3 7],[1 9]]
print (np.sort(a, axis = 0))  # [[3 1],[9 7]]
```

**numpy.argsort()**

numpy.argsort() 函数返回的是数组值从小到大的索引值。

```python
np.argsort([3, 1, 2])  # [1 2 0]
```


# 5. Broadcast广播规则

广播(Broadcast)是 numpy 对不同形状(shape)的数组进行数值计算的方式， 对数组的算术运算通常在相应的元素上进行。

**具体广播规则如下：**

-   让所有输入数组都向其中形状最长的数组看齐，形状中不足的部分都通过在前面加 1 补齐。
-   输出数组的形状是输入数组形状的各个维度上的最大值。
-   如果输入数组的某个维度和输出数组的对应维度的长度相同或者其长度为 1 时，这个数组能够用来计算，否则出错。
-   当输入数组的某个维度的长度为 1 时，沿着此维度运算时都用此维度上的第一组值。


**举例**：

```python
a = np.array([[ 0, 0, 0],
           [10,10,10],
           [20,20,20],
           [30,30,30]])
b = np.array([1,2,3])
print(a + b)
```

![](https://www.runoob.com/wp-content/uploads/2018/10/image0020619.gif)


# 6. 数组基本运算

## （1）算数函数

**加减乘除**

NumPy 算术函数包含简单的加减乘除: **add()**，**subtract()**，**multiply()** 和 **divide()**。数组必须具有相同的形状或符合数组广播规则。

```python
a = np.arange(9, dtype = np.float_).reshape(3,3)
b = np.array([10,10,10])
print (np.add(a,b))
print (np.subtract(a,b))
print (np.multiply(a,b))
print (np.divide(a,b))
```

**倒数**

numpy.reciprocal() 函数返回参数逐元素的倒数。

```python
a = np.array([0.25, 1.33, 1, 100])
print (np.reciprocal(a))
```

**指数**

numpy.power() 函数将第一个输入数组中的元素作为底数，计算它与第二个输入数组中相应元素的幂。

```python
a = np.array([10,100,1000])
b = np.array([1,2,3])
print (np.power(a,b))
```

**模与余数**

numpy.mod() 计算输入数组中相应元素的相除后的余数。 函数 numpy.remainder() 也产生相同的结果。

```python
a = np.array([10,20,30])
b = np.array([3,5,7])
print (np.mod(a,b))
print (np.remainder(a,b))
```

## （2）统计函数

**最大值与最小值**

numpy.amin() 用于计算数组中的元素沿指定轴的最小值。
numpy.amax() 用于计算数组中的元素沿指定轴的最大值。
numpy.argmax() 和 numpy.argmin()函数分别沿给定轴返回最大和最小元素的索引

```python
a = np.array([[3,7,5],[8,4,3],[2,4,9]])
print (np.amin(a,1))    # [3 3 2]
print (np.amin(a,0))    # [2 4 3]
print (np.amax(a))      # 9
print (np.amax(a, axis = 0))   # [8 7 9]
print (np.argmax(a))    # 8
print (np.argmax(a, axis = 0)) # [1 0 2]
print (np.argmin(a))    # 6
print (np.argmin(a, axis = 1)) # [0 2 0]
```

**最值差（最大值-最小值）**

numpy.ptp()函数计算数组中元素最大值与最小值的差（最大值 - 最小值）。

```python
a = np.array([[3,7,5],[8,4,3],[2,4,9]])
print (np.ptp(a))    # 7
print (np.ptp(a, axis = 1))    # [4 5 7]
print (np.ptp(a, axis = 0))    # [6 3 6]
```

**算数平均值**

numpy.mean() 函数返回数组中元素的算术平均值。 如果提供了轴，则沿其计算。

```python
a = np.array([[1,2,3],[3,4,5],[4,5,6]])
print (np.mean(a))    # 3.6666666666666665
print (np.mean(a, axis = 0))  # [2.66666667 3.66666667 4.66666667]
print (np.mean(a, axis = 1))  # [2. 4. 5.]
```

**加权平均值**

numpy.average() 函数根据在另一个数组中给出的各自的权重计算数组中元素的加权平均值。

```python
a = np.array([1,2,3,4])
print (np.average(a))  # 2.5
wts = np.array([4,3,2,1])
print (np.average(a,weights = wts))  # 2.0
```

**中位数**

numpy.median() 函数用于计算数组 a 中元素的中位数（中值）

```python
a = np.array([[30,65,70],[80,95,10],[50,90,60]])
print (np.median(a))  # 65.0
print (np.median(a, axis = 0))  # [50. 90. 60.]
print (np.median(a, axis = 1))  # [65. 80. 60.]
```

**方差**

统计中的方差（样本方差）是每个样本值与全体样本值的平均数之差的平方值的平均数，即 mean((x - x.mean())** 2)。

```python
np.var([1,2,3,4])  # 1.25
```

**标准差**

标准差是一组数据平均值分散程度的一种度量，是方差的算术平方根。

```python
np.std([1,2,3,4])  # 1.1180339887498949
```

