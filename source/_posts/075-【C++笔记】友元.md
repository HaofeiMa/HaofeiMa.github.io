---
title: 【C++笔记】友元
date: 2021-03-08 10:24:23
description: 有些私有属性，可需要让类外特殊的一些函数或类进行访问，就需要利用友元。友元的关键字为fiend。友元的三种实现方法全局函数做友元、类做友元、成员函数做友元。
categories:
- 程序设计
- C++
tags:
- 笔记
- c++
---

有些私有属性，可需要让类外特殊的一些函数或类进行访问，就需要利用友元。

友元的关键字为fiend

友元的三种实现方法

* 全局函数做友元
* 类做友元
* 成员函数做友元

### 一、全局函数作友元

将全局函数的声明写在类的定义内，并在前面添加关键字friend。

例：`friend void func(Person *person);`

```c++
class Person{
	//goodFriend全局函数可以访问Person中的私有成员
	friend void goodFriend(Person *person);
public:
	Person(){
		m_Name = "Huffie";
		m_Money = 0;
	}
public:
	string m_Name;

private:
	double m_Money;
};

void goodFriend(Person *person){
	cout << "Friends is getting:" << person->m_Name << endl;
	cout << "Friends is getting:" << person->m_Money << endl;
}

```

### 二、类作友元

语法：`friend class className;`

```c++
#include<iostream>
#include<string>
using namespace std;


//Person类的定义
class Person{
	friend class goodFriend;
public:
	Person();

public:
	string m_Name;
private:
	double m_Money;
};

Person::Person(){
	m_Name = "Huffie";
	m_Money = 100;
}

//goodFriend类的定义
class goodFriend{
public:
	goodFriend();

	void get();	//获取函数，获取Person中的属性

	Person * person;
};

goodFriend::goodFriend(){
	person = new Person;
}

void goodFriend::get(){
	cout << "goodFriend类正在访问：" << person->m_Name << endl;
	cout << "goodFriend类正在访问：" << person->m_Money << endl;
}

//测试函数
void test01(){
	goodFriend gf;
	gf.get();
}

int main(){

	test01();

	system("pause");
	return 0;
}
```

### 三、成员函数作友元

例：`friend void className::func();`

```c++
#include<iostream>
#include<string>
using namespace std;

class Person;

class goodFriend{
public:
	goodFriend();

	void get1();	//让get函数可以访问Person中私有成员
	void get2();	//让get函数不可以访问Person中私有成员

	Person * person;

};

class Person{
	friend void goodFriend::get1();
public:
	Person();
	string m_Name;
private:
	double m_Money;
};

Person::Person(){
	m_Name = "Huffie";
	m_Money = 100;
}

goodFriend::goodFriend(){
	person = new Person;
}

void goodFriend::get1(){
	cout << "get函数正在访问：" << person->m_Name << endl;
	cout << "get函数正在访问：" << person->m_Money << endl;
}

void goodFriend::get2(){
	cout << "get函数正在访问：" << person->m_Name << endl;
	//cout << "get函数正在访问：" << person->m_Money << endl;
}

void test(){
	goodFriend gf;
	gf.get1();
	gf.get2();
}

int main(){

	test();

	system("pause");
	return 0;
}
```

  > **参考**：黑马程序员匠心之作|C++教程从0到1入门编程,学习编程不再难
  > **链接**：[https://www.bilibili.com/video/BV1et411b73Z](https://www.bilibili.com/video/BV1et411b73Z)