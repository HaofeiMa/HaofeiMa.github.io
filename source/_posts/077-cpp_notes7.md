---
title: 【C++笔记】继承
date: 2021-03-10 15:31:37
description: 继承是面向对象的三大特性之一。定义类时，下级别的成员除了拥有上一级的共性，还有自己的特性。
categories:
- 程序设计
- C++
tags:
- 笔记
- c++
---

**继承是面向对象的三大特性之一**

定义类时，下级别的成员除了拥有上一级的共性，还有自己的特性

#### 6.1 继承的基本语法

作用：减少代码重复量

语法：`class 子类 : 继承方式 父类`

例：`class MyPage : public BasePage `

> 子类也称为派生类、父类也称为基类
>
> 派生类中的成员，包含两大部分：一类是从基类继承过来的，一类是自己增加的成员。从基类继承过来的表现其共性，新增的表现其个性

#### 6.2 继承方式

继承方式一共有三种：

* 公共继承
  * 父类中的公共权限成员，子类中也是公共权限
  * 父类中的保护权限成员，子类中也是保护权限
  * 父类的私有权限成员，子类无法访问
* 保护继承
  * 父类中的公共权限成员，子类中也是保护权限
  * 父类中的保护权限成员，子类中也是保护权限
  * 父类的私有权限成员，子类无法访问
* 私有继承
  * 父类中的公共权限成员，子类中是私有权限
  * 父类中的保护权限成员，子类中是私有权限
  * 父类的私有权限成员，子类无法访问
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210308144516842.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

#### 6.3 继承中的对象模型

父类中所有非静态成员属性都会被子类继承下去。父类中私有成员属性，是被编译器隐藏了，因此是访问不到，但是确实被继承下去了。

```c++
//例：
class Base{
public:
	int m_A;
protected:
	int m_B;
private:
	int m_C;
};

class Son : public Base{
public:
	int m_D;
};

void test(){
	cout << "size of Son = " << sizeof(Son) << endl;
    //输出结果：16
}
```

#### 6.4 继承中构造和析构顺序

子类继承父类后，创建子类对象，也会调用父类的构造函数

继承中的构造和析构顺序如下：

* 构造：先构造父类，在构造子类
* 析构：顺序与构造相反

```c++
//例：
class Base{
public:
	Base(){
		cout << "Base的构造函数" << endl;
	}

	~Base(){
		cout << "Base的析构函数" << endl;
	}
};

class Son : public Base{
public:
	Son(){
		cout << "Son的构造函数" << endl;
	}

	~Son(){
		cout << "Son的析构函数" << endl;
	}
};

void test(){
	Son s;
}
------------
//输出
Base的构造函数
Son的构造函数
Son的析构函数
Base的析构函数
```

#### 6.5 继承同名成员处理方式

* 访问子类同名成员，直接访问即可
* 访问父类同名成员，需要加作用域

例：`s.Base::m_A`或`s.Base::func()`

```c++
//测试案例
#include <iostream>
using namespace std;

class Base{
public:
	Base(){
		m_A = 100;
	}

	void func(){
		cout << "Base func 函数调用" << endl;
	}

	int m_A;

};

class Son : public Base{
public:
	Son(){
		m_A = 200;
	}

	void func(){
		cout << "Son func 函数调用" << endl;
	}

	int m_A;
};

void test01(){
	Son s;
	cout << "Son : m_A = " << s.m_A << endl;
	cout << "Base : m_A = " << s.Base::m_A << endl;
}

void test02(){
	Son s;
	s.func();
	s.Base::func();
}

int main(){

	test02();

	system("pause");
	return 0;
}
```

> 注意事项：
>
> 如果子类中出现和父类同名的成员函数，子类中的同名成员会隐藏掉父类中所有同名成员函数（包括重载）。如果先要访问父类同名成员，需要加作用域

#### 6.6 继承同名静态成员处理方式

静态成员和非静态成员出现同名，处理方式一致

* 访问子类同名成员，直接访问即可
* 访问父类同名成员，需要加作用域

```c++
#include <iostream>
using namespace std;

class Base{
public:
	static int m_A;
	static void func(){
		cout << "Base - static void func" << endl;
	}
};
int Base::m_A = 100;

class Son : public Base{
public:
	static int m_A;
	static void func(){
		cout << "Son - static void func" << endl;
	}
};
int Son::m_A = 200;

void test01(){
	//通过对象访问
	Son s;
	cout << "Son - m_A = " << s.m_A << endl;
	cout << "Base - m_A =  " << s.Base::m_A << endl;
	//通过类名访问
	cout << "Son - m_A = " << Son::m_A << endl;
	//第一个::代表通过类名方式访问	第二个::代表访问父类作用域下的成员
	cout << "Base - m_A = " << Son::Base::m_A << endl;
}

void test02(){
	//通过对象访问
	Son s;
	s.func();
	s.Base::func();
	//通过类名访问
	Son::func();
	Son::Base::func();
}

int main(){

	test02();

	system("Pause");
	return 0;
}
```

#### 6.7 多继承语法

C++允许一个类继承多个类

语法：`class 子类 : 继承方式 父类1, 继承方式 父类2...`

```c++
//例：
class Son : public Base1, public Base2{
```

如果多继承中父类出现了同名情况，子类使用时要加作用域

```c++
//例：
cout << "Base1 - m_A = " << s.Base1::m_A << endl;
cout << "Base2 - m_A = " << s.Base2::m_A << endl;
```

#### 6.8 菱形继承

**概念**：

1. 两个派生类继承同一个类
2. 又有某个类同时继承这两个类
3. 这种继承称为菱形继承

**菱形继承的问题**：

1. Son1继承了Base的数据，Son2也继承了Base的数据，当GrandSon使用数据时，就会产生二义性

   > 解决方法：两个父类因为相同的数据，需要加以作用域区分
   >
   > ```c++
   > g.Son1::m_A = 100
   > ```

2. GrandSon继承来自Base的数据有两份，但实际上有一份就可以

   > 利用虚继承，解决菱形继承数据重复的问题。发生虚继承之后，数据只有一个，且可以不加作用域直接访问。
   >
   > 在继承前加上关键字virtual。此时的Base称为虚基类。
   >
   > ```c++
   > class Son1 : virtual public Base
   > ```



  > **参考**：黑马程序员匠心之作|C++教程从0到1入门编程,学习编程不再难
  > **链接**：[https://www.bilibili.com/video/BV1et411b73Z](https://www.bilibili.com/video/BV1et411b73Z)