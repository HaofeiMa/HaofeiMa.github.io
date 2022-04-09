---
title: 《cmake practice》总结  cmake的构建过程与基本指令
description: >-
  CMake是一一个跨平
  台的开源元构建系统,可以构建、测试和打包软件。它可以用来支持多种本地编译环境。越来越多的项目正在使用cmake作为其构建工具，这也使得cmake正在成为一个主流的构建体系。
categories:
  - 程序设计
  - C++
tags:
  - opencv
  - c++
abbrlink: 4e7d4c9e
date: 2021-09-14 19:16:16
---

## 〇、基本语法规则
### 0.1 变量
&emsp;&emsp;变量使用 ${VALUENAME} 方式取值，但是在IF控制语句中直接使用变量名。
1. `CMAKE_BINARY_DIR` 或 `PROJECT_BINARY_DIR` 或 `<ProjectName>_BINARY_DIR`：均代表编译目录。如果是内部构建，就是指工程顶层目录；如果是外部构建，就是指工程编译发生的目录。
2. `CMAKE_SOURCE_DIR` 或 `PROJECT_SOURCE_DIR` 或 `<ProjectName>_SOURCE_DIR`：均代表工程顶层目录。
3. `CMAKE_CURRENT_SOURCE_DIR`：代表当前处理的 CMakeLists.txt 所在的路径。
4. `CMAKE_CURRENT_BINARY_DIR`：如果是内部构建，与`CMAKE_CURRENT_SOURCE_DIR`相同；如果是外部构建，则代表目标编译目录。
5. `CMAKE_CURRENT_LIST_FILE`：这个变量所在的CMakeLists.txt的完整路径。
6. `CMAKE_CURRENT_LIST_LINE`：这个变量所在的行。
7. `CMAKE_MODULE_PATH`：定义cmake模块所在的路径
8. `EXECUTABLE_OUTPUT_PATH` 和 `LIBRARY_OUTPUT_PATH`：分别重新定义最终结果的存放目录。
9. `PROJECT_NAME`：项目名称
### 0.2 指令规则
&emsp;&emsp;1. 基本语法为：指令(参数1 参数2 ...)
&emsp;&emsp;2. 参数之间使用空格或分号隔开，例如`ADD_EXECUTABLE(hello main.c;func.c)`
&emsp;&emsp;3. 指令不区分大小写，参数和变量区分大小写，但推荐全部使用大写指令
&emsp;&emsp;4. 当文件名中含有空格时，必须使用双引号，例如`SET(SRC_LIST "fu nc.c")`

### 0.3 基本构建过程
&emsp;&emsp;1. 编写程序与CMakeLists.txt文件
&emsp;&emsp;2. 建立外部编译目录：`mkdir build`
&emsp;&emsp;3. 进入外部编译目录：`cd build`
&emsp;&emsp;4. 构建工程：`cmake ..` 
&emsp;&emsp;5. 实际构建：`make`
&emsp;&emsp;6. 运行程序：`./<Executable Filename>`
&emsp;&emsp;7. 清理工程：`make clean`
## 一、基本指令
### 1. PROJECT指令
```c
PROJECT(projectname [CXX] [C] [Java])
# 例：PROJECT(HELLO)
```
&emsp;&emsp;定义工程名称，并可制订工程支持的语言，默认支持所有语言。此指令隐式的定义了两个变量 `PROJECT_BINARY_DIR` 和 `PROJECT_SOURCE_DIR`。

### 2. SET指令
```c
SET(VAR [VALUE] [CACHE TYPE DOCSTRING [FORCE]])
# 例1：SET(SRC_LIST main.c)
# 例2：SET(EXECUTABLE_OUPUT_PATH ${PROJECT_BINARY_DIR}/bin)
```
&emsp;&emsp;用来显式的定义变量。
&emsp;&emsp;在`ADD_EXECUTABL`所在的CMakeLists.txt文件中，添加如例2的语句，可以修改最终目标二进制文件输出的路径为`build/bin`

### 3. MESSAGE指令
```c
MESSAGE([SEND_ERROR | STATUS | FATAL_ERROR] "message to display")
# 例：MESSAGE(STATUS "This is BINARY dir ${HELLO_BINARY_DIR}")
```
&emsp;&emsp;用于向终端输出用户定义的信息，包括三种类型
* SEND_ERROR：产生错误，生成过程被跳过
* STATUS：输出前缀为-的信息
* FATAL_ERROR：立即终止所有cmake过程

### 4. ADD_EXECUTABLE指令
```c
ADD_EXECUTABLE(<Executable Filename> ${SRC_LIST})
# 例：ADD_EXECUTABLE(hello ${SRC_LIST})
```
&emsp;&emsp;定义工程会生成文件名为`<Executable Filename>`的可执行文件，相关的源文件是SRC_LIST中定义的源文件列表。

