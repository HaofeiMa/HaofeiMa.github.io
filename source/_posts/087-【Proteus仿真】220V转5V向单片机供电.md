---
title: 【Proteus仿真】220V转5V向单片机供电
date: 2021-04-06 18:10:00
description: 所使用元器件包括仿真电源、变压器、桥式整流器、无极电容、电解电容、三端稳压芯片。接线方法如图。
categories:
- 嵌入式
- 单片机
tags:
- 实验
- proteus
---

### 一、所用元器件介绍
1.1 仿真电源Alternator：用于仿真220v交流电源
<img src="https://img-blog.csdnimg.cn/20210406175114833.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="25%">
1.2 变压器Tran-2p2s：对220v交流电源进行降压
<img src="https://img-blog.csdnimg.cn/2021040617525613.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="25%">
1.3 桥式整流器2W005G：用于将交流电整流为直流电
<img src="https://img-blog.csdnimg.cn/20210406175422626.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="25%">
1.4 无极性电容CAP
<img src="https://img-blog.csdnimg.cn/20210406175820802.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="25%">
1.5 电解电容CAP-ELEC
<img src="https://img-blog.csdnimg.cn/20210406175846429.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="25%">
1.6 三端稳压芯片7805
<img src="https://img-blog.csdnimg.cn/20210406175934412.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="25%">
### 二、接线方法
<img src="https://img-blog.csdnimg.cn/20210406180237156.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="80%">

### 三、仿真结果
<img src="https://img-blog.csdnimg.cn/20210406180416833.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_SGFsZi1BIFN0dWRpbw==,size_16,color_FFFFFF,t_70" width="100%">