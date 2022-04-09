---
title: urdf与xacro的使用方法 & 机械臂模型仿真示例
description: >-
  为什么要创建机器人的三维模型，原因在于机器人机器人仿真工具可以帮助我们体现发现设计中的一些关键错误。而模型仿真的含义，在于我们创建的是机器人模型，因此不一定和实际机器人长得一模一样。但因为是仿真，所以模型必须具备所有的真实硬件特点。
categories:
  - 机器人
  - ROS
tags:
  - 实验
  - ROS
abbrlink: 2a57a647
date: 2021-10-10 10:23:20
---



为什么要创建机器人的三维模型，原因在于机器人机器人仿真工具可以帮助我们体现发现设计中的一些关键错误。
而模型仿真的含义，在于我们创建的是机器人模型，因此不一定和实际机器人长得一模一样。但因为是仿真，所以模型必须具备所有的真实硬件特点。

### 一、机器人建模的工具

ROS提供了许多功能包帮助我们进行机器人的建模，并使用ROS进行仿真。例如urdf、kdl_parser、robot_state_publisher、collada_urdf等等。

>  **urdf是一种机器人模型的描述格式，基于XML规范，通过树状结构进行链接，因此机器人只能通过关节进行刚性连接**

**1. robot_mode**
robot_model是一个包含了许多功能包的功能包集，包括如urdf等功能包。可以辅助我们创建机器人三维模型。

**2. 有关URDF的功能包**
* **joint_state_publisher**：读取机器人模型描述文件、发布各关节信息、可使用RViz仿真、验证各关节旋转平移关系。
* **kdl_parser**：发布关节状态、正向/逆向运动学分析。
* **robot_state_publisher**：读取当前机器人关节状态，发布机器人的位姿状态。

**3. xacro**
xacro相当于urdf的升级版本，可以让urdf更易读。并且xacro可以被用来描述复杂的机器人模型。

### 二、URDF模型
#### 2.1 URDF模型介绍
**1. URDF介绍**
URDF是一种机器人模型的描述文件，通过创建`.urdf`的文件，并使用xml标签来描述机器人模型。

**2. URDF常用标签**
* **robot**：概述整个机器人模型，定义机器人的名字，连接件和关节。
```xml
<robot name="name of robot">
	<link>......</link>
	<link>......</link>
	
	<joint>......</joint>
	<joint>......</joint>
</robot>
```

* **link**：描述机器人某个刚体的外观属性`<visual />`，包括大小、形状、颜色，也可以描述动态特性如惯性参数`<inertial>`、碰撞特性`<collision>`。
```xml
<link name="name of link">
	<visual>............</visual>
	<inertial>..........</inertial>
	<collision>.........</collision>
</link>
```
* **joint**：代表机器人的关节，可以机器人的定义运动学和动力学参数，也可以限制机器人的运动和速度。不同的关节标签代表了不同的关节类型如下

| joint标签      | 代表关节类型         |
| -------------- | -------------------- |
| `<revolute>`   | 旋转副（有角度限制） |
| `<continuous>` | 旋转副（无限旋转）   |
| `<prismatic>`  | 移动副               |
| `<fixed>`      | 固定副               |
| `<float>`      | 浮动副               |
| `<planar>`     | 平面副               |
```xml
<joint name="name of joint">
	<parent link="link1">
	<child link="link2">
	<calibration>......</calibration>
	<dynamics damping ....../>
	<limit effort ....../> 
</joint>
```

