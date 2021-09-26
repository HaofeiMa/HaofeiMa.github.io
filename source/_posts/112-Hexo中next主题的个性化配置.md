---
title: Hexo中next主题的个性化配置
date: 2021-08-16 17:36:06
description: 在Hexo中一般有两个_config.yml文件，一个在根目录下，我称之为网站配置文件，一个在主题目录中，我称之为主题配置文件。文章介绍了主题更换、菜单设置、侧边栏设置、作者头像、社交连接、网站名称、作者名字、中英文切换、主页显示文章数、翻译设置等设置。
categories:
- 程序设计
- 网站
tags:
- 网站搭建
- hexo
---

&emsp;&emsp;Hexo与next主题的安装方法，网上有很多教程，这里不再赘述，直接开始next主题的配置方法。
&emsp;&emsp;在Hexo中一般有两个_config.yml文件，一个在根目录下，我称之为网站配置文件，一个在主题目录中，我称之为主题配置文件。
## 一、主题常用配置
next 主题的配置一般是指修改主题配置文件 <font color='red'> Hexo\themes\hexo-theme-next\_config.yml </font> 文件。
在_config.yml 中可以修改许多常见的设置。
#### 1. 更换主题（Scheme Setting）
```yml
# 主题
#scheme: Muse
scheme: Mist
#scheme: Pisces
#scheme: Gemini

# 黑暗模式
darkmode: false
```
#### 2. 菜单设置（Menu Settings）
```yml
menu:
  home: / || fa fa-home
  about: /about/ || fa fa-user
  tags: /tags/ || fa fa-tags
  categories: /categories/ || fa fa-th
  archives: /archives/ || fa fa-archive
  #schedule: /schedule/ || fa fa-calendar
  #sitemap: /sitemap.xml || fa fa-sitemap
  #commonweal: /404/ || fa fa-heartbeat

# 启用/禁用：菜单图标和项目徽章
menu_settings:
  icons: true
  badges: true
```

#### 3. 侧边栏设置（Sidebar Settings）
```yml
# 侧边栏位置
sidebar:
  # Sidebar Position.
  position: left
  #position: right

  # 手动定义侧边栏宽度。如果注释，将默认为
  # Muse | Mist: 320
  # Pisces | Gemini: 240
  width: 240

  # 侧边栏显示 (只对 Muse | Mist 主题生效), 可用的变量有:
  #  - post    自动展开（默认值）
  #  - always  在所有页面显示侧边栏
  #  - hide    仅在单击侧边栏切换图标时展开
  #  - remove  完全删除侧边栏，包括侧边栏切换
  display: always

  # 侧边栏填充像素
  padding: 18
  # 侧边栏与顶部菜单栏的偏移量(像素) (只对 Pisces | Gemini 主题生效).
  offset: 12
  
  b2t: true #是否提供一键置顶
  scrollpercent: true #是否显示当前阅读进度
```

#### 4. 侧边栏头像（Sidebar Avatar）
```yml
# 侧边栏头像
avatar:
  # 替换默认图像并在这里设置头像的url
  url: /images/avatar.jpg
  # 如果为true，头像将以圆圈显示
  rounded: true
  opacity: 1
  # 如果为true，鼠标悬停在头像上时，头像将会旋转
  rotated: false
```
#### 5. 社交链接（Social Links）
```yml
social:
  CSDN: https://blog.csdn.net/weixin_44543463 || fab fa-cuttlefish
  GitHub: https://github.com/HuffieMa || fab fa-github
  E-Mail: mailto:haofei_ma@163.com || fa fa-envelope
  #Weibo: https://weibo.com/yourname || fab fa-weibo
  #Google: https://plus.google.com/yourname || fab fa-google
  Twitter: https://twitter.com/huffie65380272 || fab fa-twitter
  #FB Page: https://www.facebook.com/yourname || fab fa-facebook
  #StackOverflow: https://stackoverflow.com/yourname || fab fa-stack-overflow
  #YouTube: https://youtube.com/yourname || fab fa-youtube
  #Instagram: https://instagram.com/yourname || fab fa-instagram
  #Skype: skype:yourname?call|chat || fab fa-skype
```
>这里可能会需要自定义图标，可以在[fontawesome](https://fontawesome.com/v5.15/icons)网站中搜索想要的图标，然后在这里使用 `fa fa-图标名称` 或  `fab fa-图标名称` 来调取所需要的图标。（如 `fab fa-cuttlefish` 、 `fa fa-grip-lines-vertical`）
>
## 二、网站配置
网站配置一般是指修改配置文件 <font color='red'> Hexo\_config.yml </font> 文件。
在_config.yml 中可以修改许多常见的设置。
#### 1. 网站基本配置（网站名称、作者名字、中英文切换）
```yml
title: Half_A Studio  #浏览器顶部标签栏的显示
subtitle: ''
description: ''
keywords:
author: Huffie	#侧边栏中的作者名字
language: zh-CN	 #讲此处修改为zh-CN即可切换中文
timezone: ''
```
#### 2. 主页显示文章数
```yml
index_generator:
  path: ''
  per_page: 5
  order_by: -date
```
## 三、翻译设置
网站切换为中文后，我们发现一些翻译不太符合我的要求，比如它把每一篇博客叫做日志，如果想修改，可以打开翻译配置文件 <font color='red'> Hexo\themes\hexo-theme-next\languages\zh-CN.yml</font> 进行修改