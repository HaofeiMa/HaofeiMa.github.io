---
title: 【树莓派搭建个人网站】环境配置
date: 2021-01-18 23:30:32
description: 树莓派搭建个人网站主要包括以下几个步骤：搭建LAMP服务器（即Linux+Apache+MySQL+PHP），创建数据库用户（这一步需要安装PhpMyAdmin，并使用SQL语句添加mariaDB数据库用户）。
categories:
- 嵌入式
- 树莓派
tags:
- 树莓派
- 网站搭建
---

## 搭建LAMP服务器
**即Linux+Apache+MySQL+PHP**

**1. 安装apache**
打开控制台，输入命令，确保软件安装是最新的。
```bash
sudo apt update
sudo apt upgrade
```
安装apache
```bash
sudo apt install apache2
```
安装完成后给apache文件赋予权限
```bash
sudo chown -R pi:www-data /var/www/html/
sudo chmod -R 770 /var/www/html/
```
在浏览器输入`127.0.0.1`可以看到apache的页面，说明apache已经顺利安装成功。
<img src="https://img-blog.csdnimg.cn/20210115160502183.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
**2. 安装Nginx**
```bash
sudo apt-get install nginx
```
**2. 安装php及部分插件**
在控制台输入以下命令安装php7.3（2021年1月为7.3版本，安装最新版即可）
```bash
sudo apt-get install php7.0
```
安装插件
```bash
sudo apt-get install php7.0-fpm
sudo apt-get install php7.0-mysql
sudo apt-get install php7.0-common
```
**3. 安装MySQL**
由于MySQL闭源了，我们安装mariadb.
```bash
sudo apt-get install mariadb-server
sudo apt-get install mariadb-client
```
**4. 配置Nginx**
在控制台输入以下命令
```bash
sudo nano /etc/nginx/sites-available/default
```
找到其中的location，将location修改为
```bash
location / {
index index.html index.htm index.php default.html default.htm default.php
}

location ~\.php${
}
```
**5. 重新启动服务**
```bash
sudo /etc/init.d/nginx restart
sudo /etc/init.d/php7.3-fpm restart
sudo service mysql restart
sudo service nginx restart
```
**6. 测试Nginx与PHP**
所有关于网站的东西都在var内，对其授权
```bash
sudo chmod -R 777 /var
sudo chmod -R 777 /var/www
sudo chmod -R 777 /var/www/html
```
在/var/www/html中新建index.php文件，并输入
```html
<html>
	<head>
		<title>PHP Test</title>
	</head>
	
	<body>
		<?php echo '<p>Hello World!</p>'; ?>
	</body>
</html>
```
然后删除/var/www/html文件夹内的index.html和index.nginx-debian.html两个文件
```bash
sudo rm -rf /var/www/html/index.html
sudo rm -rf /var/www/html/index.nginx-debian.html
```
完成后，打开浏览器，输入树莓派的ip地址，或者localhost，即可看到网页Helloworld，说明以上步骤顺利完成了。
<img src="https://img-blog.csdnimg.cn/20210115162214961.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="">
## 创建数据库用户
这一步需要安装PhpMyAdmin，并使用SQL语句添加mariaDB数据库用户。PHPMYADMIN是一个以PHP为基础，以Web-Base防止架构运行在网站主机上的MySQL的数据库管理工具，让管理者可以直接使用Web接口管理MySQL数据库。
**1.安装phpmyadmin**
使用以下命令进行安装
```bash
sudo apt-get install phpmyadmin
```
安装过程中会遇到一些选项，按下图设置即可
<img src="https://img-blog.csdnimg.cn/2021011516274890.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210115162818344.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
这里的密码要记住，一会登录phpmyadmin时要用到。
<img src="https://img-blog.csdnimg.cn/202101151628373.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="50%">
**2. 设置PHPMYADMIN软连接**
```bash
sudo ln -s /usr/share/phpmyadmin /var/www/html
```
**3. 登录phpmyadmin**
在浏览器输入`localhost/phpmyadmin`进入登陆界面，初始用户名为`phpmyadmin`初始密码为之前安装过程中设置的密码。
<img src="https://img-blog.csdnimg.cn/2021011516334035.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
**4. 使用SQL语句添加mariaDB数据库用户**
输入以下命令进入mariadb环境，这里没有密码，直接回车或者随便输入即可进入
```bash
sudo mysql -u root -p
```
在mariadb中添加用户并赋予权限
（1）添加用户：
```bash
CREATE USER '名字'@'localhost' IDENTIFIED BY '密码';
```
（2）赋予用户权限：
```bash
grant all privileges on *.* to 名字@localhost;
```
（3）刷新权限：
```bash
flush privileges;
```
（4）退出：
```bash
exit;
```
再次打开浏览器进入phpmyadmin中（`localhost/phpmyadmin`），使用刚刚创建的用户登录。
<img src="https://img-blog.csdnimg.cn/20210115164056922.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210115164108861.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70" width="60%">
可以看到我们有了很高的权限（甚至可以删库[doge]）
到此为止就基本完成了网站环境的搭建，之后就是使用wordpress等工具搭建个人网站了。