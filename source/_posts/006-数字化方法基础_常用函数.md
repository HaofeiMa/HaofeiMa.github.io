---
title: 数字化方法基础_常用函数
date: 2019-10-29 21:12:14
description: 数字化方法基础_常用函数1.叉乘2.单位化矢量3.矩阵乘法4.矩阵乘法。
categories:
- 机器人
- OpenGL
tags:
- 笔记
- opengl
---


## 1. 叉乘
```c
 void crossproject(float vec1[3],float vec2[3],float n[3])
{
	n[0] = vec1[1]*vec2[2]-vec1[2]*vec2[1];
	n[1] = vec1[2]*vec2[0]-vec1[0]*vec2[2];
	n[2] = vec1[0]*vec2[1]-vec1[1]*vec2[0];
}
```
## 2. 单位化矢量
```c
void Normalize(float n[3])
{
	float length;
	length = sqrt(n[0]*n[0]+n[1]*n[1]+n[2]*n[2]);
	for(int i = 0;i < 3;i++)
		n[i] /= length;
}
```
 ## 3. 矩阵乘法4×4  ×  4×1
```c
void ApplyMatrix(float *P0,float *translation,float *P1)
{
	for(int i = 0;i < 3;i++)
		P1[i] = P0[0]*translation[i]+P0[1]*translation[i+4]+P0[2]*translation[i+8]+translation[i+12];
}
```
 ## 4. 矩阵乘法 4×4  ×  4×4
```c
void mul(float *rotation,float *translation,float *tran)
{
	for(int i = 0;i < 4;i++)
		for(int j = 0;j < 4;j++)
			for(int k = 0;k < 4;k++)
				tran[4*i+j] += rotation[4*k+j]*translation[4*i+k];
}
```