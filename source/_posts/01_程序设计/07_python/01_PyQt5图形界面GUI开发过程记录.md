---
title: PyQt5图形界面GUI开发过程记录
description: >-
  由于最近实验室需要处理很多表格，因此使用python做了一个工具辅助处理。程序使用pyqt5作为图形界面，记录了从安装pyqt5，到设计界面，再到调用控件的代码，最后打包exe文件的全过程。
categories:
  - 程序设计
  - Python
tags:
  - Python
  - 实验
cover: 'https://img.mahaofei.com/img/202112232018814-pyqt5-2.png'
abbrlink: 6c1e143c
date: 2021-12-17 16:53:44
updated: 2021-12-17 16:53:44
top_img:
keywords:
comments:
toc:
toc_number:
toc_style_simple:
copyright:
copyright_author:
copyright_author_href:
copyright_url:
copyright_info:
mathjax:
katex:
aplayer:
highlight_shrink:
aside:
stick:
---


## 一、PyQT的简介与安装
### 1.1 常用的图形界面GUI

目前主流的python图形界面有Tkinter、PyQT5/PySide2、wxPython等。

| 图形界面      | 优点                                     | 缺点                           |
| ------------- | ---------------------------------------- | ------------------------------ |
| Tkinter       | Python标准库、稳定、发布程序较小         | 控件少，无法拖拽设计界面       |
| PyQt5/PySide2 | 控件比较丰富、用户多、有designer设计界面 | 库比较大，发布出来的程序比较大 |
| wxPython      | 控件比较丰富                             | 文档少、用户少                 |

### 1.2 PyQT5的安装

直接在命令行使用pip工具安装
```bash
pip install pyqt5-tools
```

将PyQt5安装目录下的`\plugins\platforms`这个路径添加到环境变量Path中。（先找python安装目录`Python39`或`Python38`，再找下面的`\Lib\site-packages\PyQt5\Qt5`）

如我的路径是这样的：
```
C:\Users\82785\AppData\Local\Programs\Python\Python39\Lib\site-packages\PyQt5\Qt5\plugins\platforms
```

**注：设置环境变量后，需要重启电脑，因为新的环境变量要重启后才能被系统识别**

## 二、PyQt的基本使用

### 2.1 QApplication
提供整个图形界面程序的底层管理功能，如初始化、程序入口参数处理、用户事件处理等。

* 在创建控件之前，必须先创建QApplication。

```python
app = QApplication([])
```

* 在程序末尾，需要添加事件处理循环代码，用于接受输入事件，并分配给相应对象进行处理。

```python
app.exec()
```

### 2.2 界面控件

QMainWindow、QPlainTextEdit、QPushButton是三个控件类，分别是界面的主窗口、文本框、按钮。`要想在界面上创建一个控件，就需要在程序代码中创建空间对应的类的实例对象`。

* 控件是层层嵌套的：
创建文本框和按钮时，都需要一个参数window，就是指定父控件对象（主窗口）。
而实例化主窗口时，不需要指定父控件，因为主窗口就是最上层控件了。

```python
QPlainTextEdit(window)
QPushButton('文本框', window)
```

* move方法决定了控件的显示位置

```python
window.move(300, 310)	# 主窗口左上角相对屏幕左上角位置
textEdit.move(10,25)	# 文本框左上角相对父窗口左上角位置
```

* resize方法决定了控件显示大小

```python
window.resize(600, 400)		# 主窗口宽600像素，高400像素
textEdit.resize(200,150)	# 文本框宽200像素，高150像素
```

* show方法将所有放在主窗口的控件显示出来

```python
window.show()
```

### 2.3 界面动作处理

在Qt系统中，当控件被点击、输入文本、拖拽等操作时，会发出信号Signal。

要想使程序对这些操作进行响应，就要预先在代码中指定处理signal的函数，这样的函数称为slot。

如定义一个函数：

```python
def buttonPress()：
	print('按钮被按下了')
```

然后使用如下代码，让button被按下时，执行buttonPress()函数

```python
button.clicked.connect(buttonPress)
```

### 2.4 窗口封装为类

为了模块化、便于使用，以及避免控件中出现的变量名冲突，通常会把**一个窗口和其包含的控件封装到类中**

```python
from PySide2.QtWidgets import QApplication, QMainWindow, QPushButton,  QPlainTextEdit,QMessageBox

class MyWindows():
    def __init__(self):
        self.window = QMainWindow()
        self.window.resize(500, 400)
        self.window.move(300, 300)
        self.window.setWindowTitle('示例程序')

        self.textEdit = QPlainTextEdit(self.window)
        self.textEdit.setPlaceholderText("文本框提示语")
        self.textEdit.move(10, 25)
        self.textEdit.resize(300, 350)

        self.button = QPushButton('统计', self.window)
        self.button.move(380, 80)

        self.button.clicked.connect(self.handleCalc)


    def handleCalc(self):
        text = self.textEdit.toPlainText()
        # 处理程序

app = QApplication([])
mywindow = MyWindows()
mywindow .window.show()
app.exec_()
```

