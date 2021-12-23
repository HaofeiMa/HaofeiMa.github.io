---
title: 数字化方法基础（四）_矩阵操作
date: 2019-10-29 20:45:45
description: 全部教程链接：此为其中的第四部分。基本原理:如图，任意给定一个点的坐标（列向量）x,y,z。设置一个矩阵，利用矩阵的乘法运算即可将三个坐标进行平移
categories:
- 机器人
- OpenGL
tags:
- 笔记
- opengl
---

全部教程链接：
[https://blog.csdn.net/weixin_44543463/article/details/102650117#_490](https://blog.csdn.net/weixin_44543463/article/details/102650117#_490)
此为其中的第四部分

#  Chapter 7 矩阵操作

##  利用矩阵实现向量平移

1、基本原理:如图，任意给定一个点的坐标（列向量）x,y,z。设置一个矩阵，利用矩阵的乘法运算即可将三个坐标进行平移
注意：过程中所设置的矩阵为单位阵的最后一列加上偏移量Tx，Ty，Tz。如下图，大家自己试一下矩阵乘法即可验证。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231011567-numerical-recipe-38.png)

2、在了解了如何将一个列向量进行平移之后，我们就可以编写程序进行向量的平移操作了，我们打开生成螺旋线的程序，注意到螺旋线是由许许多多点组成的，下面这个for循环就是每次生成一个点，我们只需要吧每个点的坐标向量进行平移即可使整个螺旋线平移。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231012895-numerical-recipe-39.png)
3、现在就开始写程序了，首先明确一下程序执行过程

 **1. 获得一个点的坐标存入P0数组内

  2. 设置一个矩阵Translation用来将坐标平移
  3. 将上述两个矩阵相乘得到的结果存入P1数组内，此即为平移后的点的坐标**

4、第一步，获得一个点的坐标存入P0数组内，这一步十分简单（注：除函数定义外，其余代码均在for循环内）`float P0[3] = {x,y,z};`
5、第二步，设置一个矩阵Translation用来将坐标平移，我们需要一个下面这样的矩阵
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231012723-numerical-recipe-40.png)
如何操作呢，首先先初始化一个单位矩阵，然后将单位矩阵的最后一列赋值为需要偏移的量（我的代码十分简单粗暴，当然也可单独另写一个函数用于初始化一个单位矩阵)
注意：在OpenGL中，矩阵是按列数的，就是说我定义的I[16]中的前四个元素I[1]、I[2]、I[3]、I[4]实际上是矩阵的第一列，最后的I[12]、I[13]、I[14]、I[15]是矩阵的最后一列，而非上学期C语言中理解的最后一行

```c
void Translate(float fx,float fy,float fz,float Translation[16])
{
	float I[16] = {1.0f,0.0f,0.0f,0.0f,0.0f,1.0f,0.0f,0.0f,0.0f,0.0f,1.0f,0.0f,0.0f,0.0f,0.0f,1.0f};//定义一个四阶单位阵
	I[12] = fx;//将第四列第一行的元素赋fx
	I[13] = fy;//第四列第二行赋fy
	I[14] = fz;//第四列第三行赋fz
	for(int i = 0;i < 16;i++)
		Translation[i] = I[i];//将I数组的值循环赋给Translation数组
}
```

这样操作之后就获得了如上面图片中的数组了。
6、第三步，将上述两个矩阵相乘得到的结果存入P1数组内，此即为平移后的点的坐标，So我们要做的就是定义一个P1数组`float P1[3];`这十分简单，然后就是写一个矩阵乘法的运算，用Translation*P0，结果存入P1中。
实现代码如下，注意translation为4\*4矩阵，P0为3\*1矩阵，P1为4\*1矩阵，
（为什么要四阶矩阵是因为我们需要矩阵运算平移，只有多加一行一列才能实现，而P0和P1我们实际只用前3个元素，）
故我们让P0的“第四个”元素默认为1，即下面代码中最后一项为1\*translation[i+12]。

```c
void ApplyMatrix(float *P0,float *translation,float *P1)
{
	for(int i = 0;i < 3;++i)
		P1[i] = P0[0]*translation[i]+P0[1]*translation[i+4]+P0[2]*translation[i+8]+translation[i+12];
}
```

