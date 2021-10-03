---
title: ubuntu使用VNC实现远程桌面
date: 2021-02-18 15:55:24
description: 我想通过VNC实现远程桌面连接树莓派。但是在网上搜索了许多相关博客，尝试了各种方法，但总是出现各种问题，终于功夫不负有心人，我最终找到了一种实现的方法。
categories:
- 机器人
- ROS
tags:
- ubuntu
---

### 前言
我是在树莓派4B上安装的Ubuntu20.10，想通过VNC实现远程桌面连接，进行接下来的试验。
但是在网上搜索了许多关于VNC连接的博客，也尝试了各种方法，但总是出现各种问题，要么连接不上，要么连接上了就黑屏灰屏，总之出现了各种问题，重装了n次系统，最终找到了一种实现的方法。
**注：已经试验过Ubunt18.04、Ubuntu20.04与Ubuntu20.10，均正常实现**
### Windows端
安装VNC Viewer，进入其[VNC Viewer官网](https://www.realvnc.com/en/connect/download/viewer/)下载安装。
![](https://img-blog.csdnimg.cn/20210218155650612.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### Ubuntu端
**进行VNC设置之前，需要有图形界面，没有的可以执行以下代码安装图形界面**

```bash
sudo apt install ubuntu-desktop
apt-get install gnome-panel gnome-settings-daemon metacity nautilus gnome-terminal
sudo reboot #重启即可看到图形界面
```
#### 1. 安装x11vnc程序
```bash
sudo apt-get install x11vnc
```
#### 2. 安装lightdm
因为使用的是gnome图形界面，为了保证x11vnc与图形界面的兼容性，这里需要安装lightdm
```bash
sudo apt-get install lightdm
```
安装过程中会跳出一个界面，**选择lightdm**即可
![](https://img-blog.csdnimg.cn/20210218145450888.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

#### 3. 创建配置目录
```bash
sudo mkdir -pv /home/【USERNAME】/.vnc
```
其中的**【USERNAME】**替换成你的用户名
#### 4. 生成当前用户的VNC连接密码
```bash
sudo x11vnc -storepasswd 【Password】 /home/【USERNAME】/.vnc/passwd
```
其中的**【Password】**处设置连接VNC时的密码，**【USERNAME】**替换成你的用户名
![](https://img-blog.csdnimg.cn/20210219200621716.png)

#### 5. 生成VNC配置文件
```bash
cat>x11vnc.service<<EOF
[Unit] 
Description=Start x11vnc at startup. 
After=multi-user.target 
 
[Service] 
Type=simple 
ExecStart=/usr/bin/x11vnc -auth guess -forever -loop -noxdamage -repeat -rfbauth /home/【USERNAME】/.vnc/passwd -rfbport 5900 -shared 
 
[Install] 
WantedBy=multi-user.target
EOF
```
配置文件生成后将其移动到`/lib/systemd/sydtem/`目录下
```bash
sudo mv x11vnc.service /lib/systemd/system/x11vnc.service
```
修改权限为root
```bash
sudo chown root:root /lib/systemd/system/x11vnc.service
```
#### 6. 重新加载服务配置文件
```bash
sudo systemctl daemon-reload
```
执行以下命令可以查看服务开启情况
```bash
sudo systemctl list-unit-files | grep x11vnc
```
![](https://img-blog.csdnimg.cn/20210219125503373.png)
#### 7. 开机启动VNC服务
```bash
sudo systemctl enable x11vnc.service
```
#### 8. 重启系统
因为之前安装了lightdm图形管理程序，所以需要重启一下系统
```bash
sudo reboot
```
#### 9. 查看一下监听端口
```bash
sudo ss -tunlp
```
可以看到x11vnc的监听端口已经打开了
![](https://img-blog.csdnimg.cn/20210218154948830.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 远程连接

打开windows端的VNC Viewer，输入IP地址:5900即`192.168.6.6:5900`进行远程连接，密码是之前设置的密码。
![](https://img-blog.csdnimg.cn/20210218155229939.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

![](https://img-blog.csdnimg.cn/20210218154903345.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)