---
title: 【C++笔记】文件操作
date: 2021-03-11 11:44:35
description: 程序运行时产生的数据都属于临时数据，程序一旦运行结束都会被释放。通过文件可以将数据持久化，C++中对文件操作需要包含头文件#include。
categories:
- 程序设计
- C++
tags:
- 笔记
- c++
---

程序运行时产生的数据都属于临时数据，程序一旦运行结束都会被释放

通过文件可以将数据持久化

C++中对文件操作需要包含头文件`#include<fstream>`



文件类型分为两种：

* 文本文件：文件以文本的ASCII码形式存储在计算机中
* 二进制文件：文件以文本的二进制形式存储在计算机中，用户一般不能直接读懂



文件的操作：

1. ofstream：写操作
2. ifstream：读操作
3. fstream：读写操作



### 一、文本文件

#### 1.1 写文件

写文件步骤如下

1. 包含头文件

   ```c
   #include<fstream>
   ```

2. 创建流对象

   ```c++
   ofstream ofs;
   ```

3. 打开文件

   ```c++
   ofs.open("文件路径", 打开方式)
   ```

   | 打开方式    | 解释                       |
   | ----------- | -------------------------- |
   | ios::in     | 为读文件而打开文件         |
   | ios::out    | 为写文件而打开文件         |
   | ios::ate    | 初始位置：文件尾           |
   | ios::app    | 追加方式写文件             |
   | ios::trunc  | 如果文件存在先删除，再创建 |
   | ios::binary | 二进制方式                 |
  
   文件打开方式可以配合使用，利用|操作符 
   例如：`ios::binary | ios::out`

4. 写数据

   ```c++
   ofs << "写入的数据"
   ```

5. 关闭文件

   ```c++
   ofs.close
   ```

#### 1.2 读文件

读文件步骤如下：

1. 包含头文件

   ```c++
   #include<fstream>
   ```

2. 创建流对象

   ```c+
   ifstream ifs;
   ```

3. 打开文件并判断文件是否打开成功

   ```c++
   ifs.open("文件路径", 打开方式)
   if(!ifs.is_open()){
       cout << "Error: File open failed." << endl;
       return;
   }
   ```

4. 读数据

   ```c++
   string buf;
   while(getline(ifs, buf)){
       cout << buf << endl;
   }
   ```

5. 关闭文件

   ```c++
   ifs.close();
   ```

例：

```c++
#include<iostream>
#include<fstream>
#include<string>
using namespace std;

void test(){
	ifstream ifs;
	ifs.open("test.txt", ios::in);
	if(!ifs.is_open()){
		cout << "Error: File open failed." << endl;
		return;
	}
	string buf;
	while(getline(ifs, buf)){
		cout << buf << endl;
	}
	ifs.close();
}

int main(){
	test();
	system("pause");
	return 0;
}
```

### 二、二进制文件

以二进制的方式对文件进行读写操作

打开方式要指定为`ios::binary`

#### 2.1 写文件

二进制方式写文件主要利用流对象调用成员函数`write`

函数原型：`ostream& write(const char * buffer, int len);`

参数解释：字符指针buffer指向内存中一段存储空间。len是读写的字节数

```c++
//例：将Person类中的数据写入文件
#include<iostream>
#include<fstream>
using namespace std;

class Person{
public:
	char m_Name[64];
	int m_Age;
};

void test(){
	ofstream ofs("person.txt",ios::out | ios::binary);
	Person p = {"Huffie", 21};
	ofs.write((const char *)&p, sizeof(Person));
	ofs.close();
}

int main(){
	test();
	system("pause");
	return 0;
}
```

#### 2.2 读文件

二进制方式读文件主要利用流对象调用成员函数`read`

函数原型：`istream& read(const char * buffer, int len);`

```c++
//例：读取文件中的数据
#include<iostream>
#include<fstream>
using namespace std;

class Person{
public:
	char m_Name[64];
	int m_Age;
};

void test(){
	ifstream ifs;
	ifs.open("person.txt",ios::in | ios::binary);
	if(!ifs.is_open()){
		cout << "Error: File open failed." << endl;
		return;
	}
	Person p;
	ifs.read((char *)&p, sizeof(Person));
	cout << "Name:" << p.m_Name << endl;
	cout << "Age: " << p.m_Age << endl;
	ifs.close();
}

int main(){

	test();

	system("pause");
	return 0;
}
```





  > **参考**：黑马程序员匠心之作|C++教程从0到1入门编程,学习编程不再难
  > **链接**：[https://www.bilibili.com/video/BV1et411b73Z](https://www.bilibili.com/video/BV1et411b73Z)