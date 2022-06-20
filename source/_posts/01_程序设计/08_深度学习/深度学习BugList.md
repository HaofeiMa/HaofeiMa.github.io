---
title: 深度学习遇到报错Bug解决方法（不定时更新）
categories:
  - 程序设计
  - 深度学习
tags:
  - 深度学习
  - bugs
description: 在跑深度学习代码，进行训练和预测过程中，肯定会遇到各种报错，本文总结了本人遇到的一些errors总结在这里，不定时更新。
cover: 'https://img-blog.csdnimg.cn/20201029204744983.png'
katex: false
abbrlink: f5eca7d2
date: 2022-06-11 08:51:26
updated: 2022-06-15 16:27:14
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
aplayer:
highlight_shrink:
aside:
stick:
---
# No module named ‘pycocotools‘

参考博客：[超简单解决No module named ‘pycocotools‘](https://blog.csdn.net/weixin_42410915/article/details/109368497)

[各版本pycocotools.whl文件](https://pypi.tuna.tsinghua.edu.cn/simple/pycocotools-windows/)

点击连接中任意一个版本，（我安装的是2.0.0），下载的时候一定要注意对应的python版本，cp36指的是python3.6，cp37和cp38同理。

下载之后，放入你喜欢的文件夹中，然后启动命令行，进入whl文件所在的目录，输入以下命令即可，注意install后面是你自己下载的whl文件全称

![](https://img-blog.csdnimg.cn/20201029204744983.png)


```shell
activate tensorflow
E:
cd E:/windows/Downloads
pip install pycocotools_windows-2.0-cp36-cp36m-win_amd64.whl
```

# 使用Google Colab时，将Tensorflow版本转换到1.x版本

参考博客：[https://blog.csdn.net/qq_44262417/article/details/105222696](https://blog.csdn.net/qq_44262417/article/details/105222696)

```shell
%tensorflow_version 1.x
```

# maskrcnn训练提示：FutureWarning: Input image dtype is bool

参考博客：[https://blog.csdn.net/qq_39483453/article/details/118598535](https://blog.csdn.net/qq_39483453/article/details/118598535)

scikit-image=0.17.2 的版本存在的问题，修改scikit-image包版本为0.16.2

```shell
pip install -U scikit-image==0.16.2
```


# 成功解决AttributeError: ‘str‘ object has no attribute ‘decode‘

参考博客：[https://blog.csdn.net/qq_41185868/article/details/82079079](https://blog.csdn.net/qq_41185868/article/details/82079079)

```shell
pip install 'h5py<3.0.0' -i https://pypi.tuna.tsinghua.edu.cn/simple
```

# TypeError: expected str, bytes or os.PathLike object, not NoneType

出现这个问题多半是没有指定路径，上述问题翻译过来是，期望一个字符串或者字节路径，而不是默认值，出现这个问题需要把指定路径的变量赋值即可。这种错误多半出现在运行开源代码时出现。

检查代码中对应位置的字符串变量，是否传入了确定的值，而非None。