* **gazebo**：包含了Gazebo仿真器的一些仿真参数，可以使用此标签引入gazebo插件、gazebo物理属性设置等等。
```xml
<gazebo reference="link1">
	<material>Gazebo/Black</material>
</gazebo>
```
#### 2.2 创建功能包
**1. 首先进入catkin工作空间中**
```bash
cd ~/catkin_ws/src
```
> 如果之前没有创建过ROS工作空间，可以先执行如下命令创建
> ```bash
> mkdir -p ~/catkin_ws/src
> cd ~/catkin_ws/src
> catkin_init_workspace
> catkin_make
> source devel/setup.bash
> echo "source /opt/ros/noetic/setup.bash" >> ~/.bashrc
> ```
> **2. 创建功能包**
```bash
catkin_create_pkg robot_description_pkg roscpp tf geometry_msgs urdf rviz xacro
```
**3. 创建基本文件夹**
```bash
cd robot_description_pkg
mkdir urdf meshes launch
```
urdf文件夹主要用来保存机器人模型的描述文件；meshes文件用来保存模型文件；launch文件夹保存驱动文件，我们会需要创建启动文件启动RViz来展示机器人模型。
#### 2.3 创建URDF模型
以一个平移与倾斜机构为例，如下图所示

**1. 创建urdf文件**
进入刚才创建的urdf文件夹下，新建一个`pan_tilt.urdf`文件，并输入以下代码
```xml
<?xml version="1.0"?>
<robot name="pan_tilt">

		<!--定义了base_link -->
		<!-- <visual>标签描述了在仿真环境的外观，包括几何外形<geometry>（圆柱形cylinder）等-->
        <link name="base_link">
                <visual>
                        <geometry>
                                <cylinder length="0.01" radius="0.2" />
                        </geometry>
                        <origin rpy="0 0 0" xyz="0 0 0" />
                        <material name="yellow">
                                <color rgba="1 1 0 1" />
                        </material>
                </visual>
        </link>

		<!-- 定义了关节pan_joint，以及其关节类型：旋转副（有限制） -->
		<!-- 旋转副连接的两个刚体分别为base_link和pan_link -->
        <joint name="pan_joint" type="revolute">
                <parent link="base_link" />
                <child link="pan_link" />
                <origin xyz="0 0 0.1" />
                <axis xyz="0 0 1" />
                <limit effort="300" velocity="0.1" lower="-3.14" upper="3.14" />
                <dynamics damping="50" friction="1" />
        </joint>

        <link name="pan_link">
                <visual>
                        <geometry>
                                <cylinder length="0.4" radius="0.04" />
                        </geometry>
                        <origin rpy="0 0 0" xyz="0 0 0.09" />
                        <material name="red">
                                <color rgba="0 0 1 1" />
                        </material>
                </visual>
        </link>

        <joint name="tilt_joint" type="continuous">
                <parent link="pan_link" />
                <child link="tilt_link" />
                <origin xyz="0 0 0.2" />
                <axis xyz="0 1 0" />
                <limit effort="300" velocity="0.1" lower="-4.64" upper="-1.5"/>
    			<dynamics damping="50" friction="1"/>
        </joint>

        <link name="tilt_link">
                <visual>
                        <geometry>
                                <cylinder length="0.4" radius="0.04" />
                        </geometry>
                        <origin rpy="0 1.5 0" xyz="0 0 0" />
                        <material name="green">
                                <color rgba="1 0 0 1" />
                        </material>
                </visual>
        </link>

</robot>
```


**2. 检查urdf文件**
```bash
check_urdf pan_tilt.urdf
```
如果urdf文件没有问题，会输出如下信息

