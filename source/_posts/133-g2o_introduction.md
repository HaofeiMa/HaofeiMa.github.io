---
title: g2o图优化简介与基本使用方法
date: 2021-10-24 11:03:18
description: g2o（General Graphic Optimization）是一个基于图优化的库，将非线性优化与图论结合起来的理论，我们可以利用g2o求解任何可以表示为图优化的最小二乘问题。
categories:
- 机器人
- SLAM
tags:
- 笔记
- slam
- 实验
---




### 一、g2o简介

g2o（General Graphic Optimization）是一个基于图优化的库，将非线性优化与图论结合起来的理论，我们可以利用g2o求解任何可以表示为图优化的最小二乘问题。

> 图优化就是把优化问题表现成图的方式。图由顶点和边组成，其中顶点表示优化变量，边表示误差项，对任意一个非线性?> 最小二乘问题，我们都可以构建与之对应的图。
> （注：这里的图是图论意义上的图，可以用概率论里面的定义，贝叶斯图或因子图。）


### 二、g2o安装
首先安装g2o的依赖
```bash
sudo apt install qt5-qmake qt5-default libqglviewer-dev-qt5 libsuitesparse-dev libcxsparse3 libcholmod3 
```

然后到github下clone此工程，然后编译安装，指令如下：
```bash
git clone https://github.com/RainerKuemmerle/g2o.git
cd g2o/
mkdir build
cd build
cmake ../
make
```

g2o的头文件在`/usr/local/g2o`下，库文件在`/usr.local/lib`下。

### 三、利用g2o拟合曲线
#### 1. 拟合步骤
**① 定义顶点和边的类型（优化变量与误差项）**
**② 构建图**
**③ 选择优化算法**
**④ 调用g2o进行优化，返回结果**

### 2. 实验-拟合曲线
此示例程序还依赖opencv、Eigen、Ceres库，需要预先安装。

**main.cpp文件**：

