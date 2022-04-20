---
title: 博途TIA Portal V15 下载与安装教程
date: '2022-02-04 15:58'
description: 西门子PLC自动化设计软件博途V15的安装教程。
categories:
  - 嵌入式
  - 单片机
tags:
  - 软件安装
  - PLC
updated: '2022-02-04 15:58'
cover: 'https://img.mahaofei.com/img/202203261048505.png'
abbrlink: bb559113
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



> 下载链接：
>
> 阿里云盘：https://www.aliyundrive.com/s/G5V98sQFqVq
>
> 
>
> 百度网盘： https://pan.baidu.com/s/1X3hMP5n2DlMXB_wiGztarg?pwd=dpzk
>
> 提取码: dpzk

## 准备工作
在安装西门子软件的时候，经常提示要重启，而且重启之后依然提示重启，让人莫名烦恼， 按照以下步骤删除注册表则不会再提示重启。
<font color="red">注意：删除注册表后不要重启，直接继续安装，（删除此文件对电脑没有任何影响）</font>

1. 在windows系统下，按下组合键：WIN+R，输入“regedit”，打开注册表编辑器
    ![](https://img.mahaofei.com/img/202203261044325.png)找到 HEEY_LOCAL_MACHINE\SYSTEM\CURRENTCONTROLSET\CONTROL\SESSION MANAGE\ 下的 PendingFileRemameOpeaations 键，直接删除该键值。不需要重新启动，继续你的软件安装即可。
    ![](https://img.mahaofei.com/img/202203261044343.png)

> 安装前注意：
> * V15 支持WIN11 WIN10  WIN8  WIN7, 但必须都是64位系统
> * 文件下载完成，安装出现安装过程中出错，则重新安装或修复，如果再次安装仍出现此问题则只能重新安装系统后再装软件，之所以出现这种问题，因为博途软件较庞大，所用到的数据库文件非常复查，系统内含有其他第三方软件可能导致博途安装无法正常成功，所以尽量保持系统的纯净再安装，切记，万不能开始各种杀毒软件，尤其360，否在无法保证是否能成功，或者安装完成能否正常使用。

## <font color="red">安装前一定要关闭杀毒软件</font>

## 开始安装软件
### ① 安装STEP7 Professional
1. 将安装包解压，进入**01-STEP7+Wincc Profesional V15**文件夹，运行**TIA_Portal_STEP_7_Pro_WINCC_Pro_V15.exe**，首先安装SETP7 Professional（PLC编程软件+WINCC触摸屏和上位机组态软件）
![](https://img.mahaofei.com/img/202203261045172.png)
2. 选择要安装的位置（尽量避免解压在C盘），然后点击下一步等待解压，解压过程5分钟左右
![](https://img.mahaofei.com/img/202203261045963.png)
3. 开始正式安装，**直接点击下一步**
![](https://img.mahaofei.com/img/202203261045632.png)
4. 语言选择默认勾选中文，**直接下一步**
![](https://img.mahaofei.com/img/202203261045370.png)
5. 默认典型安装即可，**浏览选择安装路径**，然后**点击下一步**
![](https://img.mahaofei.com/img/202203261045522.png)
6. **勾选接受两个条款协议**，然后**点击下一步**
![](https://img.mahaofei.com/img/202203261045996.png)
7. **勾选接受**安全和权限设置，然后**点击下一步**
![](https://img.mahaofei.com/img/202203261045675.png)
8. 确认安装路径没问题后，**点击安装按钮**，开始进行安装，安装过程约40分钟
![](https://img.mahaofei.com/img/202203261045605.png)
9. **选择立即重启**，完成安装（这里需要重启电脑，否则无法进行后续安装）


 ### ② 安装STEP7_Simulation

 1. 进入**02-PLCSIM_V15**文件夹，双击运行**SIMATIC_S7PLCSIM_V15.exe**，开始安装STEP7_simulation（PLC的仿真软件）
![](https://img.mahaofei.com/img/202203261046807.png)
2. 开始安装，直接**点击下一步**
![](https://img.mahaofei.com/img/202203261046519.png)
 3. 安装语言默认选择中文，**直接下一步**
![](https://img.mahaofei.com/img/202203261046465.png)
4. **选择安装文件解压路径（不要和上一个程序选择同一路径，否则会出现文件覆盖问题）**，然后**点击下一步**，等待解压，此过程约3分钟
![](https://img.mahaofei.com/img/202203261046214.png)
5. 进入安装程序，点击下一步开始安装
![](https://img.mahaofei.com/img/202203261046805.png)
6. 默认选择中文，**点击下一步**继续
![](https://img.mahaofei.com/img/202203261046058.png)
7. 浏览**选择安装路径**，然后**点击下一步**
![](https://img.mahaofei.com/img/202203261046718.png)
8. **接受条款协议**，然后**点击下一步**
![](https://img.mahaofei.com/img/202203261047339.png)
9. 接受计算机安全和权限设置，点击下一步
![](https://img.mahaofei.com/img/202203261047195.png)
10. **检查安装路径**没问题，**点击安装按钮**开始安装软件12
![](https://img.mahaofei.com/img/202203261047722.png)
11. 选择稍后重启，完成安装
![image-20220326104732524](C:\Users\82785\AppData\Roaming\Typora\typora-user-images\image-20220326104732524.png)
### ③ 安装驱动（如果只仿真，不需要连接PLC可跳过安装）
1. 进入**Startdrive**文件夹中，双击运行**Startdrive_V15.exe**，按步骤进行安装
![](https://img.mahaofei.com/img/202203261047076.png)
### ④ 授权
1. 在授权文件夹下找到**Sim_EKB_Install_2018_11_14.exe**文件，右键**以管理员身份运行**
![](https://img.mahaofei.com/img/202203261047455.png)
2. 授权Step7 Professional
![](https://img.mahaofei.com/img/202203261047872.png)
3. 授权WinCC，找到TIA Portal  --TIA Portal V15 –WINCC Prof v15，按图找到几个选项后点击安装长密钥
![](https://img.mahaofei.com/img/202203261047560.png)
4. 然后关闭程序，重启计算机

> 如果重启后打开软件授权不成功，则在C盘找到AX NF  ZZ文件夹删除（如果找不到，请打开显示隐藏文件夹）
> ![](https://img.mahaofei.com/img/202203261048361.png)
> 如果以上步骤操作完毕仍然无法授权，则需要重装Windows纯净系统，不要再安装任何其他软件和杀毒管家等，直接安装博途

 在桌面找到TIA Portal V15软件，双击运行，可正常启动
 ![](https://img.mahaofei.com/img/202203261048756.png)
![](https://img.mahaofei.com/img/202203261048505.png)
