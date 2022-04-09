---
title: 【树莓派搭建个人网站】WordPress安装
description: >-
  在wordpress官网下载安装包，解压后把worpress文件夹内容放在html文件夹内。浏览器输入localhost/phpmyadmin进入phpmyadmin，输入自己的phpmyadmin用户名和密码，点击数据库栏，新建数据库，输入一个数据库的名字，点击创建即可，暂时不需要数据表。
categories:
  - 嵌入式
  - 树莓派
tags:
  - 树莓派
  - 网站搭建
  - WordPress
abbrlink: ed65ee52
date: 2021-01-19 15:45:13
---

## 一、下载wordpress
在[wordpress官网](https://cn.wordpress.org/download/)下载安装包，解压后把worpress文件夹内容放在html文件夹内。
```bash
sudo wget https://cn.wordpress.org/latest-zh_CN.tar.gz
tar -xzvf latest-zh_CN.tar.gz
mv wordpress/* /var/www/html/
```
![](https://img.mahaofei.com/img/202112231118531-raspberrypi-site2-1.png)

## 二、在phpmyadmin内新建一个数据库
1. 浏览器输入localhost/phpmyadmin进入phpmyadmin，输入自己的phpmyadmin用户名和密码
2. 点击数据库栏，新建数据库，输入一个数据库的名字，点击创建即可，暂时不需要数据表
![](https://img.mahaofei.com/img/202112231119643-raspberrypi-site2-2.png)
3. 在地址栏输入localhost，即可进入wordpress，按下图进行wordpress的配置
(我是在wordpress官网下载的安装包，没有下载中文官网的，所以显示英文，不过内容一样，按网页提示填写网站的信息即可)。
![](https://img.mahaofei.com/img/202112231119494-raspberrypi-site2-3.png)
![](https://img.mahaofei.com/img/202112231119388-raspberrypi-site2-4.png)
4. 设置完成后，接下来就可以用刚刚设置的用户名和密码进行wordpress的登陆了
![](https://img.mahaofei.com/img/202112231119135-raspberrypi-site2-5.png)
![](https://img.mahaofei.com/img/202112231120445-raspberrypi-site2-6.png)
* ps.如果要从英文修改成中文，就在如果需要修改中文就在[https://cn.wordpress.org/download/](https://cn.wordpress.org/download/)下载中文官网的安装包，解压后将`wordpress/wp_content`内的language文件夹复制到`/var/www/html/wpcontent`内即可

## 三、wordpress修改网站主题
点击左上角的网站title即可查看当前网站
![](https://img.mahaofei.com/img/202112231120192-raspberrypi-site2-7.png)
如果想更改主题，可以点击左侧W标志，进入外观-主题菜单栏，选择主题安装。
**主机名填写树莓派的ip地址，用户名为pi，密码为raspberry**，若出现下列要求FTP的对话框
![](https://img.mahaofei.com/img/202112231120759-raspberrypi-site2-8.png)
则在命令栏输入
```bash
sudo apt-get install vsftpd
sudo passwd root	#自己设置一个root账户密码
sudo passwd --unlock root
su	#这里会提示输入刚才设置的密码
vi /etc/vsftpd.conf
#去掉write_enable=YES前面的#
service vsftpd restart
```
此时再重新安装主题即可成功安装。