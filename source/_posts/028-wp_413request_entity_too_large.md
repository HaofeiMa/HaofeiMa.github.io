---
title: wordpress上传文件报错的解决方法（413 Request Entity Too Large、超过upload_max_filesize文件中定义的php.ini值）
date: 2021-01-21 22:59:06
description: 413 Request Entity Too Large问题nginx是限制上传大小，解决方法如下:1. 打开nginx配置文件 nginx.conf, 路径一般是：/etc/nginx/nginx.conf。2. 在http{}段中加入 client_max_body_size 64m; 64m为允许最大上传的大小。3. 保存后重启nginx，service nginx restart
categories:
- 程序设计
- 网站
tags:
- wordpress
- bug解决
---

# 报错：413 Request Entity Too Large
问题nginx是限制上传大小，解决方法如下:

1. 打开nginx配置文件 nginx.conf, 路径一般是：/etc/nginx/nginx.conf。

2. 在http{}段中加入 client_max_body_size 64m; 64m为允许最大上传的大小。

3. 保存后重启nginx，service nginx restart

# 报错：上传的文件尺寸超过upload_max_filesize文件中定义的php.ini值
解决方法：修改/etc/php/7.3/apache2/php.ini文件中的
```bash
post_max_size = 64M
upload_max_filesize = 64M
```
（这两条都在比较靠后的位置，不太好找）
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231121053-wp-bugfix-1.png)