### 5. ADD_SUBDIRECTORY指令
```c
ADD_SUBDIRECTORY(source_dir [binary_dir] [EXCLUDE_FROM_ALL])
# 例：ADD_SUBDIRECTORY(src bin)
```
&emsp;&emsp;用于将子目录加入当前工程，并可以指定其二进制文件存放的位置。`EXCLUDE_FROM_ALL`含义是将此目录从编译过程中排除。（例：将src子目录加入工程，并制订编译输出路径为bin，那么编译结果都将放在`build/bin`中）

### 6. INSTALL指令
```cpp
INSTALL(TARGETS targets... [EXPORT <export-name>]
        [[ARCHIVE|LIBRARY|RUNTIME|OBJECTS|FRAMEWORK|BUNDLE|
          PRIVATE_HEADER|PUBLIC_HEADER|RESOURCE]
         [DESTINATION <dir>]
         [PERMISSIONS permissions...]
         [CONFIGURATIONS [Debug|Release|...]]
         [COMPONENT <component>]
         [NAMELINK_COMPONENT <component>]
         [OPTIONAL] [EXCLUDE_FROM_ALL]
         [NAMELINK_ONLY|NAMELINK_SKIP]
        ] [...]
        [INCLUDES DESTINATION [<dir> ...]]
        )
# 例：INSTALL(FILES COPYRIGHT README DESTINATION share/doc/cmake/test)
# 例：INSTALL(PROGRAMS runprog.sh DESTINATION bin)
```
&emsp;&emsp;INSTALL指令用于安装各种类型的文件，参数中的TARGETS就是要安装的文件，可以是二进制文件、动态库、静态库。在各个CMakeLists.txt中编写好INSTALL指令后就可以开始安装了。
&emsp;&emsp;安装的过程如下：
```c
	cmake -DCMAKE_INSTALL_PREFIX=<Install Path>
	make
	make install
```

### 7. ADD_DEPENDENCIES指令
```c
ADD_DEPENDENCIES(target-name depend-target1 depend-target2 ...)
```
&emsp;&emsp;定义target以来的其他target，确保在本项目编译前，其他target已经被构建
### 8. ADD_TEST与ENABLE_TESTING指令
```c
ADD_TEST(testname Exename arg1 arg2 ...)
ENABLE_TEST()
```
&emsp;&emsp;用于创建test目标，生成makefile后就可以通过make test进行测试了。
### 9. EXEC_PROGRAM
```cpp
EXEC_PROGRAM(Executable
			[directory in which to run]
			[ARGS <arguments to executable>]
			[OUTPUT_VARIABLE <var>]
			[RETURN_VALUE <var>])
```
&emsp;&emsp;用于指定在特定的目录运行某个程序。

## 三、静态库与动态库的构建与使用
### 3.1 静态库和动态库的构建方法
&emsp;&emsp;1. 在工程目录下新建一个`lib`文件夹，并将其添加进工程目录中。
```c
# 工程目录下的CMakeLists.txt
PROJECT(HELLOLIB)
ADD_SUBDIRECTORY(lib)
```
&emsp;&emsp;2. 在`lib`文件夹下创建源文件。
&emsp;&emsp;3. 在`lib`目录下创建`CMakeLists.txt`。
```c
SET(LIBHELLO_SRC hello.c)
#创建动态库
ADD_LIBRARY(hello SHARED ${LIBHELLO_SRC})
#创建静态库
ADD_LIBRARY(hello_static STATIC ${LIBHELLO_SRC})
SET_TARGET_PROPERTIES(hello_static PROPERTIES OUTPUT_NAME "hello")
#实现动态库版本号
SET_TARGET_PROPERTIES(hello PROPERTIES VERSION 1.2 SOVERSION 1)
#安装共享库和头文件
INSTALL(TARGETS hello hello_static LIBRARY DESTINATION lib ARCHIVE DESTINATION lib)
INSTALL(FILES hello.h DESTINATION include/hello)
```
&emsp;&emsp;4. 安装共享库和头文件
```bash
cd build
cmake -DCMAKE_INSTALL_PREFIX=/usr ..
make
make install
```

### 3.2 外部共享库和头文件的使用
&emsp;&emsp;1. 在新工程目录下创建`src`目录，并在其中编写源文件main.c
&emsp;&emsp;2. 编写工程目录下`CMakeLists.txt`
```c
PROJECT(NEWHELLO)
ADD_SUBDIRECTORY(src)
```
&emsp;&emsp;3. 编写`src`目录下的`CMakeLists.txt`
```c
ADD_EXECUTABLE(main main.c)
# 添加头文件搜索路径
INCLUDE_DIRECTORIES(/usr/include/hello)
# 将目标文件链接到共享库
TARGET_LINK_LIBRARIES(main libhello.so)
# 或：TARGET_LINK_LIBRARIES(main hello)
# 或链接到静态库：TARGET_LINK_LIBRARIES(main libhello.a)
```
&emsp;&emsp;4. 构建运行
```bash
cd build
cmake ..
make
```

> 参考自[《cmake practice》](https://huffie.lanzoui.com/i2kKdu0fu9e)