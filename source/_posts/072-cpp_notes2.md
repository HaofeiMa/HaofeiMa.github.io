---
title: 【C++笔记】封装的意义，结构体和类的区别
date: 2021-03-05 09:12:18
description: 封装的意义将属性和行为作为一个整体，表现生活中的事物；将属性和行为加以权限控制。设计类时，属性和行为写在一起，表现事物，语法规范如下
categories:
- 程序设计
- C++
tags:
- 笔记
- c++
---

#### 一、封装的意义

* 将属性和行为作为一个整体，表现生活中的事物
* 将属性和行为加以权限控制

**1.1 设计类时，属性和行为写在一起，表现事物**

**语法：**`class 类名{ 访问权限: 属性/行为 };`

类中的属性和行为统一称为成员，属性也称为成员属性或成员变量，行为也成为成员函数或成员方法；

```c++
//例1：设计一个圆类，求圆的周长
#include<iostream>
using namespace std;

const double PI = 3.1415926;

//class代表设计一个类，类后面紧跟着类名称
class Circle{
    //访问权限
    //公共权限
    public:
        //属性
        int r;
        //行为
        double calcuPerimeter(){
            return 2 * PI * r;
        }
};

int main(){

    //通过圆类，创建具体的圆对象
    Circle c1;
    //给圆对象的属性赋值
    c1.r = 10;
	
    cout << "Perimeter is " << c1.calcuPerimeter() << endl;

    system("Pause");
    return 0;
}
```

**1.2 类在设计时，可以把属性和行为放在不同的权限下加以控制**

访问权限有三种

1. public：公共权限，类内可以访问，类外可以访问
2. protected：保护权限，类内可以访问，类外不可以访问
3. private：私有权限，类内可以访问，类外不可以访问

> 保护权限和私有权限区别主要在继承方面，子类可以访问父类的保护权限，而私有权限不可访问

#### 二、struct和class的区别

在C++种struct和class的唯一区别在于默认的访问权限不同

* struct：默认权限为公有
* class：默认权限为私有

尽管结构体可以包含成员函数，但它们很少这样做。所以，通常情况下，结构体声明只会声明成员变量。结构体声明通常不包括public或private的访问修饰符。

#### 三、成员属性设置为私有

* 将所有成员属性设置为私有，可以自己控制读写权限
* 对于写权限，我们可以检测数据的有效性

```c++
例：
#include<iostream>
#include<string>
using namespace std;

class Person{
public:
    //设置姓名
    void setName(string name){
        m_Name = name;
    }
    //获取姓名
    string getName(){
        return m_Name;
    }

    //设置性别
    void setGender(string gender){
        if(gender == "Male" or gender == "Female"){
            m_Gender = gender;
        }
        else{
            cout << "Wrong Gender!" << endl;
            m_Gender = "Male";
            return;
        }
    }
    //获取性别
    string getGender(){
        return m_Gender;
    }

    //设置年龄
    void setAge(int age){
        m_Age = age;
    }

private:
    //姓名  可读可写
    string m_Name;
    //性别  可读可写 修改选项只能是 "Male" "Female"
    string m_Gender;
    //年龄  只写
    int m_Age;

};

int main(){

    Person p;

    p.setName("Huffie");
    cout << "Name:\t" << p.getName() << endl;

    p.setGender("Male");
    cout << "Gender:\t" << p.getGender() << endl;

    p.setAge(21);
    //cout << "年龄：" << p.getAge() << endl;

    system("Pause");
    return 0;
}
```

  > **参考**：黑马程序员匠心之作|C++教程从0到1入门编程,学习编程不再难
  > **链接**：[https://www.bilibili.com/video/BV1et411b73Z](https://www.bilibili.com/video/BV1et411b73Z)