7、有了设置操作矩阵的函数Translate，和矩阵相乘的函数ApplyMatrix，我们就可以平移点了。

```c
for(angle = 0.0f; angle <= (2.0f*GL_PI)*3.0f; angle += 0.1f)
		{
		x = 50.0f*sin(angle);
		y = 50.0f*cos(angle);
	
		// Specify the point and move the Z value up a little	
		glVertex3f(x, y, z);
		float P0[3] = {x,y,z};	//定义P0存放平移之前的点
		float P1[3];			//定义P1存放平移之后的点
		float Translation[16];	//存放一个4*4的操作矩阵

		Translate(0.0f,30.0f,0.0f,Translation);	
		//设置操作矩阵为我们想要的格式（单位阵->最后一列赋值）
		ApplyMatrix(P0,Translation,P1);
		//操作矩阵和P0点相乘，结果放在P1内
		glVertex3f(P1[0], P1[1], P1[2]);
		//显示平移之后的点
		z += 0.5f;
		}
```

以上为螺旋线平移步骤

##  使用矩阵实现向量旋转

1、如何进行向量旋转
首先了解一下二维坐标的旋转，设一个向量a的坐标是（x,y），长度为r，与x轴正向夹角为α，则：
			xa = r cos α,
			ya = r sin α.
如果把向量旋转一个角度φ，则新的向量b的坐标是
xb = r cos(α + φ) = r cos α cos φ - r sin α sin φ,
yb = r sin(α + φ) = r sin α cos φ + r cos α sin φ.
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231012454-numerical-recipe-41.png)
又因为xa = r cos α，ya = r sin α.所以容易看出来
xb = xa cos φ - ya sin φ,
yb = ya cos φ + xa sin φ.
而等式右边，又可写成两个矩阵的乘积
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231013633-numerical-recipe-42.png)
由此可知，等式中**由sin和cos组成的二阶方阵**，就**可以实现将向量(xa ya,)旋转为(xb,yb,)**，暂且叫做二阶的旋转操作矩阵
由此推导至三阶，**三阶的旋转操作矩阵为以下三种**（分别为绕x，y，z轴旋转），大家带入检验一下即可知道，
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231013952-numerical-recipe-43.png)
而为了与之前的平移操作统一，因此我们也把这个三阶旋转操作矩阵扩展为四阶的，如下
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231013016-numerical-recipe-44.png)
2、如何编写函数实现向量旋转呢
由刚才的推导我们知道，用旋转操作矩阵左乘一个列向量即可实现向量的旋转操作
现在我们来编写函数，以绕x轴为例，我们先来看一下“主函数”，这是生成螺旋线的那个循环

```c
for(angle = 0.0f; angle <= (2.0f*GL_PI)*3.0f; angle += 0.1f)
		{
		x = 50.0f*sin(angle);
		y = 50.0f*cos(angle);
	
		// Specify the point and move the Z value up a little	
		glVertex3f(x, y, z);
		float P0[3] = {x,y,z};
		float P1[3];

		float Rotation[16] = {0};
//定义一个数组（用于存放旋转操作矩阵）
//这里也可生成一个单位阵，那样就不用初始化为0了
		Rotate_x(-90,Rotation);
//给定一个角度（-90°），生成旋转操作矩阵
		ApplyMatrix(P0,multi,P1);
//用旋转操作矩阵左乘P0，得到的结果P1即为旋转完成的向量坐标
		glVertex3f(P1[0], P1[1], P1[2]);
//显示旋转后的坐标对应的点
		z += 0.5f;
		}
```

因此，我们需要做的就是**写一个函数**，**由参数（角度）生成一个旋转操作矩阵**，这里需要注意的是，math.h头文件中有sin和cos的函数，直接sin（angle）即可调用，其中angle为弧度值，代码如下
（注意，函数里用到的PI是在开头宏定义的`#define PI 3.14159`）

```c
void Rotate_x(float angle,float *rotation)
{
	angle = angle/180.0*PI;
//将角度值转换为弧度值
	rotation[5] = cos(angle);
	rotation[6] = sin(angle);
	rotation[9] = -sin(angle);
	rotation[10] = cos(angle);
	rotation[0] = 1;
	rotation[15] = 1;
//配置各个位置的数值，注意矩阵下标是竖着数的，第一行位置为0、4、8、12
}
```

