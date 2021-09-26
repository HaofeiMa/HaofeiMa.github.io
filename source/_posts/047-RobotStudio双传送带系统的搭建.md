---
title: RobotStudio双传送带系统的搭建
date: 2021-02-08 22:33:51
description: 首先搭建系统的机械结构。导入两个传送带，将第二个传送带以z轴旋转90°，再沿y轴偏移-3200mm。导入机器人IRB120，将其移动到合适的位置上。创建工件的模型...
categories:
- 机器人
- RobotStudio
tags:
- 实验
- robotstudio
---

### 机械结构的搭建
1. 导入两个传送带，将第二个传送带以z轴旋转90°，再沿y轴偏移-3200mm。
<img src="https://img-blog.csdnimg.cn/20210208220925834.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
<img src="https://img-blog.csdnimg.cn/20210208220928149.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210208220932520.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210208220938376.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
<img src="https://img-blog.csdnimg.cn/20210208220951687.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
2. 导入机器人IRB120，将其移动到合适的位置上。
<img src="https://img-blog.csdnimg.cn/20210208221212764.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
<img src="https://img-blog.csdnimg.cn/20210208221220232.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="70%">
3. 创建工件的模型，将工件的第二部分内的物体拖动到第一部分中，形成一个部件
<img src="https://img-blog.csdnimg.cn/20210208221157676.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
<img src="https://img-blog.csdnimg.cn/20210208221255491.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="70%">
4. 将工件移动到合适的位置
<img src="https://img-blog.csdnimg.cn/20210208221309199.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
5. 导入夹具，将夹具旋转至与大地坐标系平行
<img src="https://img-blog.csdnimg.cn/20210208222354248.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
6. 设置夹具的本地坐标
<img src="https://img-blog.csdnimg.cn/20210208222418547.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
7. 在左侧布局栏中，将夹具拖动到机器人上，更新夹具的位置
<img src="https://img-blog.csdnimg.cn/20210208222428972.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
### 创建机器人系统
<img src="https://img-blog.csdnimg.cn/20210208222524806.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="50%">
<img src="https://img-blog.csdnimg.cn/20210208222531328.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210208222535887.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210208222539823.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">
<img src="https://img-blog.csdnimg.cn/20210208222543443.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
<img src="https://img-blog.csdnimg.cn/2021020822255042.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">
<img src="https://img-blog.csdnimg.cn/20210208222552948.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="60%">

等待一段时间，等待系统创建完成即可进行传送带的试验。