![](https://img.mahaofei.com/img/202112231956685-urdf-xacro-1.png)

**3. 创建launch文件**
进入之前创建的launch文件夹，创建`view_demo.launch`文件，并添加如下内容
```xml
<launch>
    <arg name="model" />
    <param name="robot_description" textfile="$(find robot_description_pkg)/urdf/pan_tilt.urdf" />
    <param name="use_gui" value="true" />

    <node name="joint_state_publisher_gui" pkg="joint_state_publisher_gui" type="joint_state_publisher_gui" />
    <node name="robot_state_publisher" pkg="robot_state_publisher" type="robot_state_publisher" />
    <node name="rviz" pkg="rviz" type="rviz" args="-d $(find robot_description_pkg)/urdf.rviz" required="true" />
</launch>
```
**4. 启动节点查看仿真模型**
首先编译工作空间
```bash
cd ~/catkin_ws
catkin_make
```
然后启动节点
```bash
roslaunch robot_description_pkg view_demo.launch 
```
打开后会发现出现Unknown frame map的提示，这时候只需要将`Fixed Frame`改为`base_link`即可。

![](https://img.mahaofei.com/img/202112231957653-urdf-xacro-2.png)

然后在左下角点击`Add`，添加`RobotModel`就可以正常看到机器人模型了。

![](https://img.mahaofei.com/img/202112231957351-urdf-xacro-3.png)



![](https://img.mahaofei.com/img/202112231957826-urdf-xacro-4.png)



### 三、Xacro模型
URDF模型虽然简单，但存在一些问题，例如代码重用性不好（重复代码只能复制），模块化不好（不能引用其它URDF文件）等等。
而xacro是urdf的Plus版本，它通过创建macro来描述模型，macro可以被复用，也可以被其他文件引用，让代码更可读。
#### 3.1 Xacro的使用示例
将经常改变的部分参数值统一定义在文件开头，这样改变参数值更简单，而不用在代码中一个一个参数找，然后代替它们。

```xml
<xacro:property name="base_link_length" value="0.01" />
<xacro:property name="base_link_radius" value="0.2" />

<xacro:property name="pan_link_length" value="0.4" />
<xacro:property name="pan_link_radius" value="0.04" />
```


![](https://img.mahaofei.com/img/202112231957996-urdf-xacro-5.png)



#### 3.2 数学表达式
在xacro标签的`${}`中可以使用数学表达式进行基本的运算，支持的数学运算包括+，-，×，÷。求幂和模运算不支持。
#### 3.3 xacro到URDF的转换
如果编写完成了xacro的模型文件，可以使用下面的命令完成到urdf的转换。其中`>`两侧分别是转换前后的xacro和urdf文件。
```bash
rosrun xacro xacro.py filename.xacro > newfilename.urdf
```

### 四、实例：7自由度机械臂
#### 4.1 7自由度机械臂介绍
我们知道确定机械臂末端的位姿需要6个自由度（3坐标+3方向），因此七自由度机械臂属于冗驱机构，即我们可以通过针对同一个位姿得到不同的关节配置，这样可以有效提高机器人柔性和功能性，并且更容易避免碰撞。


#### 4.2 创建前的准备工作
**① 机械臂清单明细**

| 项目       | 参数 |
| ---------- | ---- |
| 自由度     | 7    |
| 机械臂长度 | 50cm |
| 臂展       | 35cm |
| 刚体数     | 12   |
| 关节数     | 11   |

**② 关节列表**
| 序号 | 关节名称             | 关节类型          | 角度限制 |
| ---- | -------------------- | ----------------- | -------- |
| 1    | bottom_joint         | 固定（Fixed）     | --       |
| 2    | shoulder_pan_joint   | 旋转（Revolute）  | -150~114 |
| 3    | shoulder_pitch_joint | 旋转（Revolute）  | -67~109  |
| 4    | elbow_roll_joint     | 旋转（Revolute）  | -150~41  |
| 5    | elbow_pitch_joint    | 旋转（Revolute）  | -92~110  |
| 6    | wrist_roll_joint     | 旋转（Revolute）  | -150~150 |
| 7    | wrist_pitch_joint    | 旋转（Revolute）  | 92-113   |
| 8    | gripper_roll_joint   | 旋转（Revolute）  | -150~150 |
| 9    | finger_joint1        | 移动（Prismatic） | 0~3cm    |
| 10   | finger_joint2        | 移动（Prismatic） | 0~3cm    |

#### 4.3 模型代码详解

代码中主要由几部分组成
**① 常量定义**
定义常用的数学常量以及各机械臂刚体的参数值，例如下面的代码片段就分别为数学常量的定义以及肩部刚体的参数值定义。
```xml
  <!-- Constants -->
  <property name="M_SCALE" value="0.001 0.001 0.001"/> 
  <property name="M_PI" value="3.14159"/>

  <!-- Shoulder pan link properties -->
  <property name="shoulder_pan_width" value="0.04" />
  <property name="shoulder_pan_len" value="0.08" />
```

**② 惯性矩阵定义**
```xml
   <xacro:macro name="inertial_matrix" params="mass">
      <inertial>
      	<mass value="${mass}" />
        <inertia ixx="1.0" ixy="0.0" ixz="0.0" iyy="0.5" iyz="0.0" izz="1.0" />
      </inertial>
   </xacro:macro>
```

**③ 传动件配置**
通过使用`<transmission>`标签定义连接执行器的关节，它可以定义电机的类型、参数，硬件接口的类型以及ROS控制器的接口等等。
```xml
   <xacro:macro name="transmission_block" params="joint_name">
	  <transmission name="tran1">
	    <type>transmission_interface/SimpleTransmission</type>
	    <joint name="${joint_name}">
	      <hardwareInterface>PositionJointInterface</hardwareInterface>
	    </joint>
	    <actuator name="motor1">
	      <hardwareInterface>PositionJointInterface</hardwareInterface>
	      <mechanicalReduction>1</mechanicalReduction>
	    </actuator>
	  </transmission>
   </xacro:macro>
```
**④ 引用其他xacro文件**
通过使用`<xacro:include>`标签，可以引用其他xacro文件
```xml
  <xacro:include filename="$(find mastering_ros_robot_description_pkg)/urdf/sensors/xtion_pro_live.urdf.xacro"/>
```
**⑤ 插入简单模型**
与urdf一样，使用mesh标签插入一些基础的形状如圆柱体、长方体等等。
```xml
  <link name="bottom_link">

    <visual>
      <origin xyz=" 0 0 -0.04"  rpy="0 0 0"/>
      <geometry>

	       <box size="1 1 0.02" />

      </geometry>
      <material name="Brown" />
    </visual>

    <collision>
      <origin xyz=" 0 0 -0.04"  rpy="0 0 0"/>
      <geometry>
	       <box size="1 1 0.02" />
      </geometry>
      </collision>>

  </link>
```
#### 4.4 在rviz中仿真
**① 将xacro文件转换为urdf模型**
首先进入到存放xacro文件的目录下，运行如下代码从`.xacro`文件生成`.urdf`文件
```bash
rosrun xacro xacro seven_dof_arm.xacro > seven_dof_arm.xacro.urdf
```
然后可以检查urdf文件是否正确生成
```bash
check_urdf seven_dof_arm.xacro.urdf
```
**② 编辑launch文件**
进入launch文件夹，编辑launch文件如下，基本与上一小节一样，这里不再过多赘述
```xml
<launch>
    <arg name="model" />
    <param name="robot_description" textfile="$(find robot_description_pkg)/urdf/seven_dof_arm.xacro.urdf" />
    <param name="use_gui" value="true" />

    <node name="joint_state_publisher_gui" pkg="joint_state_publisher_gui" type="joint_state_publisher_gui" />
    <node name="robot_state_publisher" pkg="robot_state_publisher" type="robot_state_publisher" />
    <node name="rviz" pkg="rviz" type="rviz" args="-d $(find robot_description_pkg)/urdf.rviz" required="true" />
</launch>
```

**③ 编译运行**
```bash
cd ~/catkin_ws
catkin_make
roslaunch robot_description_pkg view_arm.launch
```


![](https://img.mahaofei.com/img/202112231958358-urdf-xacro-6.png)



> 功能包文件
> 链接：[https://huffie.lanzouw.com/ieTZMv5t3fi](https://huffie.lanzouw.com/ieTZMv5t3fi)
