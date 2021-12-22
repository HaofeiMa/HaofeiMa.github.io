---
title: LabView学习笔记（十）：条件结构
date: 2021-01-16 21:54:02
description: 条件结构类似C语言中的if…else…和switch结构，主要用于分支选择程序逻辑。条件结构包括两个及以上子程序框图或分支。每次仅执行一个条件分支。右键单击条件结构边框添加、复制、删除、重排及选择默认分支。可创建多个输入/输出隧道。
categories:
- 嵌入式
- LabVIEW
tags:
- 笔记
- labview
---

**Labview学习笔记**：
[LabView学习笔记（一）：基础介绍](https://blog.csdn.net/weixin_44543463/article/details/112325523)
[LabView学习笔记（二）：滤波器实验](https://blog.csdn.net/weixin_44543463/article/details/112329185)
[LabView学习笔记（三）：基本控件](https://blog.csdn.net/weixin_44543463/article/details/112364388)
[LabView学习笔记（四）：动态数据类型](https://blog.csdn.net/weixin_44543463/article/details/112366358)
[LabView学习笔记（五）：数据类型综合实验](https://blog.csdn.net/weixin_44543463/article/details/112392799)
[LabView学习笔记（六）：while循环与for循环](https://blog.csdn.net/weixin_44543463/article/details/112393383)
[LabView学习笔记（七）：变量与移位寄存器](https://blog.csdn.net/weixin_44543463/article/details/112431393)
[LabView学习笔记（八）：属性节点](https://blog.csdn.net/weixin_44543463/article/details/112470713)
[LabView学习笔记（九）：数组与簇](https://blog.csdn.net/weixin_44543463/article/details/112529983)
[LabView学习笔记（十）：条件结构](https://blog.csdn.net/weixin_44543463/article/details/112571924)
[其它实验过程记录](https://blog.csdn.net/weixin_44543463/category_10714833.html)

---
## 条件结构
1. 条件结构类似C语言中的if…else…和switch结构，主要用于分支选择程序逻辑。
2. 条件结构包括两个及以上子程序框图或分支。每次仅执行一个条件分支
3. 右键单击条件结构边框添加、复制、删除、重排及选择默认分支。
## 输入和输出隧道
1. 可创建多个输入/输出隧道
2. 输入数据可供全部条件分支使用
3. 必须为每个条件分支定义各自的输出隧道
4. 默认分支选择器是布尔型的，当为真的时候，执行真框图内的内容，当为假的时候执行假框图内的内容。同时分支选择器也可以是数组、枚举等控件输入。

## 实验
**任务要求**
1. 产生频率、波形类型均可设置的信号
2. 已足够的采样率产生和显示波形，并生成采样率可调的波形，并进行比较
3. 显示波形和信号频谱

**实现过程**
1. 信号的产生和显示是一个连续的过程，所以考虑使用循环。
2. 由于信号的波形类型是可以设置的，所以在前面板中插入一个枚举型变量用于进行设置，对于枚举型变量采用不同的值，要产生不同的波形，因此使用条件结构进行判断。
<img src="https://img-blog.csdnimg.cn/20210114140551282.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/2021011414062461.png" width="10%">
3. 首先对第一种波形（正弦波）进行设置，程序框图中添加一个正弦波形生成控件。
（1）设置波形：在前面板插入一个旋钮用于调节频率，回到程序框图将其连到正弦波形生成控件的频率接口上。
<img src="https://img-blog.csdnimg.cn/20210114140824878.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210114140826953.png" width="15%">
（2）设置采样信息：在对应接口处添加常量，增大采样率，产生采样率足够大的正弦信号。
<img src="https://img-blog.csdnimg.cn/20210114140930231.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
4. 产生采样信号 添加一个正弦波形生成控件用于产生采样信号，在前面板添加一个文本下拉列表控件用于设置采样率（数据类型为DBL，采样率如下图），利用捆绑，将采样率和采样点数捆绑后传递给正弦波形生成控件的采样信息接口。其它接口与上面正弦波形的部分一致。
<img src="https://img-blog.csdnimg.cn/20210114141006713.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="40%">
<img src="https://img-blog.csdnimg.cn/20210114141012688.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
5. 显示信号：因涉及到两个信号的显示，因此使用创建数组，将两个信号合成为数组传递到波形图中。
<img src="https://img-blog.csdnimg.cn/20210114141103436.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
6. 信号测量：添加一个FFT功率谱和PSD（在信号处理-波形测量中）。将采样信号连接至时间信号接口，平均参数接口创建一个常量并选择RMS平均方式。然后在前面板添加一个波形图控件用于显示频谱图。
<img src="https://img-blog.csdnimg.cn/20210114141151598.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
7. 配置其他波形：先在条件结构中删除方波分支，然后选择复制正弦波分支，并将条件结构内的正弦波形生成控件替换为方波生成控件。（其他波形也是类似的操作流程）
<img src="https://img-blog.csdnimg.cn/20210114141236718.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210114141245973.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210114141254503.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
8. 添加停止按钮，修改波形图的横坐标显示范围，最后修饰一下界面，程序就成功完成了
<img src="https://img-blog.csdnimg.cn/20210114141355605.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
采样率足够高时，波形信号与采样率几乎重合。
<img src="https://img-blog.csdnimg.cn/20210114141446991.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
采样率较低时，会出现明显的失真
<img src="https://img-blog.csdnimg.cn/20210114141518519.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">