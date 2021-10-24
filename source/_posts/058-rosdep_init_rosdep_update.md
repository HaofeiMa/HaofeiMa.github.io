---
title: ROS安装时rosdep init与rosdep update问题解决方法（2021.2.20亲测）
date: 2021-02-20 08:15:16
description: ROS安装过程可见我的上一篇博客Ubuntu20.04安装ROS Noetic。安装过程中rosdep init出现【ERROR cannot download default sources list from…Website may be down.】。rosdep update，总是出现超时问题无法更新。最终找到了一种靠谱可用的方法。
categories:
- 机器人
- ROS
tags:
- bug解决
- ros
description: 这两个问题都是网络连接相关的问题，解决方法相同，都是修改host主机。只是修改完成后rosdep init可以直接成功。而rosdep update还需要可靠的网络才行，如果update仍然失败，建议多试几次，或者试着更换手机热点网络...



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
![](https://img-blog.csdnimg.cn/20210220080922104.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
##### 3. 将解析出来的IP地址全部添加到/etc/hosts文件最后，格式：185.199.109.133 raw.githubusercontent.com
```bash
sudo gedit /etc/hosts
```
![](https://img-blog.csdnimg.cn/20210220081304582.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
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
![](https://img-blog.csdnimg.cn/20210220081443875.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)