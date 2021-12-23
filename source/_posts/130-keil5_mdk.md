---
title: Keil5 MDK版 下载与安装教程（STM32单片机编程软件）
date: 2021-10-17 00:00:00
description: 本教程介绍Keil5 MDK版的下载安装方法，Keil5是一款非常友好和强大的C语言软件开发系统。Keil5提供了清晰直观的操作界面,而且使用起来十分的轻松便捷,并具备编译器、编译器、安装包和调试跟踪功能。
categories:
- 嵌入式
- 单片机
tags:
- 软件安装
---

> 阿里云盘
> 链接：[https://www.aliyundrive.com/s/42a1npEEsrw](https://www.aliyundrive.com/s/42a1npEEsrw)
> 下载完成后将文件后缀名改回【.7z】即可正常解压。

1. 解压安装包，**以管理员身份运行**【MDK528.exe】

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232006461-keilmdk-1.png)

  

2. 按步骤一直安装就可以，每一步我都在下面截了图，可以对照一下。

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232007055-keilmdk-2.png)

  

3. 选择我同意用户协议，然后next

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232007859-keilmdk-3.png)

  

4. 选择安装位置，一定要和Keil C51版本安装在**不同的文件夹**中

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232007389-keilmdk-4.png)

  

5. 信息随便填

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232010807-keilmdk-5.png)

  

6. 等待安装，大约耗时1分钟左右

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232010318-keilmdk-6.png)

  

7. 如果安装过程中弹出需要安装某驱动，一定要安装

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232011061-keilmdk-7.png)

  

8. 不需要展示新特性，直接下一步点击finish完成即可。

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232011656-keilmdk-8.png)

  

9. 出现下面这个包安装界面，直接关闭即可，后续我们手动安装包，要快得多

  ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232012974-keilmdk-9.png)

  

> 如果之前安装过Keil51版本，想要两个版本共存，需要加入以下步骤。如果仅安装Keil MDK版，可跳过此部分。
> 1. 打开C51安装路径，找到 TOOLS.INI  这个文件
>
> 2. 以记事本打开【TOOLS.INI】这个文件，复制 [C51]（包括）以下的全部内容
>
> 3. 粘贴至MDK-ARM安装目录下的  TOOLS.INI 文件末尾，保存，关闭。
>
>   ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232012255-keilmdk-10.png)
 10. 在桌面找到【Keil 5】的快捷方式，右键以管理员身份运行。然后打开【File -> License Management】选项卡。

     ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232012315-keilmdk-11.png)

     

11. 复制右上角的CID

    ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232013981-keilmdk-12.png)

    

12. 打开解压的安装包，找到【keygen.exe】，右键以管理员身份运行

    ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232013788-keilmdk-13.png)

    

13. **粘贴CID**到对应的输入框中，**target选择ARM**，然后点击**Generate生成激活码**。

    ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232014581-keilmdk-14.png)

    

14. 复制生成的激活码，回到Keil中的【License Management】对话框，在下方LIC中粘贴激活码，然后点击Add LIC激活成功。（激活的日期过了也不影响使用）

    ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232014618-keilmdk-15.png)

    

15. 安装剩下的两个库文件，直接双击就可以安装。（两个库文件分别对应STM32F1和F4的芯片）

    ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232014820-keilmdk-16.png)

    

16. 至此安装完成，可以正常使用。

    ![](https://gitee.com/huffiema/pictures/raw/master/image/202112232015660-keilmdk-17.png)