这样我们得到了旋转操作矩阵，经“主函数”调用即可实现向量的旋转

##  如何让图形既平移又旋转

一个很简单的思路就是**先后调用平移和旋转操作的函数**，像下面这样

```c
for(angle = 0.0f; angle <= (2.0f*GL_PI)*3.0f; angle += 0.1f)
		{
		x = 50.0f*sin(angle);
		y = 50.0f*cos(angle);
	
		// Specify the point and move the Z value up a little	
		glVertex3f(x, y, z);
		float P0[3] = {x,y,z};
		float P1[3];
		float P2[3];

		float Translation[16];
		Translate(0.0f,60.0f,0.0f,Translation);
ApplyMatrix(P0,Translation,P1);
//进行平移操作，P0平移后为P1

		float Rotation[16] = {0};
		Rotate_x(-90,Rotation);
ApplyMatrix(P1,Rotation,P2);
//进行旋转操作，P1旋转后为P2

		glVertex3f(P2[0], P2[1], P2[2]);
//最后输出P2的点即可
		z += 0.5f;
		}
```

但是这显然不是我们想要的，我们想一步就完成平移操作，不需要中间P1的出现，那么就需要**将平移操作矩阵和旋转操作矩阵相乘，得到的仍为一个四阶矩阵，再拿这个新的四阶矩阵左乘列向量xy，即可将列向量既平移又旋转**。
**如何理解？**
我们知道平移操作矩阵和旋转操作矩阵都是可逆矩阵（det Rx ≠ 0，det T ≠ 0）
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231014359-numerical-recipe-45.png)
那么这两个矩阵都可以写成许多个初等矩阵的乘积，即
Rx = R1\*R2\*R3*……Rn * I
T = R1’\*R2’\*R3’……Rn’ * I
（其中R1，R1’……Rn，Rn’都为初等矩阵，初等矩阵还记得吧，刚学过的线代，只进行一次初等变换的矩阵；初等矩阵左乘一个矩阵即对他行变换）
那么我们知道平移操作为
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231014908-numerical-recipe-46.png)
同理旋转操作也可以写成
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231015626-numerical-recipe-47.png)
那么先平移，然后把平移得到的矩阵旋转就可以写成如下的形式
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231015778-numerical-recipe-48.png)
又因为Rx = R1*R2*R3*……Rn，T = R1’*R2’*R3’……Rn’ 
所以 Rx*T*列向量 就代表把列向量平移又旋转
那么我们现在要做的就是写一个四阶矩阵的乘法函数，以获取Rx*T的结果，拿这结果左乘列向量即一步实现平移旋转。
四阶矩阵的乘法代码如下

```c
void mul(float *rotation,float *translation,float *tran)
{
	for(int i = 0;i < 4;i++)
		for(int j = 0;j < 4;j++)
			for(int k = 0;k < 4;k++)
				tran[4*i+j] += rotation[4*k+j]*translation[4*i+k];
}
```

注意这个是用16个元素的变量代表一个矩阵，下标表示比较麻烦，大家可以在纸上写一下
代码写法不唯一，也可以把它拆成四个循环单独写，当然也可以直接把每个元素赋值，赋值16次就完了
然后按照刚才的逻辑在“主函数”里调用一下就可以了

```c
for(angle = 0.0f; angle <= (2.0f*GL_PI)*3.0f; angle += 0.1f)
		{
		x = 50.0f*sin(angle);
		y = 50.0f*cos(angle);
	
		// Specify the point and move the Z value up a little	
		glVertex3f(x, y, z);
		float P0[3] = {x,y,z};
		float P1[3];

		float Translation[16];
		Translate(0.0f,60.0f,0.0f,Translation);
//获得平移操作矩阵
		float Rotation[16] = {0};
		Rotate_x(-90,Rotation);
//获得旋转操作矩阵

		float multi[16] = {0};
		mul(Rotation,Translation,multi);
//两矩阵相乘获得平移+旋转操作矩阵
		ApplyMatrix(P0,multi,P1);
//用平移+旋转操作矩阵左乘P0即可得到被平移且旋转之后的矩阵P1
		glVertex3f(P1[0], P1[1], P1[2]);
		z += 0.5f;
		}
```

以上即利用矩阵实现向量的平移与旋转操作

