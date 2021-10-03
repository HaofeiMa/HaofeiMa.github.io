---
title: RobotStudio6.08 下载与安装教程
date: 1946-02-14 00:04:00
description: ABB RobotStudio 6.08，工业机器人编程仿真软件，中文版下载与安装教程。资源仅供学习参考！
tags:
- <font color="white"> WOW </font>
---

>阿里云盘链接：
>[https://www.aliyundrive.com/s/XUYg6iJPH2M](https://www.aliyundrive.com/s/XUYg6iJPH2M)
>下载后将文件的后缀名改回【.rar】即可正常解压。

1. 打开压缩包，找到【**setup.exe**】双击运行。
  ![](https://img-blog.csdnimg.cn/1b93e773a75e4e8d8a5167c8e0dfa7fd.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

2. 默认中文简体，**确定**

   ![](https://img-blog.csdnimg.cn/1bfcabda1bc44071ad28a4a20f1503b3.png)

3. **点击下一步**，开始进行安装
  ![](https://img-blog.csdnimg.cn/ad3ffd46a40d404e88bf5c3ded9748e5.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

4. **我接受**，然后点击**下一步**
  ![](https://img-blog.csdnimg.cn/118f7570d8f745fe936ec7dae3be7c84.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

5. **点击接受**，继续进行
  ![](https://img-blog.csdnimg.cn/95edeba15ba54683a28c4596578d1646.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

6. 点击上方的**更改**按钮，选择一个安装位置，然后点击**下一步**

   ![](https://img-blog.csdnimg.cn/bf9e59b8ea9044aa8891e561f673c38f.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

7. 建议按照默认，**完整安装**，点击**下一步**
  ![](https://img-blog.csdnimg.cn/1149e35c77e44109a632be89e8b20d12.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

8. 点击**安装**，开始安装RobotStudio程序主体，安装过程大概15分钟左右。
  ![](https://img-blog.csdnimg.cn/c141787cab374c0c850223ee3ecd0519.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

9. 安装期间可能会弹出如下选项，一定要选择**下载并安装此功能**，否则安装后软件将无法正常启动
  ![](https://img-blog.csdnimg.cn/4e0c8080cbdd45728fa281acc0f68c7c.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

10. 安装完成，点击**完成**，退出安装程序
    ![](https://img-blog.csdnimg.cn/a5e104f4e4d547b18e253821e8c17570.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

11. **不需要**重启电脑，点击**否**
    ![](https://img-blog.csdnimg.cn/ade41c7307c24baf888134a3bafd0db5.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_18,color_FFFFFF,t_70,g_se,x_16)

12. 此时打开RobotStudio，会发现按下快捷键【win+R】，输入【regedit】进入注册表编辑器。
    ![](https://img-blog.csdnimg.cn/a64cead00dbc4b5cb33deb6a22cd6fbb.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

13. 找到如下位置：
    32位电脑：HKEY_LOCAL_MACHINE——SOFTWARE——Microsoft——SLP Services
    64位电脑：HKEY_LOCAL_MACHINE——SOFTWARE——Wow6432Node——Microsoft——SLP Services
    ![](https://img-blog.csdnimg.cn/1a8ade5efcf84d9fbda6b4252ffb712a.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

14. 选择表中倒数第6行中，从左至右第6个数改成【**F4**】，点击**确认**，再重新打开Robotstudio软件，可以看到RobotStudio已激活。
    ![](https://img-blog.csdnimg.cn/6fcbfa00014f42d6b7ca45012b2f0709.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

![](https://img-blog.csdnimg.cn/e4a196d5a7c54ddca823e2916fb6abf3.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)
![在这里插入图片描述](https://img-blog.csdnimg.cn/2e52d92e4f0c4c9a80813e21afa0514e.png)
![](https://img-blog.csdnimg.cn/877b5838abb5430a98fbb7679ededce2.png?x-oss-process=image/watermark,type_ZHJvaWRzYW5zZmFsbGJhY2s,shadow_50,text_Q1NETiBASGFsZl9B,size_20,color_FFFFFF,t_70,g_se,x_16)

