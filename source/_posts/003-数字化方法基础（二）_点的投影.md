---
title: 数字化方法基础（二）_点的投影
date: 2019-10-29 20:42:07
description: 全部教程链接：此为其中的第二部分。Chapter4 用OpenGL生成点的投影。计算点的投影的基本原理如下。
categories:
- 机器人
- OpenGL
tags:
- 笔记
- opengl
---

全部教程链接：
[https://blog.csdn.net/weixin_44543463/article/details/102650117#_490](https://blog.csdn.net/weixin_44543463/article/details/102650117#_490)
此为其中的第二部分
# Chapter4  用OpenGL生成点的投影
##  计算点的投影的基本原理
![](https://img-blog.csdnimg.cn/20191020192801898.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)
##  如何编写程序实现点的投影
1、我们要实现点的投影就要知道投影点的坐标，由上一节可知，需要计算**P0P1矢量**（这个直接调用上一讲求向量的函数），**en向量**（需要写一个单位化函数），**向量点乘**的函数
2、单位化，即将向量各个坐标除以它的模，函数如下
```c
void Normalize(float n[3])
{
	float length;
	length = sqrt(n[0]*n[0]+n[1]*n[1]+n[2]*n[2]);
	//求向量的模
	for(int i = 0;i < 3;i++)
		n[i] /= length;
	//函数执行过后n[3]即变成单位法向量
}
```

3、进行向量点乘计算，并求N点坐标
```c
void ProjectPointtoPoint(float point[3],float a[3],float n[3], float ProjectPoint[3])
{
	float vector_a_p[3];
	float distance;
	for(int i = 0;i < 3;i++)
		vector_a_p[i] = point[i] - a[i];
	//求面内一点与面外一点的向量,即P0P1
	distance = vector_a_p[0]*n[0]+vector_a_p[1]*n[1]+vector_a_p[2]*n[2];
	//做点乘运算求点到平面距离，即图中|P0N|
	for(int j = 0;j < 3;j++)
		ProjectPoint[j] = point[j] - n[j]*distance;
	//N点坐标=P0坐标 - en * |P0N|
}
```
4、经过上述步骤之后就获得投影点坐标，然后就可调用库函数显示投影点，以下为显示一个点的函数
```c
void DrawPoint(float a[3],float b[3],float c[3],float point[3])
{
	float n[3];
	project(a,b,c,n);
	//求abc平面法向量
	Normalize(n);
	//单位化法向量
	float ProjectPoint[3];
	//定义一个数组用来存放投影点坐标
	ProjectPointtoPoint(point,a,n,ProjectPoint);
	//获得投影点坐标
	glVertex3fv(ProjectPoint);
	//显示投影点
}
```
5、同三角形，在RenderSenen()函数中的画三角形的glEnd()后面 **再次写入glBegin()与glEnd()函数，并在二者之间插入显示点的代码**。
```c
	float point[3] = {0.0f,0.0f,0.0f};
	//定义要投影的点
	glColor3ub(0,0,0);
	//显示的点的颜色
	glPointSize(6.0f);
	//显示的点的大小
	glBegin(GL_POINTS);
	//开始生成点
	DrawPoint(rgfPoints4,rgfPoints4+3,rgfPoints4+6,point);
	//根据第一个面3个点，画第一个投影点
	DrawPoint(rgfPoints4,rgfPoints4+9,rgfPoints4+3,point);
	DrawPoint(rgfPoints4+3,rgfPoints4+9,rgfPoints4+6,point);
	DrawPoint(rgfPoints4,rgfPoints4+6,rgfPoints4+9,point);
	glEnd();
```
6、调试成功，显示如图
![](https://img-blog.csdnimg.cn/20191020190700117.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)

#  Chapter5  如何使用VS2010的调试功能
 假如我写完程序调试后发现点没有显示，那么可以一步步调试，找出错误的地方。
 1、设置断点，在觉得可能出问题的代码处设置断点
![](https://img-blog.csdnimg.cn/20191020190926284.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)
2、点击调试，下图红框内左面按键为单步执行，点一下执行一句话，如果遇到函数就进入函数内部执行函数体的第一句；右面的按键，点一下执行一句，在遇到函数是直接将整个函数执行完，即将函数也当成一句话。
![](https://img-blog.csdnimg.cn/20191020191040439.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)
3、这里选择左面按键进入函数内部查看,黄色箭头表示当前执行到哪一句
![](https://img-blog.csdnimg.cn/20191020191502654.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)
4、按第二个按键将这个函数执行完（但不要退出这个函数，否则函数内部的变量内存会被释放，无法查看变量的值）
![](https://img-blog.csdnimg.cn/20191020191717196.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)
5、此时可以看到下面的监视窗口可以看到变量，单击+即可看到变量的值，图中展开的为第一个面的法向量和投影点坐标
![](https://img-blog.csdnimg.cn/20191020191851486.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)
第二个面的法向量和投影点坐标
![](https://img-blog.csdnimg.cn/20191020192033599.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)
第三个面
![](https://img-blog.csdnimg.cn/20191020192148203.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)
第四个
![](https://img-blog.csdnimg.cn/20191020192223839.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SHVmZmllX0hlYnV0CumprOa1qemjniDmsrPljJflt6XkuJrlpKflraY=,size_16,color_FFFFFF,t_70#pic_center)

**Continue**