##  坐标系的旋转

**1、目标**：
给定一个向量（如(1,1,1)），将原坐标系旋转为以此向量为Z轴的坐标系。
**2、基本概念**：
如图，左面的三阶方阵内每一列为新坐标轴的三个单位向量，用这个**三阶方阵左乘一个原坐标系的点**，即可**将这个点坐标旋转为新坐标系的对应坐标**
由此，我们只需要生成一个左面的旋转坐标系的矩阵即可。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231015231-numerical-recipe-49.png)
**3、如何生成Ruvw矩阵**
法一：
（1）先单位化已知矢量z
（2）然后把已知矢量z中的其中一个坐标变为1，这样就获得了两个在同一平面的向量
（3）然后用这两个向量叉乘，得到的结果就是和已知矢量z垂直的矢量y
（4）然后再用已知矢量z叉乘刚获得的向量y，得到与这两个向量都垂直的向量x。
（5）如此，将得到的三个坐标轴矢量组合成的形式（u为新x轴，v为新y轴，w为新z轴）
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231016083-numerical-recipe-50.png)
法二：知道给定矢量的三个坐标(Zx,Zy,Zz),则和这个矢量垂直的向量之一的坐标是(Zy,-Zx,0)，这样同样可以获得两个相互垂直的矢量，然后这俩矢量叉乘得到第三个矢量，即为三坐标轴。将得到的三个坐标轴矢量组合成的形式（u为新x轴，v为新y轴，w为新z轴）
（注：代表新坐标轴的三个矢量均需要单位化)

```c
//此为法二的代码，其中Rotation+4等地方用到了指针的技巧
void RotateCoor(float *z,float *Rotation)
{
	Rotation[3] = 0;
	Rotation[15] = 1;
	Normalize(z);
	for(int i = 0;i < 3;i++)
		Rotation[8+i] = z[i];
	Rotation[4] = -z[1];
	Rotation[5] = z[0];
	Normalize(Rotation+4);
	crossproject(z,Rotation+4,Rotation);
	Normalize(Rotation);
}
```