## 三、界面设计Qt Designer

### 3.1 Qt Designer的简单介绍

Qt Designer是一个QT界面生成器，避免了像Tkinter需要将想象的图形界面用代码一行一行写出来。Qt Designer是一种图形化界面设计工具，通过拖拽控件，就可以实现界面布局的设计。

在python安装目录下的`Lib\site-packages\qt5_applications\Qt\bin\designer.exe`，这个可执行文件就是Qt Designer程序。



![](https://img.mahaofei.com/img/202112232018944-pyqt5-1.png)



打开Qt Designer后，界面左侧是控件列表，右侧是对象查看器和属性编辑器。



![](https://img.mahaofei.com/img/202112232018814-pyqt5-2.png)



创建窗体后，可以直接将左侧的控件，如文本框、按钮等拖入到窗体中，手动调整其大小和位置。在右侧可以修改每个空间的属性。

创建好图形界面后，点击视图-预览可以查看界面效果，点击保存按钮，即可将图形界面保存为`.ui`的文件，需要修改界面时可以直接再打开`.ui`就可以修改界面。

### 3.2 布局

简单的控件拖拽布局就不介绍了，这里说一下布局方式。

常用的布局方式有

| 布局     | 样式                                                         |
| -------- | ------------------------------------------------------------ |
| 水平布局 | ![](https://img.mahaofei.com/img/202112232019148-pyqt5-3.png) |
| 垂直布局 | ![](https://img.mahaofei.com/img/202112232019433-pyqt5-4.png) |
| 表格布局 | ![](https://img.mahaofei.com/img/202112232020951-pyqt5-5.png) |
| 表单布局 | ![](https://img.mahaofei.com/img/202112232020207-pyqt5-6.png) |

比如点选几个控件，右键设置为水平布局。这样几个空间就组合成了一个大的整体的“控件”。

再将几个设置好的水平布局选中，右键设置为垂直布局，这样就算是非常快速地制作好了一个非常简单的UI。



![](https://img.mahaofei.com/img/202112232021341-pyqt5-7.png)




### 3.3 控件调整

**（1）控件大小**

主要使用的是`sizePolicy`这个属性。

水平策略和垂直策略：



![](https://img.mahaofei.com/img/202112232021554-pyqt5-8.png)



水平伸缩和垂直伸缩：描述多个部件在水平方向的大小比例，类似于权重。

> 如两个在同一水平位置的部件的水平伸缩因子分别为1和2，则二者宽带的大小比例为1:2，如果该水平方向再无其他控件，则二者各占布局管理器宽度的1/3和2/3。


**（2）控件间距**

上下间距：给控件添加`layout`属性，通过调整上下的padding和margin来调整间距。

左右间距：给控件添加`layout`调整左右的padding和margin来调整间距，或添加`horizontal spacer`属性调整。


## 四、Python程序

### 4.1 ui文件转换python程序
使用cmd将目录切换到`.ui`文件所在目录，使用如下命令生成代码。（请将命令中的name替换成文件名）

```bash
pyuic5 -o name.py name.ui
```


![](https://img.mahaofei.com/img/202112232021448-pyqt5-9.png)



### 4.2 主程序调用ui

这时如果尝试运行刚刚生成的python程序是没有用的，因为生成的文件没有程序入口。因此我们需要创建一个主程序用来调用ui程序。

```py
# 导入程序运行必须模块
import sys
# PyQt5中使用的基本控件都在PyQt5.QtWidgets模块中
from PyQt5.QtWidgets import QApplication, QMainWindow, QFileDialog
# 导入designer工具生成的模块
# 注意导入时filename替换成生成的.py文件名，Ui_file替换成.py文件的类名
from filename import Ui_filename


class MyMainForm(QMainWindow, Ui_excel_combine):
    def __init__(self, parent=None):
        super(MyMainForm, self).__init__(parent)
        self.setupUi(self)

if __name__ == "__main__":
    # 固定的，PyQt5程序都需要QApplication对象。sys.argv是命令行参数列表，确保程序可以双击运行
    app = QApplication(sys.argv)
    # 初始化
    myWin = MyMainForm()
    # 将窗口控件显示在屏幕上
    myWin.show()
    # 程序运行，sys.exit方法确保程序完整退出。
    sys.exit(app.exec_())
```

### 4.3 设置按钮、文本框的响应程序

在主程序的MyMainForm类中进行设置，以按钮和文本框为例

**（1）按钮按下处理程序**

例如下面的代码，当按钮被按下时，自动执行括号内的处理函数`button_clicked_handle`

```py
buttonname.clicked.connect(button_clicked_handle)
```

**（2）文本框显示处理程序**

```py
textBrowser.setPlainText('显示的字符串')
```

### 4.4 示例代码

我写的代码是合并多个excel数据的程序，其中的GUI部分代码如下：

```py
# 导入程序运行必须模块
import sys
import os
# PyQt5中使用的基本控件都在PyQt5.QtWidgets模块中
from PyQt5.QtWidgets import QApplication, QMainWindow, QFileDialog
from PyQt5.QtGui import QIcon
# 导入designer工具生成的模块
from excel_combine_ui import Ui_excel_combine

dir_choose = ""
filename = []

class MyMainForm(QMainWindow, Ui_excel_combine):
    def __init__(self, parent=None):
        super(MyMainForm, self).__init__(parent)
        self.setupUi(self)
        self.cwd = os.getcwd() # 获取当前程序文件位置
        self.sourceButton.clicked.connect(self.slot_source_button)
        self.targetButton.clicked.connect(self.slot_target_button)
        self.combineButton.clicked.connect(self.slot_combine_button)

    def slot_source_button(self):
        files, filetype = QFileDialog.getOpenFileNames(self, "选择多个采购申请表", self.cwd, "All Files (*);;PDF Files (*.pdf);;Text Files (*.txt)")
        global filename
        if len(files) == 0:
            print("取消选择\n")
            return
        filename_print = ""
        for file in files:
            filename.append(file)
            filename_print += file
            filename_print += '\n'
        self.textBrowser.setPlainText(filename_print)
        # print("文件筛选器类型：", filetype)

    def slot_target_button(self):
        global dir_choose
        dir_choose = QFileDialog.getExistingDirectory(self, "选择保存目录", self.cwd)
        if dir_choose == "":
            print("取消选择\n")
            return
        self.textBrowser_2.setPlainText(dir_choose)

    def slot_combine_button(self):
        wb_template = app.books.open('采购申请单模板.xls')  # 打开工作簿
        combine(wb_template, filename, dir_choose+'\采购申请表汇总.xls')


if __name__ == "__main__":
    # 固定的，PyQt5程序都需要QApplication对象。sys.argv是命令行参数列表，确保程序可以双击运行
    app1 = QApplication(sys.argv)
    app1.setWindowIcon(QIcon('logo.png'))
    # 初始化
    myWin = MyMainForm()
    # 将窗口控件显示在屏幕上
    myWin.show()
    # 程序运行，sys.exit方法确保程序完整退出。

    sys.exit(app1.exec_())
    # button.clicked.connect(handleCalc) 按钮按下

```



![](https://img.mahaofei.com/img/202112232022811-pyqt5-10.png)




> 更多控件的使用方法可以参考这位博主的文章：
> 链接：[https://blog.csdn.net/weixin_40841247/article/details/88781601](https://blog.csdn.net/weixin_40841247/article/details/88781601)


## 五、发布程序

### 5.1 安装pyinstaller

要将写好的python程序打包成exe可执行程序需要使用pyinstaller，使用pip命令安装pyInstaller：

```bash
pip install pyinstaller
```

### 5.2 打包exe

1. 打开cmd窗口，进入写好的python程序所在的目录

2. 使用如下的命令打包exe，例如我的主程序是`main.py`，我用到的包有`PyQt5`和`xlwings`，我的图标文件是`logo.ico`

```bash
pyinstaller main.py --noconsole --hidden-import "PyQt5.QtXml","xlwings" --icon="logo.ico"
```



![](https://img.mahaofei.com/img/202112232022909-pyqt5-11.png)




由于pyInstaller只能分析出需要哪些代码文件。 而程序动态打开的资源文件，比如图片、excel、ui这些，它是不会帮你打包的。

而我的程序需要从调用xls表格文件，手动拷贝到dist/main目录中。

然后，再双击运行 main.exe，即可成功。

### 5.3 改进：减少打包程序的大小

刚刚使用命令行直接打包，发现打包出来的程序非常大。原因是打包时系统会将很多原本用不到的依赖库一并打包起来。经过在网上查找方法，发现可以使用虚拟环境，原理是新建一个虚拟环境，然后在虚拟环境中安装程序的依赖库，然后在虚拟环境中完成打包。

**（1）使用pipenv创建虚拟环境**

创建python虚拟环境，需要系统已经安装好python虚拟环境。打开cmd。

1. 安装pipenv

```bash
pip install pipenv
```

2. 进入一个空目录，初始化虚拟python环境（注意python版本需要与系统安装的版本一致）

```bash
pipenv --python 3.9
```

3. 进入虚拟环境

```bash
pipenv shell
```

**（2）安装程序依赖**

在虚拟环境中，只安装python程序使用到的库，尽可能减少打包程序的大小

```bash
pip install pyinstaller
pip install pyqt5
pip install xlwings
```

**（3）虚拟环境中打包程序**

在虚拟环境中直接使用pyinstaller打包程序

```bash
pyinstaller main.py --noconsole --hidden-import "PyQt5.QtXml","xlwings" --icon="logo.ico"
```

这样打包完成后的程序就小了很多。