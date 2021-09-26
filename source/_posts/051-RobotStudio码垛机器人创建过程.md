---
title: RobotStudio码垛机器人创建过程
date: 2021-02-13 23:59:20
description: 首先导入一个IRB2600机器人，移动夹具的本地坐标原点，使原点位置为顶面中心（与法兰盘连接的部位）。对齐夹爪Smart组件的本地坐标和机器人末端法兰盘的坐标...
categories:
- 机器人
- RobotStudio
tags:
- 实验
- robotstudio
---

### 一、安装夹具
1. 导入一个IRB2600机器人
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213164433918.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
2. 移动夹具的本地坐标原点，使原点位置为顶面中心（与法兰盘连接的部位）
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213164735705.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213164924385.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
3. 对齐夹爪Smart组件的本地坐标和机器人末端法兰盘的坐标，使夹具的本地坐标与法兰盘的本地坐标重合，为下一步安装夹具做准备。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213165530663.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
4. 在布局菜单内，将夹具拖动到IRB2600机器人上，完成夹具的安装
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213165939792.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
### 二、创建传送带
1. 导入传送带并设定传送带的位置
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213170317940.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
2. 创建码垛用的物体，并将其移动到传送带的起点。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213171128797.png)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213171755770.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
3. 创建一个Smart组件，用于传送带物体的运动。添加如下组件
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213172158659.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
4. 对各个组件进行设置
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213173500255.png)

![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213172636348.png)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213172918414.png)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213173026596.png)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213175804683.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)

### 三、创建码垛底盘
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213174505654.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
### 四、创建机器人系统
![在这里插入图片描述](https://img-blog.csdnimg.cn/2021021317474614.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213174754268.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
选项内选择如下选项
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213174833386.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
### ？
1. 在仿真设定中，将机器人系统后面的框选去除。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213175056230.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
2. 运行仿真，使物块到达面传感器处，然后停止仿真，捕捉几个目标点。（后面两个目标点是为了码垛时，物块会有两种拜访姿态，所以使用两个目标点）
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213181432772.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
3. 旋转第三个目标点，使其绕Z轴旋转-90度。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213182046356.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
4. 为目标点配置参数
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213182546238.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
5. 使机器人回到机械原点，然后创建一个空路径，将三个目标点依次拖动到路径中。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213183001640.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213183106200.png)
6. 同步到工作站
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213183147494.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213183155155.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
7. 删除之前仿真出来的物块的copy物体。
8. 添加两个信号，一个是到位信号，用于传送带的等待，另一个是夹具信号。添加完成后重启控制器。
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213225452844.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213225557921.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213225632720.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213225650174.png)

9. 打开控制器，可以看到RAPID/T_ROB1下的程序模块，接下来就可以进行程序编写了。
### 程序编写
main程序代码如下
```c
MODULE Module1
	CONST robtarget Target_10:=[[347.037,682.5,875.06],[1,0,0,0],[0,0,0,0],[9E9,9E9,9E9,9E9,9E9,9E9]];
	CONST robtarget Target_20:=[[500,-300,100],[1,0,0,0],[-1,0,-1,0],[9E9,9E9,9E9,9E9,9E9,9E9]];
	CONST robtarget Target_30:=[[500,-300,100],[0,0,0,1],[-1,0,1,0],[9E9,9E9,9E9,9E9,9E9,9E9]];
	VAR num layer:=1;
    VAR num x:=0;
    VAR num z:=0;
    PROC main()
        FOR i FROM 0 TO 20 DO
            SetDO JiaJu0,0;
            MoveJ Offs(Target_10,0,0,200),v500,fine,Tool1;
            WaitDI DaoWei0,1; 
            MoveL Offs(Target_10,0,0,0),v500,fine,Tool1;
            SetDO JiaJu0,1;
            WaitTime 1;
            MoveL Offs(Target_10,0,0,200),v500,fine,Tool1;

            IF layer MOD 2 = 1 THEN
                IF i MOD 5 < 4 and i MOD 5 <> 0 THEN
                    MoveL Offs(Target_30,90+x,-150,300+z),v500,fine,Tool1;
                    MoveL Offs(Target_30,90+x,-150,100+z),v500,fine,Tool1;
                    SetDO JiaJu0,0;
                    WaitTime 1;
                    MoveL Offs(Target_30,90+x,-150,300+z),v500,fine,Tool1;
                    x:=x+210;
                    IF i MOD 5 = 3 THEN
                        x:=0;
                    ENDIF
                ELSE
                    MoveL Offs(Target_20,150+x,-410,300+z),v500,fine,Tool1;
                    MoveL Offs(Target_20,150+x,-410,100+z),v500,fine,Tool1;
                    SetDO JiaJu0,0;
                    WaitTime 1;
                    MoveL Offs(Target_20,150+x,-410,300+z),v500,fine,Tool1;
                    x:=x+300;
                ENDIF
                IF i MOD 5 = 0 THEN
                    layer:=2;
                    x:=0;
                    z:=z+100;
                ENDIF
                
            ELSE
                IF i MOD 5 < 3 THEN
                    MoveL Offs(Target_20,150+x,-100,300+z),v500,fine,Tool1;
                    MoveL Offs(Target_20,150+x,-100,100+z),v500,fine,Tool1;
                    SetDO JiaJu0,0;
                    WaitTime 1;
                    MoveL Offs(Target_20,150+x,-100,300+z),v500,fine,Tool1;
                    x:=x+300;
                    IF i MOD 5 = 2 THEN
                        x:=0;
                    ENDIF
                ELSE
                    MoveL Offs(Target_30,100+x,-350,300+z),v500,fine,Tool1;
                    MoveL Offs(Target_30,100+x,-350,100+z),v500,fine,Tool1;
                    SetDO JiaJu0,0;
                    WaitTime 1;
                    MoveL Offs(Target_30,100+x,-350,300+z),v500,fine,Tool1;
                    x:=x+210;
                ENDIF
                IF i MOD 5 = 0 THEN
                    layer:=1;
                    x:=0;
                    z:=z+100;
                ENDIF
            ENDIF
                
        ENDFOR
        z:=0;
    ENDPROC
ENDMODULE
```

### 仿真测试
1. 将代码同步到工作站
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210213234602340.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
 2. 删除Path_10路径，只保留main路径
![在这里插入图片描述](https://img-blog.csdnimg.cn/2021021323470717.png?x-oss-process=image/watermark,type_ZmFuZ3poZW5naGVpdGk,shadow_10,text_aHR0cHM6Ly9ibG9nLmNzZG4ubmV0L3dlaXhpbl80NDU0MzQ2Mw==,size_16,color_FFFFFF,t_70)
2. 设置工作站逻辑
![在这里插入图片描述](https://img-blog.csdnimg.cn/20210214091553226.png)
3. 进行仿真