![](https://gitee.com/huffiema/pictures/raw/master/image/202112231016916-numerical-recipe-51.png)
上图矩阵即为坐标系旋转操作矩阵，**和之前平移与旋转一样**，用**这个矩阵×P0点**，即可得到**坐标轴旋转后的点P1**

##  让图形显示在屏幕中心且绕中心转动

1.首先我们要知道，OpenGL生成的对话框的长和宽是可以设置的，我们需要让对话框的宽高比与我们要生成的图像的宽高比相同，并且对话框要比图像稍大一些。
2、具体如下思路：
设模型的高为ModelHeight，宽为ModelWidth，生成的空间高为h，宽为w
**如果ModelHeight/h > ModelWidth/w，说明对话框比较高（模型比较宽），因此要尽可能满足模型的宽**，比如让**对话框的宽为模型宽的2.5倍**（让对话框稍大一些），则**对话框的高就为 对话框的高/模型的高 * 模型的宽**。
同理对话框比较扁也可以得到对称的结论，因此，用计算得到的对话框的宽和高就可生成一个合适的对话框。
3、如何编程更改对话框大小：
打开之前加载泵体的那个文件(chapt05\shinyjet)更改ChangeSize函数为以下形式

```c
void ChangeSize(int w, int h)
    {
    GLfloat fAspect;
    GLfloat lightPos[] = { -50.f, 50.0f, 100.0f, 1.0f };

    // Prevent a divide by zero
    if(h == 0)
        h = 1;

    // Set Viewport to window dimensions
    glViewport(0, 0, w, h);

    // Reset coordinate system
    glMatrixMode(GL_PROJECTION);
    glLoadIdentity();


    fAspect = (GLfloat) w / (GLfloat) h;
	// Establish clipping volume (left, right, bottom, top, near, far)
	//aspectRatio = (GLfloat)w / (GLfloat)h;
//这之上都不用动
	float scale = 2.5;
//对话框与模型大小比例为2.5倍
	float ScaleHeight,ScaleWidth,ModelWidth,ModelHeight;
//定义对话框的宽高，模型的宽高
	ModelWidth = PointMax[0]-PointMin[0];
	ModelHeight = PointMax[1]-PointMin[1];
//模型宽的计算可由模型上最右的点坐标减最左点的坐标
	if(w*ModelHeight > h*ModelWidth)
	{//当ModelHeight/h > ModelWidth/w时，模型比较宽，对话框比较高
		ScaleHeight = scale * ModelHeight;
//设置对话框的宽为模型宽的2.5倍
		ScaleWidth =  scale * ModelHeight * w / h;
//对话框的高为 对话框的高/模型的高 * 模型的宽
	}
	else
	{
		ScaleWidth =  scale * ModelWidth;
		ScaleHeight = scale * ModelWidth * h / w;
	}
	glOrtho(0.5 * (PointMax[0] - PointMin[0]) - 0.5 * ScaleWidth,0.5 * (PointMax[0] - PointMin[0]) + 0.5 * ScaleWidth,0.5 * (PointMax[1] - PointMin[1]) - 0.5 * ScaleWidth,0.5 * (PointMax[1] - PointMin[1]) + 0.5 * ScaleWidth,-2.0,2.0);
//定出模型的中心坐标，下面代码就根据中心坐标生成一个与模型中心位置相同的对话框
//这之下都不用动
    glMatrixMode(GL_MODELVIEW);
    glLoadIdentity();
    
    glLightfv(GL_LIGHT0,GL_POSITION,lightPos);
    //glTranslatef(0.0f, 0.0f, -150.0f);
    }
```

4、如何编程找出模型上对角线的两个点
将之前写过的读取文件里点的坐标的那个while循环中添加一部分内容，改成如下形式，

```c
		while(strcmp(String0,"endsolid"))
		{
			in >> String0;
			in >> n[0] >> n[1] >> n[2];
			in >> String0 >> String0 >> String0 >> Points[0] >> Points[1] >> Points[2];
			in >> String0 >> Points[3] >> Points[4] >> Points[5];
			in >> String0 >> Points[6] >> Points[7] >> Points[8];
//以下为新加内容，作用为找到对角线上的两个点，存到PointMin和PointMax里
			for(float * point = Points + 3;point < Points + 11;point += 3)
			{
				for(int j = 0;j < 3;j++)
				{
					if(Points[j]<PointMin[j])
					{
						PointMin[j] = Points[j];
					}
					if(Points[j]>PointMax[j])
					{
						PointMax[j] = Points[j];
					}
				}
			}
//以上为新加内容
			glColor3ub(255,255,0);
			glBegin(GL_TRIANGLES);
			DrawTriangle(Points,Points+3,Points+6,n);
			glEnd();
			in >> String0 >> String0>> String0;
		}
（注意，因为PointMin和PointMax既在SetupRC函数里使用又在Changesize函数里使用，故需要定义为全局变量，如下float PointMin[3] = {1.0e38f,1.0e38f,1.0e38f};float PointMax[3] = {1.0e-38f,1.0e-38f,1.0e-38f};）
```

5、现在看起来可以了，我们把对话框设置成了和模型等比例，对称中心重合，但还需要更改一个地方就是，我们生成的**模型中心和我们旋转轴的中心不是重合的**，我们如何实现按下键盘时，让模型绕原点转动，而不是绕其他轴运动。
具体思路就是，我们**要让模型绕自己中心旋转，可以先把模型平移到坐标轴原点处（原点与模型中心重合），进行旋转，然后在平移回原来位置，这样看上去就是模型绕自己中心旋转了**，具体代码如下：

```c
void RenderScene(void)
	{
	// Clear the window with current clearing color
	glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT);

	// Save the matrix state and do the rotations
	glPushMatrix();

	float Translation[16];
	Translate(0.5f * (PointMax[0] + PointMin[0]),0.5f * (PointMax[1] + PointMin[1]),0.5f * (PointMax[2] + PointMin[2]),Translation);
	glMultMatrixf(Translation);

	glRotatef(xRot,1.0f,0.0f,0.0f);
	glRotatef(yRot,0.0f,1.0f,0.0f);
	Translate(-0.5f * (PointMax[0] + PointMin[0]),-0.5f * (PointMax[1] + PointMin[1]),-0.5f * (PointMax[2] + PointMin[2]),Translation);
	glMultMatrixf(Translation);

	glCallList(DrawList);

	// Restore the matrix state
	glPopMatrix();
	// Display the results
	glutSwapBuffers();
	}
```

经过修改这三个地方就实现了让模型能够正常的显示在屏幕中心且绕模型自己的中心转动

#  Chapter 8 造小车

##  装配一个小车

组装小车开始了
在学习本节内容之前，**请先掌握装载泵体模型的相关操作**
1.原理部分：我们知道了如何将一个模型文件装载进来同时显示出来，主要步骤是**先新建一个列表DrawList**，然后**将模型存入此列表中**，最后在**通过glCallList()函数召唤列表即可生成一个模型**。现在我们要做的就是同时生成许多个模型，那么**如何同时生成许多模型呢，只要新建许多列表，然后把它们一个一个召唤出来（glCallList）就可以了**。
2.既然我们需要新建好多个列表，那么我们最好定义一个函数用于生成列表，不然一大段代码赋值五六遍可不是一般的长。把之前在SetupRC函数里的新建列表的代码移出来，稍加修改封装成一个函数。新建列表的代码如下说明一下，函数第一个参数是文件名，也就是”"F:\\Works\\Practice\\数字化方法\\Shove\\Shovel.STL"像这样的字符串，后面三个参数是RGB颜色，用于设置生成的模型的颜色，毕竟你也不想让整个小车变成一个颜色吧。最后一个参数是定义的列表变量的地址，或者说列表变量的指针
（注：为什么要用指针呢，我jo得这个可以参考上学期C++课上的内容，函数的形参只在函数体内有效，比如在主函数里定义了一个变量，把它传给一个函数并在函数内部改变它的值，主函数内的变量的值不会发生改变，因此只有把地址传过去才可以正常新建列表）

```c
void CreatGLList(char *filename,int R,int G,int B,GLuint *listname)
{
	ifstream in(filename);
//要读取的文件是filename，例如如果参数是
//"F:\\Works\\Practice\\数字化方法\\Shove\\Shovel.STL"，
//那么会读取F:\\Works\\Practice\\数字化方法\\Shove这个目录下的Shove1.STL文件。
	if (!in)
		_ASSERT(0);
	
	char String0[30];
	in >> String0 >> String0>> String0;

	*listname = glGenLists(1);
//参数listname是一个指针，*listname才是列表变量
	float Points[12];
	float n[3];

	glNewList(*listname,GL_COMPILE);
		glPolygonMode(GL_BACK,GL_LINE);
		while(strcmp(String0,"endsolid"))
		{
			in >> String0;
			in >> n[0] >> n[1] >> n[2];
			in >> String0 >> String0 >> String0 >> Points[0] >> Points[1] >> Points[2];
			in >> String0 >> Points[3] >> Points[4] >> Points[5];
			in >> String0 >> Points[6] >> Points[7] >> Points[8];
			for(float * point = Points + 3;point < Points + 11;point += 3)
			{
				for(int j = 0;j < 3;j++)
				{
					if(Points[j]<PointMin[j])
					{
						PointMin[j] = Points[j];
					}
					if(Points[j]>PointMax[j])
					{
						PointMax[j] = Points[j];
					}
				}
			}

			glColor3ub(R,G,B);
//根据函数的参数设置模型颜色
			glBegin(GL_TRIANGLES);
			DrawTriangle(Points,Points+3,Points+6);
			glEnd();
			in >> String0 >> String0>> String0;
		}

	glEndList();
}
```

3.我们有了新建列表的函数之后，然后就可以加载文件了……吗？注意，**在使用函数之前先在文件开头定义几个列表变量（GLuint类型变量）**，这个几个变量是用来存放各个模型的，没有这些变量就调用函数，软件会在参数上划红线，也就是它不知道把模型读取进来之后存到哪里去。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231016256-numerical-recipe-52.png)
做好了这两个准备工作之后就可以开始新建模型列表and召唤模型列表了。在SetupRC函数原来加载文件的那个地方就可以用一句简单的CreatGLList("F:\\Works\\Practice\\数字化方法\\Shove\\Shovel.STL",255,255,0,&Shove);代替了。**新建六个模型列表就用六次这个函数就可以了**，比直接复制一大段读取模型的文件简化了不少。就像下面这样
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231017247-numerical-recipe-53.png)
建好了这六个模型列表，那我们就可以直接召唤它们了，在RenderScene函数里直接调用六个glCallList就可以把这六个模型召唤出来了
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231017471-numerical-recipe-54.png)
这么召唤神龙，sorry召唤模型，出来就直接是装配好的小车的样子，（虽然我也不知是为什么
这一节到此为止。

