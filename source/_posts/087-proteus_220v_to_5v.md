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
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231717027-proteus-220to5-1.png)
1.2 变压器Tran-2p2s：对220v交流电源进行降压
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231717703-proteus-220to5-2.png)
1.3 桥式整流器2W005G：用于将交流电整流为直流电
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231718392-proteus-220to5-3.png)
1.4 无极性电容CAP
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231718821-proteus-220to5-4.png)
1.5 电解电容CAP-ELEC
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231718469-proteus-220to5-5.png)
1.6 三端稳压芯片7805
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231719763-proteus-220to5-6.png)

### 二、接线方法
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231719201-proteus-220to5-7.png)

### 三、仿真结果
![](https://gitee.com/huffiema/pictures/raw/master/image/202112231719617-proteus-220to5-8.png)