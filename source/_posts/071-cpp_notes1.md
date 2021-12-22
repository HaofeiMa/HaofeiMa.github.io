---
title: 【C++笔记】函数的用法：函数的默认参数、占位参数、函数重载
date: 2021-03-04 09:21:15
description: 在C++中，函数的形参列表中的形参是可以有默认值的。如果给形参传入了数据，就用自己的数据；如果没有，就用默认值，但需要注意如果某个位置已经有了默认参数，那么从这个位置往后，必须都有默认值。
categories:
- 程序设计
- C++
tags:
- 笔记
- c++
---

### 函数的默认参数

在C++中，函数的形参列表中的形参是可以有默认值的。

语法：`返回值类型 函数名 (参数=默认值){}`

```c++
int func(int a, int b = 20, int c = 30){
    return a + b + c;
}
```

如果给形参传入了数据，就用自己的数据；如果没有，就用默认值

**注意事项：**

* 如果某个位置已经有了默认参数，那么从这个位置往后，必须都有默认值。（即有默认参数的形参必须放在最后）

  ```c++
  //错误示例：
  int func(int a, int b = 10, int c){
      return a + b + c;
  }
  ```

* 如果函数的声明有了默认参数，函数实现就不能有默认参数。（即声明和实现只能有一个有默认参数）

  ```c++
  //错误示例：
  int func(int a = 10, int b = 10);
  
  int func(int a = 10, int b = 10){
      return a + b;
  }
  error C2572: "func2"：重定义默认参数
  ```

### 函数占位参数

C++中函数的形参列表里可以有占位参数，用来做占位，调用函数时必须填补该位置

语法：`返回值类型 函数名 (数据类型){}`

```c++
void func(int a,int){
    cout << "This is a function." << endl;
}

int main(){
    func(10, 10);	//这里必须要传两个数据
    return 0;
}
```

占位参数还可以有默认参数

```c++
void func(int a, int = 10){
    cout << "This is a function." <<endl
}

int main(){
    func(10);
    return 0;
}
```

### 函数重载

#### 1. 函数重载概述

**作用：**函数名可以相同，提高复用性

**函数重载满足条件**

* 同一个作用域下
* 函数名称相同
* 函数参数**类型不同、个数不同、顺序不同**

```c++
//例：
//func函数都在全局作用域下
//func函数名称相同
//func函数参数类型不同、或个数不同、或顺序不同
void func(){
    cout << "This is func()." << endl;
}

void func(int a){
    cout << "This is func(int a)." << endl;
}

void func(double a){
    cout << "This is func(double a)." << endl;
}

void func(int a, double b){
    cout << "This is func(int a, double b)." << endl;
}

void func(double a, int b){
    cout << "This is func(double a, int b)." << endl;
}

int main(){
    func();
    func(10);
    func(3.14);
    func(10,3.14);
    func(3.14,10);
    return 0;
}
```

#### 2. 函数重载注意事项

* 函数的返回值不可以作为函数重载的条件

  ```c++
  //错误示例
  //无法重载仅按返回类型区分的函数
  void func(double a, int b){
      cout << "This is func(double a, int b)." << endl;
  }
  
  int func(double a, int b){
      cout << "This is func(double a, int b)." << endl;
  }
  ```

* 引用作为重载条件

  ```c++
  //两个函数类型不同
  void func(int &a){
      cout << "This is func(int &a)." <<endl;
  }
  
  void func(const int &a){
      cout << "This is func(const int &a)." <<endl;
  }
  
  int main(){
      int a = 10;
      func(a);	//调用func(int &a)
      func(10);	//调用func(const int &a)
      return 0;
  }
  ```

* 函数重载碰到默认参数

  ```c++
  void func(int a){
      cout << "This is func(int a)." <<endl;
  }
  
  void func(int a, int b = 10){
      cout << "This is func(int a, int b)." <<endl;
  }
  
  int main(){
      func(10);	//X 当函数重载碰到默认参数，出现二义性报错，尽量避免重载时使用默认参数
      func(10, 20);	//√
  }
  ```


  > **参考**：黑马程序员匠心之作|C++教程从0到1入门编程,学习编程不再难
  > **链接**：[https://www.bilibili.com/video/BV1et411b73Z](https://www.bilibili.com/video/BV1et411b73Z)