##  让小车动起来

本节的目的是让小车动起来！难度稍大，各位仔细听我娓娓道来
1、理论部分，我们想让这个模型通过按键盘上不同的按键让他动起来，肯定要有**函数用来读取按键**，**读取之后利用平移旋转之类的矩阵各个部分运动起来**。
2、键盘部分：在写函数之前先在文件开头定义一些全局变量（各部分的转动角度），用于以后的旋转矩阵。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231018223-numerical-recipe-55.png)
然后我们先写一下读取按键的函数。请大家先在最下方main函数里添加如下的一行代码，这个是库函数，用于读取按键的。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231018145-numerical-recipe-56.png)
然后在前面我们定义一个函数名叫keyboard，函数内容如下，函数体是有重复的代码组成的

```c
void keyboard(unsigned char key,int x,int y)
{
	static float ShoveStep = 3.0f;
//定义一个静态变量（下一次进入函数，变量内容保持不变）
//步长为3.0f，即设定按一下按键角度变化3度
	if(ShoveRot > 60.0f)
		ShoveRot = -3.0f;
	else if(ShoveRot < -60.0f)
		ShoveRot = 3.0f;
//这里作用是防止模型出现失真（比如铲子转着转着转到驾驶舱里去了）
	switch(key)
	{
		case 'w':ShoveRot+=ShoveStep;glutPostRedisplay();break;
		case 's':ShoveRot-=ShoveStep;glutPostRedisplay();break;
	}
//判断是否是“某一按键”，是的话相应部分的转动角度增加（减少）一个步长。
	static float MainLinkStep = 3.0f;
	if(MainLinkRot > 60.0f)
		MainLinkRot = -3.0f;
	else if(MainLinkRot < -60.0f)
		MainLinkRot = 3.0f;
	switch(key)
	{
		case 'a':MainLinkRot+=MainLinkStep;glutPostRedisplay();break;
		case 'd':MainLinkRot-=MainLinkStep;glutPostRedisplay();break;
	}

	static float MainBodyStep = 3.0f;
	if(MainBodyRot > 60.0f)
		MainBodyRot = -3.0f;
	else if(MainBodyRot < -60.0f)
		MainBodyRot = 3.0f;
	switch(key)
	{
		case 'j':MainBodyRot+=MainBodyStep;glutPostRedisplay();break;
		case 'k':MainBodyRot-=MainBodyStep;glutPostRedisplay();break;
	}

	static float GroundStep = 3.0f;
	if(GroundRot > 60.0f)
		GroundRot = -3.0f;
	else if(GroundRot < -60.0f)
		GroundRot = 3.0f;
	switch(key)
	{
		case 'q':GroundRot+=GroundStep;glutPostRedisplay();break;
		case 'e':GroundRot-=GroundStep;glutPostRedisplay();break;
	}
	static float FrontWheelsStep = 3.0f;
	if(FrontWheelsRot > 60.0f)
		FrontWheelsRot = -3.0f;
	else if(FrontWheelsRot < -60.0f)
		FrontWheelsRot = 3.0f;
	switch(key)
	{
		case 'z':FrontWheelsRot+=FrontWheelsStep;glutPostRedisplay();break;
		case 'x':FrontWheelsRot-=FrontWheelsStep;glutPostRedisplay();break;
	}
	static float BackWheelsStep = 3.0f;
	if(BackWheelsRot > 60.0f)
		BackWheelsRot = -3.0f;
	else if(BackWheelsRot < -60.0f)
		BackWheelsRot = 3.0f;
	switch(key)
	{
		case 'c':BackWheelsRot+=BackWheelsStep;glutPostRedisplay();break;
		case 'v':BackWheelsRot-=BackWheelsStep;glutPostRedisplay();break;
	}

}
```

