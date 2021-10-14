---
title: 【C++笔记】对象模型和this指针
date: 2021-03-07 22:46:12
description: C++中，类内的成员变量和成员函数分开存储，只有非静态成员变量才属于类的对象。每一个非静态成员函数只会产生一份函数实例，也就是多个同类型的对象会共用一块代码，而代码如何区分哪个对象调用自己。这里就用到了this指针。
categories:
- 程序设计
- C++
tags:
- 笔记
- c++
---

### 一、成员变量和成员函数分开存储

C++中，类内的成员变量和成员函数分开存储，只有非静态成员变量才属于类的对象

1. 空对象也会占用内存

   C++编译器会给每个空对象也分配一个字节空间，是为了标志此对象占内存的位置。每个空对象也应该有一个独一无二的内存地址

   > ```c++
   > class Person{};
   > ```
   >
   > ```c++
   > cout << "size of p = " << sizeof(p) << endl;
   > ```
   >
   > 空对象占用1个字节内存

2. **只有**类的非静态成员变量，属于类的对象

   > ```c++
   > class Person{
   > 	int m_A;
   > };
   > ```
   >
   > ```c++
   > cout << "size of p = " << sizeof(p) << endl;
   > ```
   >
   > 只含一个int非静态成员变量的对象占用4个字节内存

3. 类的静态成员变量，不属于类的对象

   > ```c++
   > class Person{
   > 	int m_A;
   > 	static int m_B;
   > };
   > int Person::m_B = 100;
   > ```
   >
   > ```c++
   > cout << "size of p = " << sizeof(p) << endl;
   > ```
   >
   > 对象还是占用4个字节内存

4. 成员变量和成员函数是分开存储的

   > ```c++
   > class Person{
   > 	int m_A;
   > 	static int m_B;
   > 	void func(){}
   > };
   > ```
   >
   > ```c++
   > cout << "size of p = " << sizeof(p) << endl;
   > ```
   >
   > 对象还是占用4个字节内存

### 二、this指针

有上述可知，C++中成员变量和成员函数是分开存储的。

每一个非静态成员函数只会产生一份函数实例，也就是多个同类型的对象会共用一块代码，而代码如何区分哪个对象调用自己。



这里就用到了this指针，**this指针指向被调用的成员函数所属的对象**



this指针是隐含每一个非静态成员函数内的一种指针

this指针不需要定义，直接使用即可



this指针的用途：

* 形参和成员变量同名时，可以用this指针来区分

* 在类的非静态成员函数中返回对象本身，可使用return *this

```C++
#include<iostream>
using namespace std;

class Person{
public:
	Person(int money){
		//this指针指向被调用的成员函数所属的对象
		this->money = money;	//如果不加this，则赋值两侧会认为是同一个money
	}

	Person& PersonAddMoney(Person &p){
		this->money += p.money;	//将传入的p对象的money加到此对象上
		return *this;	//this是指向对象的指针，*this就是指向对象本体
	}

	int money;
};

void test01(){
	Person p1(18);
	cout << "p1的财产为：" << p1.money << endl;
}

void test02(){
	Person p1(10);
	Person p2(10);
	p2.PersonAddMoney(p1).PersonAddMoney(p1).PersonAddMoney(p1);//链式编程
	cout << "p2的财产为：" << p2.money << endl;

}

int main(){

	//test01();
	test02();

	system("pause");
	return 0;
}
```

### 三、空指针访问成员函数

C++中空指针也可以调用成员函数，但是也要注意有没有用到this指针

如果用到this指针，需要加判断保证代码的健壮性。

```c++
#include <iostream>
using namespace std;

class Person{
public:

	void showClassName(){
		cout << "This is Person class." << endl;
	}

	void showPersonAge(){
		if(this == NULL){
			return ;
		}
		cout << "age = " << this->m_Age << endl;	//报错原因是传入的指针为空
	}
	
	int m_Age;
};

void test01(){
	Person * p = NULL;
	p->showClassName();	//空指针也可以正常执行
	p->showPersonAge();	//如果不加if语句会报错
}

int main(){

	test01();

	system("pause");
	return 0;
}
```

### 四、const修饰成员函数

**常函数：**

* 成员函数后加const后我们称为这个函数为常函数

  ```c++
  void showPerson() const {}
  ```

* 常函数不可以修改成员属性

  > 常函数也存在this指针，而**this指针的本质是指针常量**，指针的指向是不可修改的。
  >
  > 在成员函数后面加this，修饰的是this指向，让指针指向的值也不可以修改。
  >
  > ```c++
  > class Person{
  > public:
  > 	void showPerson() const {
  > 		this->m_A = 100;	//报错
  > 	}
  > 
  > 	int m_A;
  > }
  > ```

* 成员属性声明时加关键字mutable，在常函数中依然可以修改

  > ```c++
  > mutable int m_B;
  > ```
  >
  > 创建了一个特殊的变量，即使在常函数中也可以修改，常对象也可以修改

**常对象**

* 对象前加const，创建的是常对象

  ```c++
  const Person p;
  ```

* 常对象无法修改成员变量，值可以修改加mutable的变量

* 常对象只能调用常函数，不能调用普通成员函数，因为普通成员函数可以修改属性



  > **参考**：黑马程序员匠心之作|C++教程从0到1入门编程,学习编程不再难
  > **链接**：[https://www.bilibili.com/video/BV1et411b73Z](https://www.bilibili.com/video/BV1et411b73Z)