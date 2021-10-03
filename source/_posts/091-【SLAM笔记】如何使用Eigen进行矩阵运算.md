---
title: 【SLAM笔记】如何使用Eigen进行矩阵运算
date: 2021-04-12 15:35:19
description: Eigen是一个C++开源的线性代数库，提供了快速的矩阵线性代数运算，解方程等功能。许多上层软件库也使用Eigen进行矩阵运算。Eigen是一个纯用头文件搭建起来的库，因此使用的时候，只需要引用它的头文件即可，不需要链接库文件。
categories:
- 机器人
- SLAM
tags:
- 笔记
- slam
---

**SLAM笔记专栏：**[https://blog.csdn.net/weixin_44543463/category_10925276.html](https://blog.csdn.net/weixin_44543463/category_10925276.html)

---
## 一、Eigen库的介绍与安装
### 1.1 Eigen是什么
&emsp;&emsp;Eigen是一个C++开源的线性代数库，提供了快速的矩阵线性代数运算，解方程等功能。许多上层软件库也使用Eigen进行矩阵运算。
&emsp;&emsp;Eigen是一个纯用头文件搭建起来的库，因此使用的时候，只需要引用它的头文件即可，不需要链接库文件。
### 1.2 Eigen的安装
&emsp;&emsp;如果你的电脑上没有安装Eigen，可以输入下面的命令进行安装。
```bash
sudo apt-get install libeigen3-dev
```
## 二、Eigen库的基本使用
### 2.1 Eigen库的引用
在cpp文件的开头插入如下两个头文件
```cpp
#include <Eigen/Core>
#include <Eigen/Dense>
```
在CMakeLists.txt内指定Eigen的头文件目录（如果把Eigen安装在了不同位址，就必须修改这里的头文件目录）
```c
include_directories("/usr/include/eigen3")
```
### 2.2 Eigen的基本语法

|功能|语法
|-|-
|声明一个m行n列的 float 矩阵|`eigen Eigen::Matrix<float,m,n> matrix_name;`
|声明一个三维列向量|`Eigen::Vector3d vector_name;`
|声明一个三阶方阵|`Eigen::Matrix3d matrix_name;`
|动态大小矩阵|`Eigen::Matrix<double,Eigen::Dynamic,Eigen::Dynamic> matrix_name;`
|初始化矩阵为零矩阵|`Eigen::Matrix3d matrix_name = Eigen::Matrix3d::Zero();`
|输入数据|`matrix_name << 1,2,3,4,5,6;`
|输出数据|`cout << matrix_name << endl;`
|数据类型转换|`matrix_name.cast<double>()`
|矩阵乘法|`matrix_name1 * matrix_name2`
|转置|`matrix_name.transpose();`
|各元素和|`matrix_name.sum()`
|迹|`matrix_name.trace()`
|逆|`matrix_name.inverse()`
|行列式|`matrix_name.determinant()`
|共轭矩阵|`matrix_name.conjugate()`
|伴随矩阵|`matrix_adjoint()`
|求特征值|`Eigen::SelfAdjointEigenSolver<Eigen::Matrix3d> eigenSolver(matrix3d);`
|特征值|`eigenSolver.eigenvalues()`
|特征向量|`eigenSolver.eigenvectors()`

### 2.3 使用Eigen实现旋转变换
1. **三维旋转矩阵**：创建一个三维矩阵即可
```cpp
//例：创建一个三阶单位矩阵
Eigen::Matrix3d rotation_matrix = Eigen::Matrix3d::Identity();
```
2. **旋转向量**：使用AngleAxis，可以使用这个它乘向量实现旋转操作（因为定义了运算符重载），括号内是旋转向量的角度和旋转轴
```cpp
//创建一个绕z轴旋转45°的旋转向量
Eigen::AngleAxisd rotation_vector(M_PI/4,Eigen::Vector3d(0,0,1));
```
3. **旋转向量转换为三维旋转矩阵**
```cpp
//将rotation_vector这个旋转向量转换为旋转矩阵并打印出来
cout<<"rotation matrix = \n"<<rotation_vector.matrix()<<endl;
//或通过toRotationMatrix转换为旋转矩阵
rotation_matrix = rotation_vector.toRotationMatrix();
```
4. **旋转矩阵转换为欧拉角**
```cpp
//将旋转矩阵转换为ZYX顺序的欧拉角，即yaw-pitch-roll
Eigen::Vector3d euler_angles = rotation_matrix.eulerAngles(2,1,0);
cout<<"yaw pitch roll = "<<euler_angles.transpose()<<endl;
```
5. **使用旋转向量进行坐标变换**：因为对进行了运算符重载，旋转操作直接乘向量即可
```cpp
//定义一个x方向的向量，用前面定义的旋转向量进行旋转，然后输出旋转后的结果。
Eigen::Vector3d v(1,0,0);
Eigen::Vector3d v_rotated = rotation_vector * v;
cout<<"(1,0,0) after rotation = "<<v_rotated.transpose()<<endl;
```
6. **用旋转矩阵进行坐标变换**
```cpp
v_rotated = rotation_matrix * v;
cout<<"(1,0,0) after rotation = "<<v_rotated.transpose()<<endl;
```
7. **使用变换矩阵进行坐标变换**
```cpp
//定义一个名为T的变换矩阵,虽说是3d，但实际是4x4矩阵，Identity说明旋转是0，平移也是0
Eigen::Isometry3d T=Eigen::Isometry3d::Identity();
//将左上角的旋转矩阵设为按旋转向量rotation_vector旋转
T.rotate(rotation_vector);
//设置右上角的平移矩阵为[1,3,4]（旋转前平移）
T.pretranslate(Eigen::Vector3d(1,3,4));
//因为运算符重载，变换矩阵可以直接乘三维向量
Eigen::Vector3d v_transformed = T*v;
```
8. **使用四元数**
```cpp
//创建一个四元数
Eigen::Quaterniond q;
//可以直接把旋转向量赋值给四元数
q = Eigen::Quaterniond(rotation_vector);
//也可以把旋转矩阵赋值给它
q=Eigen::Quaterniond(rotation_matrix);
//使用四元数旋转一个向量
v_rotated = q*v;
```