```cpp
#include <iostream>
#include <g2o/core/g2o_core_api.h>
#include <g2o/core/base_vertex.h>
#include <g2o/core/base_unary_edge.h>
#include <g2o/core/block_solver.h>
#include <g2o/core/optimization_algorithm_levenberg.h>
#include <g2o/core/optimization_algorithm_gauss_newton.h>
#include <g2o/core/optimization_algorithm_dogleg.h>
#include <g2o/solvers/dense/linear_solver_dense.h>
#include <Eigen/Core>
#include <opencv2/core/core.hpp>
#include <cmath>
#include <chrono>

using namespace std;

// 曲线模型的顶点（优化变量）（参数：维度、数据类型）
// 优化变量维数：3维    数据类型：Eigen::Vector3d
class CurveFittingVertex : public g2o::BaseVertex<3, Eigen::Vector3d> {
public:
    EIGEN_MAKE_ALIGNED_OPERATOR_NEW     // 字节对齐

    // 重置
    virtual void setToOriginImpl() override {
        _estimate << 0, 0, 0;           // 设定被优化变量的原始值、重置成员函数的估计值
    }

    //更新
    virtual void oplusImpl(const double *update) override {
        _estimate += Eigen::Vector3d(update);           // 更新优化变量（估计值）。增量方程计算出增量△x后，通过此函数对估计值进行调整
    }

    //读盘
    virtual bool read(istream &in) {}

    //存盘
    virtual bool write(ostream &out) const {}
};


// 曲线模型的边（误差项）（参数：观测值维度、类型、连接定点类型）
// 边的模型：BaseUnaryEdge   连接顶点个数：1    测量值数据类型：double  顶点类型：CurveFittingVertex
class CurveFittingEdge : public g2o::BaseUnaryEdge<1, double, CurveFittingVertex> {
public:
    EIGEN_MAKE_ALIGNED_OPERATOR_NEW

    CurveFittingEdge(double x):BaseUnaryEdge(),_x(x) {}

    // 计算曲线模型误差
    virtual void computeError() override {
        const CurveFittingVertex *v = static_cast<const CurveFittingVertex *> (_vertices[0]);        // _vertices[]存储顶点信息
        const Eigen::Vector3d abc = v->estimate();
        _error(0, 0) = _measurement - std::exp(abc(0, 0) * _x * _x + abc(1,0) * _x + abc(2, 0));        // _error存储computeError()函数计算的误差
    }

    // 计算雅克比矩阵
    virtual void linearizeOplus() override {
        const CurveFittingVertex *v = static_cast<const CurveFittingVertex *> (_vertices[0]);
        const Eigen::Vector3d abc = v->estimate();
        double y = exp(abc[0] * _x * _x + abc[1] * _x + abc[2]);
        _jacobianOplusXi[0] = -_x * _x * y;
        _jacobianOplusXi[1] = -_x * y;
        _jacobianOplusXi[2] = -y;
    }

    virtual bool read(istream &in) {}

    virtual bool write(ostream &out) const {}

public:
    double _x;    //x值；（y值为_measurement测量值）
};

int main() {
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

    // 构建图优化
    typedef g2o::BlockSolver<g2o::BlockSolverTraits<3, 1>> BlockSolverType;    // 配置BlockSolver，每个误差项优化变量维度为3，误差值维度为1
    typedef g2o::LinearSolverDense<BlockSolverType::PoseMatrixType> LinearSolverType;    // 创建BlockSolver，并用定义的线性求解器初始化

    // 设置梯度下降的方法，创建总求解器solver
    auto solver = new g2o::OptimizationAlgorithmGaussNewton(g2o::make_unique<BlockSolverType>(g2o::make_unique<LinearSolverType>()));
    g2o::SparseOptimizer optimizer;     //创建系数优化器
    optimizer.setAlgorithm(solver);     //设置求解方法
    optimizer.setVerbose(true); //打开调试输出

    // 图中加入顶点
    CurveFittingVertex *v = new CurveFittingVertex();
    v->setEstimate(Eigen::Vector3d(ae, be, ce));
    v->setId(0);
    optimizer.addVertex(v);

    // 图中加入边
    for(int i = 0; i < N; i++){
        CurveFittingEdge *edge = new CurveFittingEdge(x_data[i]);
        edge->setId(i);                     //定义边的编号（决定在H矩阵中的位置）
        edge->setVertex(0, v);           //设置连接的顶点
        edge->setMeasurement(y_data[i]);    //设置观测值
        edge->setInformation(Eigen::Matrix<double, 1, 1>::Identity() * 1 / (w_sigma * w_sigma));    //信息矩阵：协方差矩阵的逆
        optimizer.addEdge(edge);
    }

    // 执行优化
    cout << "Start optimization" << endl;
    chrono::steady_clock::time_point t1 = chrono::steady_clock::now();  //记录算法执行时间
    optimizer.initializeOptimization(); //初始化
    optimizer.optimize(10);    //执行10次
    chrono::steady_clock::time_point t2 = chrono::steady_clock::now();
    chrono::duration<double> time_used = chrono::duration_cast<chrono::duration<double>>(t2 - t1);
    cout << "Solve time cost = " << time_used.count() << " s." << endl;

    Eigen::Vector3d abc_estimate = v->estimate();   //获取当前值
    cout << "estimated model: " << abc_estimate.transpose() << endl;

    return 0;
}
```

**CMakeLists.txt文件**：
```cpp
cmake_minimum_required(VERSION 3.20)
project(g2oCurveFitting)
set(CMAKE_CXX_STANDARD 14)

# OpenCV库
find_package(OpenCV REQUIRED)
include_directories(${OpenCV_INCLUDE_DIRS})

# Eigen库
include_directories("/usr/include/eigen3")

# Ceres库
find_package(Ceres REQUIRED)
include_directories(${CERES_INCLUDE_DIRS})

# g2o库
list( APPEND CMAKE_MODULE_PATH /home/huffie/slam/3rdparty/g2o/cmake_modules ) #刚才clone的项目文件夹
set(G2O_ROOT /usr/local/include/g2o)
find_package(G2O REQUIRED)
include_directories(${G2O_INCLUDE_DIRS})

add_executable(g2oCurveFitting main.cpp)

target_link_libraries(g2oCurveFitting ${OpenCV_LIBS})
target_link_libraries(g2oCurveFitting  g2o_stuff   g2o_core )
target_link_libraries(g2oCurveFitting ${CERES_LIBRARIES})
```
