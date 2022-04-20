---
title: ROS安装时rosdep_init与rosdep_update问题解决方法（2022.04.08亲测）
description: >-
  ROS安装过程可见我的上一篇博客Ubuntu20.04安装ROS_Noetic。安装过程中rosdep_init出现【ERROR_cannot
  download_default_sources_list_from…Website_may_be
  down.】。rosdep_update，总是出现超时问题无法更新。最终找到了一种靠谱可用的方法。
categories:
  - 机器人
  - ROS
tags:
  - bugs
  - ROS
cover: 'https://img.mahaofei.com/img/20220408213126.png'
abbrlink: 88ab93d0
date: 2021-02-20 08:15:16
updated: 2022-04-08 15:24:17
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

**2022.4.8更新：**
运行下面的指令即可
```shell
sudo apt-get install python3-pip
sudo pip3 install rosdepc
sudo rosdepc init
rosdepc update
```

![](https://img.mahaofei.com/img/20220408213139.png)


![](https://img.mahaofei.com/img/20220408213126.png)



---

==以下都是过时方法：==

**2021.9.19更新：**

最稳妥的解决方法还是找一个机场、节点，然后下载electron或者clash等“加速”软件。
如果终端还是报错，却发现浏览器可以访问相应的资源网址，说明终端没有配置好代理，在终端窗口输入：
```bash
export http_proxy="http://127.0.0.1:12333"
export http_proxy="https://127.0.0.1:12333"
```
再次`rosdep update`就可以了。


**原文：**

ROS安装过程可见我的上一篇博客[Ubuntu20.04安装ROS Noetic](https://blog.csdn.net/weixin_44543463/article/details/113862391)

安装过程中**rosdep init**出现【**ERROR: cannot download default sources list from:…Website may be down.**】
**rosdep update**，总是出现**超时**问题无法更新。
最终找到了一种靠谱可用的方法。

这两个问题都是网络连接相关的问题，**解决方法相同，都是修改host主机**。

只是修改完成后rosdep init可以直接成功。而rosdep update还需要可靠的网络才行，如果update仍然失败，建议多试几次，或者试着更换手机热点网络
##### 1. 打开ip查询网址
> [https://site.ip138.com](https://site.ip138.com
> )
##### 2. 输入raw.githubusercontent.com查询ip
```bash
raw.githubusercontent.com
```
![](https://img.mahaofei.com/img/202112231643086-rosdep-bug-1.png)
##### 3. 将解析出来的IP地址全部添加到/etc/hosts文件最后，格式：185.199.109.133 raw.githubusercontent.com
```bash
sudo gedit /etc/hosts
```
![](https://img.mahaofei.com/img/202112231643217-rosdep-bug-2.png)
```bash
127.0.0.1 localhost
  
# The following lines are desirable for IPv6 capable hosts
::1 ip6-localhost ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters
ff02::3 ip6-allhosts
185.199.109.133 raw.githubusercontent.com
185.199.108.133 raw.githubusercontent.com
185.199.111.133 raw.githubusercontent.com
185.199.110.133 raw.githubusercontent.com
```
保存回到命令行
##### 5. 重新进行rosdep update
![](https://img.mahaofei.com/img/202112231643953-rosdep-bug-3.png)