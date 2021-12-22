---
title: 树莓派系统的安装、初步配置与远程访问
date: 2021-01-17 23:13:15
description: 树莓派的安装和配置以及远程访问主要包括以下几个步骤：准备TF卡，下载和写入镜像，IP地址的确定和访问，数据源的更新和配置，windowns远程访问的实现。至此，初步完成了系统的安装，即可进入图形界面。
categories:
- 嵌入式
- 树莓派
tags:
- 树莓派
- 软件安装
---

##### 一、准备TF卡
1. 将TF卡通过读卡器连接到电脑上。
2. 如果原来使用过的话，用Diskgenius将TF卡内所有分区都删除，新建一个分区为FAT32格式，然后格式化当前分区。
##### 二、镜像的下载和写入
1. 进入RaspberryPi官网下载最新的[系统镜像](https://www.raspberrypi.org/software/operating-systems/#raspberry-pi-os-32-bit)。这里有三种版本，轻量版、标准版和完全版，大家可以根据需要下载，一般标准版就可以了。
<img src="https://img-blog.csdnimg.cn/20210103161604252.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
如果大家觉得下载太慢，也可以使用一些方法从百度网盘下载，链接放在下面了。
链接：https://pan.baidu.com/s/1FhSZkqXggTO-spSZxLwLcQ 
提取码：qhcm 
2. 使用Win32Diskimager安装镜像。镜像安装完成后可能会弹出格式化的对话框，一定不要格式化，否则相当于前功尽弃。
（ps：使用过程中可能会报错，因为可能打开了TF卡的某个文件夹，不用理会直接确认即可。）
<img src="https://img-blog.csdnimg.cn/20210103161526535.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="40%">
3. 打开SSH服务：在制作好的boot分区内，新建一个文件名为ssh，无任何后缀的文件。（可以在文件资源管理器上方点击查看选项卡，选择显示扩展名）
<img src="https://img-blog.csdnimg.cn/20210103162427618.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
##### 三、IP地址的确定和访问
以下操作需要【屏幕+外接键盘】或者【一根网线】，二者选一个即可。使用前者的在需要的时候将屏幕和键盘连接至树莓派即可，使用后者的需要将路由器或者电脑通过网线连接至树莓派。
**使用网线的：**
1. 将之前制作好的TF卡插入树莓派中，为树莓派连接电源（电源可以是2.5mm圆头电源线，也可以是microUSB或者TypeC接口的线，但要求充电头能够达到5V 3A，最低5V 2.5A）
2. 开机，等待一段时间后进入系统，如果有显示器可以看到进入系统的界面，没有显示器的直接进行下一步即可。
3. 使用Advanced scanner搜索此局域网内的树莓派的IP地址。
<img src="https://img-blog.csdnimg.cn/20210103163155625.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
4. 使用PuTTy软件，默认SSH连接方式，输入IP地址，进入系统后如果出现login，则说明连接成功，用户名为pi，密码为raspberry，则可以成功进入系统。如果PuTTy连接超时，则说明IP地址有问题或者树莓派没有连接到网络。
<img src="https://img-blog.csdnimg.cn/20210103163546527.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
5. 设置wifi
	(1)命令行执行
	```bash
	sudo nano /etc/wpa_supplicant/wpa_supplicant.conf
	```
 	(2)内容改为
	```bash
	country=CN
	ctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev
	update_config=1
	network={
	ssid="这里写wifi名称"
	psk="这里写密码"
	key_mgmt=WPA-PSK
	priority=1
	}
	```
	<img src="https://img-blog.csdnimg.cn/20210103164816336.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">

	其中priority是连接优先级，数字越大，优先级越高。
	(3)保存后reboot重启，没有问题的话就可以连接上WiFi了，如果出现no wireless interfaces found，那么一定要检查上面这个文件/etc/wpa_supplicant/wpa_supplicant.conf的内容，key_mgmt和priority两行是可以不写的，所有拼写都不能错。（本人就曾因为把ssid打成ssod导致连接不上wifi排查了好久）
6. 查看IP地址，使用Advanced scanner搜索，或者用更简单的方法，在命令行里输入`raspberrypi.local`即可查看树莓派的地址，再使用PuTTy访问即可。
**使用外接屏幕键盘数表的**（这些设备只使用一次就够了）
1. 将之前制作好的TF卡插入树莓派中，为树莓派连接电源（电源可以是2.5mm圆头电源线，也可以是microUSB或者TypeC接口的线，但要求充电头能够达到5V 3A，最低5V 2.5A）
2. 开机，等待一段时间后进入系统，如果有显示器可以看到进入系统的界面，按照提示进行初始化设置，提示需要大量更新的时候跳过即可，后续换源后再手动更新。

##### 四、数据源的更新和配置
如果使用默认的源，下载速度可能会很慢，因此推荐换成国内的源，这里以清华源为例。
```bash
打开sources.list文件
sudo nano /etc/apt/sources.list

注释里面的所有内容，输入以下地址
deb http://mirrors.tuna.tsinghua.edu.cn/raspbian/raspbian/ buster main contrib non-free rpi
deb-src http://mirrors.tuna.tsinghua.edu.cn/raspbian/raspbian/ buster main contrib non-free rpi
（ctrl+o回车保存，ctrl+x退出编辑器）

打开raspi.list文件
sudo nano /etc/apt/sources.list.d/raspi.list

注释里面的所有内容，输入以下地址
deb http://mirror.tuna.tsinghua.edu.cn/raspberrypi/ buster main ui
deb-src http://mirror.tuna.tsinghua.edu.cn/raspberrypi/ buster main ui

更新源
sudo apt-get update
sudo apt-get upgrade
```
##### 五、windowns远程访问的实现
1. 在PuTTy命令行窗口输入`sudo raspi-config`，选中进入Interfacing Options，选中VNC选项，回车，选择Enable，即可打开VNC。
2. 下载安装[VNC软件](https://www.realvnc.com/en/connect/download/viewer/windows/)
<img src="https://img-blog.csdnimg.cn/20210103165919163.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
注意：如果出现cannot currently show the desktop，则需要在刚才的位置修改分辨率，在PuTTy中输入`sudo raspi-config`，选中进入Advanced Options-Resolutions，选择除了第一个default的任意一个，保存重启后，再打开VNC即可。
3. 即可进入图形界面。
至此，初步完成了系统的安装。

	