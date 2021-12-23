---
title: 树莓派4B安装Ubuntu20.04
date: 2021-02-17 00:01:51
description: 进入Ubuntu官网下载支持树莓派的Ubuntu版本安装包。使用DiskGenius格式化SD卡，将所有扇区删除，然后格式化。下载官方烧录工具，镜像选择刚才下载的.xz文件，SD卡选择自己的卡，写入即可。然后进行ubuntu环境配置……
categories:
- 机器人
- ROS
tags:
- 树莓派
- ubuntu
---






## 一、树莓派的准备
1. 进入[Ubuntu官网](http://cdimage.ubuntu.com/ubuntu/releases/20.04/release/)下载支持树莓派的Ubuntu版本安装包。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231639061-raspberrypi-ubuntu20-1.png)
2. 使用DiskGenius格式化SD卡，将所有扇区删除，然后格式化。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231639964-raspberrypi-ubuntu20-2.png)
3. [下载官方烧录工具](https://downloads.raspberrypi.org/imager/imager.exe)，镜像选择刚才下载的.xz文件，SD卡选择自己的卡，写入即可。
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231639079-raspberrypi-ubuntu20-3.png)
## 二、Ubuntu系统配置
### 2.1 进入Ubuntu系统
将TF卡插到树莓派上。可以通过显示器进行系统初始化配置，也可以用网线将树莓派和电脑连接起来，再进行远程配置。建议使用一个外接显示器，操作会简单许多。**以使用外接屏幕+键盘为例**（这些设备只使用一次就够了）
1. 将之前制作好的SD卡插入树莓派中，为树莓派连接电源（电源可以是2.5mm圆头电源线，也可以是microUSB或者TypeC接口的线，但要求充电头能够达到5V 3A，最低5V 2.5A）
2. 开机，等待一段时间后进入系统，首先需要登录，**初始用户名和密码都是ubuntu**，登陆后会要求重新设置密码。

### 2.2 wifi设置

```bash
cd /etc/netplan
```
在该目录下，如果是服务器，则会有一个50-cloud-init.yaml的文件，如果是桌面环境，会有一个01-network-manager-all.yaml
这里以50-cloud-init.yaml为例，编辑文件:
注意文件的缩进格式，
```bash
network:
  version: 2
  wifis:
    wlan0:
      dhcp4: true
      optional: true
      access-points:
        "你的wifi名称":
          password: "wifi密码"
```
然后执行命令使配置生效
```bash
sudo netplan generate
sudo netplan apply
```
输入命令`ifconfig`即可查看ip地址，使用远程访问工具进行访问。
### 2.3 更新源
```bash
sudo vim /etc/apt/sources.list
```
source.list内容
```bash
deb https://mirrors.ustc.edu.cn/ubuntu-ports/ focal main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu-ports/ focal main main restricted universe multiverse
deb https://mirrors.ustc.edu.cn/ubuntu-ports/ focal-updates main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu-ports/ focal-updates main restricted universe multiverse
deb https://mirrors.ustc.edu.cn/ubuntu-ports/ focal-backports main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu-ports/ focal-backports main restricted universe multiverse
deb https://mirrors.ustc.edu.cn/ubuntu-ports/ focal-security main restricted universe multiverse
deb-src https://mirrors.ustc.edu.cn/ubuntu-ports/ focal-security main restricted universe multiverse
# deb https://mirrors.ustc.edu.cn/ubuntu-ports/ focal-proposed main restricted universe multiverse
# deb-src https://mirrors.ustc.edu.cn/ubuntu-ports/ focal-proposed main restricted universe multiverse
```
进行更新
```bash
sudo apt-get update
sudo apt-get upgrade
```
### 2.4 安装桌面环境
```bash
sudo apt install ubuntu-desktop
sudo apt install xrdp
```
### 2.5 安装中文环境
```bash
sudo apt install language-pack-zh-hans language-pack-zh-hans-base language-pack-gnome-zh-hans language-pack-gnome-zh-hans-base
sudo apt install `check-language-support -l zh`
sudo reboot
```
### 2.7 允许root登录
```bash
sudo passwd root #设置root密码
sudo vim /usr/share/lightdm/lightdm.conf.d/50-ubuntu.conf #编辑此文件
```
添加下列两行到50-ubuntu.conf
```bash
greeter-show-manual-login=true
allow-guest=false
```
### 2.8 远程桌面连接
在windows搜索框输入`远程桌面连接`，选择Xorg模式，输入用户名密码即可连接。