这样我们就成功的读取到了按键并能够根据按键的不同，相应的角度变量发生改变（函数中的按键可以自己设置，根据个人喜好）
3、矩阵操作部分
首先来了解一下几个函数的用法
**glLoadIdentity();生成一个单位阵并设置为当前阵
glPushMatrix();保存当前的矩阵到一个不知名的地方
glPopMatrix();设置之前保存的矩阵为当前阵
glMultMatrixf(A);用A矩阵乘当前阵，结果设置为当前阵
glRotatef(角度值,0.0f,1.0f,0.0f);后面三个参数若第一个为1，则绕x轴旋转，第二个为1则绕y轴旋转，第三个为1则绕z轴旋转。**
还有一个平移的库函数我没记住；

```c
void RenderScene(void)
	{
	// Clear the window with current clearing color
	glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT);

	// Save the matrix state and do the rotations
	glPushMatrix();

	Translate(0.5f * (PointMax[0] + PointMin[0]),0.5f * (PointMax[1] + PointMin[1]),0.5f * (PointMax[2] + PointMin[2]),Translation);
	glMultMatrixf(Translation);

	glRotatef(xRot,1.0f,0.0f,10.0f);
	glRotatef(yRot,0.0f,1.0f,0.0f);
	Translate(-0.5f * (PointMax[0] + PointMin[0]),-0.5f * (PointMax[1] + PointMin[1]),-0.5f * (PointMax[2] + PointMin[2]),Translation);
	glMultMatrixf(Translation);

	glPushMatrix();
	glCallList(MainBody);

	glPopMatrix();
	glPushMatrix();
	Translate(0,float(-4.89/1000.0),float(-39.75/1000.0),Translation);
	glMultMatrixf(Translation);
	Rotate_x(ShoveRot,Rotation);
	glMultMatrixf(Rotation);
	Translate(0,float(4.89/1000.0),float(39.75/1000.0),Translation);
	glMultMatrixf(Translation);
	glCallList(BackWheels);

	glLoadIdentity();
	Translate(0.5f * (PointMax[0] + PointMin[0]),0.5f * (PointMax[1] + PointMin[1]),0.5f * (PointMax[2] + PointMin[2]),Translation);
	glMultMatrixf(Translation);
	glRotatef(xRot,1.0f,0.0f,10.0f);
	glRotatef(yRot,0.0f,1.0f,0.0f);
	Translate(-0.5f * (PointMax[0] + PointMin[0]),-0.5f * (PointMax[1] + PointMin[1]),-0.5f * (PointMax[2] + PointMin[2]),Translation);
	glMultMatrixf(Translation);
	glPushMatrix();
	Translate(0,float(-6.63/1000.0),float(16.50/1000.0),Translation);
	glMultMatrixf(Translation);
	Rotate_x(ShoveRot,Rotation);
	glMultMatrixf(Rotation);
	Translate(0,float(6.63/1000.0),float(-16.50/1000.0),Translation);
	glMultMatrixf(Translation);
	glCallList(FrontWheels);

    glPopMatrix();
	Translate(0,0,float(-10/1000.0),Translation);
	glMultMatrixf(Translation);
	glRotatef(GroundRot,0.0f,1.0f,0.0f);
	Translate(0,0,float(10/1000.0),Translation);
	glMultMatrixf(Translation);
	glCallList(Ground);

	Translate(0,float(21.74/1000),float(4.06/1000.0),Translation);
	glMultMatrixf(Translation);
	Rotate_x(MainLinkRot,Rotation);
	glMultMatrixf(Rotation);
	Translate(0,float(-21.74/1000),float(-4.06/1000.0),Translation);
	glMultMatrixf(Translation);
	glCallList(MainLink);

	Translate(0,float(31.74/1000.0),float(53.46/1000.0),Translation);
	glMultMatrixf(Translation);
	Rotate_x(ShoveRot,Rotation);
	glMultMatrixf(Rotation);
	Translate(0,float(-31.74/1000.0),float(-53.46/1000.0),Translation);
	glMultMatrixf(Translation);
	glCallList(Shove);

	// Restore the matrix state
	glPopMatrix();
	// Display the results
	glutSwapBuffers();
	}
```

这些代码都可在博客开头的网盘里自行提取
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231018833-numerical-recipe-57.png)
（2）主体和两个轮子要和（1）分开，因为他们的位移没有叠加关系，具体可用glPushMatrix();和glPopMatrix();实现
这部分程序我自己理解的并不是很透彻，如有问题or不懂的请单独找我。

***Continue……***