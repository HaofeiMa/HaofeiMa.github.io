---
title: 【Ceres基本使用方法】使用Ceres拟合曲线求解最小二乘问题
description: >-
  Ceres是一个最小二乘问题求解库，我们只需要定义待优化的问题，然后交给它计算即可。使用方法：1.
  定义每个参数块。参数块就是简单的向量，也可以是四元数、李代数等特殊的结构……
categories:
  - 机器人
  - SLAM
tags:
  - 笔记
  - slam
  - 实验
abbrlink: 1efb54e0
date: 2021-10-23 11:56:10
---




### 一、Ceres简介
Ceres是一个最小二乘问题求解库，我们只需要定义待优化的问题，然后交给它计算即可。

**① 基本概念**
常用的最小二乘问题形式如下：



![](https://img.mahaofei.com/img/202112232017086-ceres-introduction-1.png)



* 参数块：$x_1$, ... $x_n$等优化变量
* 代价函数（残差块/误差项）：$f_i$
* 核函数：ρ(·)，目标函数由许多平方项经过核函数求和自称

**② 使用方法**
1. 定义每个参数块。参数块就是简单的向量，也可以是四元数、李代数等特殊的结构。
2. 定义残差块的计算方式。残差块对参数块进行自定义计算，返回残差值，然后求平方和作为目标函数的值。
3. 定义雅可比的计算方式。
4. 把所有的参数块和残差块加入Ceres定义的Problem对象中，调用Solve函数求解

### 二、Ceres安装
首先下载Ceres的源代码
```bash
git clone https://github.com/ceres-solver/ceres-solver.git
```
安装ceres所需要的依赖
```bash
sudo apt install libsuitesparse-dev libcxsparse3 libgflags-dev libgoogle-glog-dev libgtest-dev
```
然后进入文件夹编译安装ceres，这里耗时比较久大概20min左右。
```bash
cd ceres-solver/
mkdir build
cd build
cmake ..
make
sudo make install
```

安装完成后，如果在`/usr/local/include/ceres/`目录下能找到Ceres的头文件，并且也有库文件`/usr/local/lib/libceres.a `，说明安装成功了，可以使用Ceres进行优化计算了。
```bash
ll /usr/local/include/ceres/
ll /usr/local/lib/libceres.a 
```

### 三、使用Ceres拟合曲线
此示例程序依赖opencv、Eigen库，需要预先安装。

**main.cpp**文件代码程序如下：
```cpp
#include <iostream>
#include <opencv2/core/core.hpp>
#include <ceres/ceres.h>
#include <chrono>

using namespace std;

// 构建代价函数的计算模型
struct CURVE_FITTING_COST{
    CURVE_FITTING_COST(double x, double y) : _x(x), _y(y) {}

    // 重载()，仿函数
    template<typename T>
    bool operator()(
            const T *const abc, // 模型参数，有3维
            T *residual) const {
        residual[0] = T(_y) - ceres::exp(abc[0] * T(_x) * T(_x) + abc[1] * T(_x) + abc[2]); // y-exp(ax^2+bx+c)
        return true;
    }

    const double _x, _y;
};

int main(int argc, char **argv) {
    //定义数据参数
    double ar = 1.0, br = 2.0, cr = 1.0;    //真实参数值
    double ae = 2.0, be = -1.0, ce = 5.0;   //估计参数值
    int N = 100;                            //数据点个数
    double w_sigma = 1.0;                   //噪声Sigma值
    double inv_sigma = 1.0 / w_sigma;
    cv::RNG rng;                            //随机数产生器

    //生成100个带高斯噪声的数据
    vector<double> x_data, y_data;
    for (int i = 0; i < N; i++){
        double x = i / 100.0;
        x_data.push_back(x);
        y_data.push_back(exp(ar * x * x + br * x + cr) + rng.gaussian(w_sigma * w_sigma));
    }

    double abc[3] = {ae, be, ce};

    //构建最小二乘问题
    ceres::Problem problem;
    for (int i = 0; i < N; i++){
        //添加误差项。使用自动求导，模板参数：误差类型、输出维度、输入维度、维数要与前面struct中一致
        problem.AddResidualBlock(new ceres::AutoDiffCostFunction<CURVE_FITTING_COST, 1, 3>(new CURVE_FITTING_COST(x_data[i], y_data[i])),nullptr,abc);
        //nullptr为核函数不使用为空，abc为待估计参数
    }

    //配置并运行求解器
    ceres::Solver::Options options;     //定义配置项
    options.linear_solver_type = ceres::DENSE_NORMAL_CHOLESKY;  //配置增量方程的解法
    options.minimizer_progress_to_stdout = true;    //输出到cout
    ceres::Solver::Summary summary; //定义优化信息
    chrono::steady_clock::time_point t1 = chrono::steady_clock::now();  //计时：求解开始时间
    ceres::Solve(options, &problem, &summary);  //开始优化求解！
    chrono::steady_clock::time_point t2 = chrono::steady_clock::now();  //计时：求解结束时间
    chrono::duration<double> time_used = chrono::duration_cast<chrono::duration<double>>(t2 - t1);  //计算求解耗时

    //输出信息
    cout << "solve time cost = " << time_used.count() << "s." << endl;  //输出求解耗时
    cout << summary.BriefReport() << endl;  //输出简要优化信息
    cout << "estimated a, b, c = ";
    for (auto a:abc)    //输出优化变量
        cout << a << " ";
    cout << endl;

    return 0;
}
```

**CMakeLists.txt**内容如下：
```cpp
cmake_minimum_required(VERSION 3.20)
project(ceresCurveFitting)
set(CMAKE_CXX_STANDARD 14)

# OpenCV库
find_package(OpenCV REQUIRED)
include_directories(${OpenCV_INCLUDE_DIRS})

# Ceres库
find_package(Ceres REQUIRED)
include_directories(${CERES_INCLUDE_DIRS})

# Eigen库
include_directories("/usr/include/eigen3")

# 定义可执行文件
add_executable(ceresCurveFitting main.cpp)

# 链接库
target_link_libraries(ceresCurveFitting ${OpenCV_LIBS})
target_link_libraries(ceresCurveFitting ${CERES_LIBRARIES})
```



![](https://img.mahaofei.com/img/202112232017359-ceres-introduction-2.png)

