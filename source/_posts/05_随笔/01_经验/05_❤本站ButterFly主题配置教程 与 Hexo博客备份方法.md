---
title: ❤最全ButterFly主题配置教程 与 Hexo博客备份方法
categories:
  - 随笔
  - 经验
description: >-
  本站博客ButterFly主题配置的全部方法，呕心沥血整理版，供各位同样使用ButterFly主题的朋友参考。同样记录了Hexo博客的备份方法，防止更换电脑或电脑崩溃后数据丢失。
cover: 'https://img.mahaofei.com/img/20220425211812.png'
hide: true
abbrlink: 8ee3ad86
date: 2022-03-26 21:14:56
updated: 2022-03-26 21:14:56
tags:
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


# ButterFly主题配置

## 一、主页设置

### 1.1 导航菜单

**导航菜单**

设置如下`_config.yml`

```yaml
menu:
  首页: / || fas fa-home
  时光轴: /archives/ || fas fa-archive
  标签: /tags/ || fas fa-tags
  分类: /categories/ || fas fa-folder-open
  # List||fas fa-list:
  #   Music: /music/ || fas fa-music
  #   Movie: /movies/ || fas fa-video
  友链: /link/ || fas fa-link
  关于: /about/ || fas fa-heart
```

必须是`/xxx/`，后面`||`分开，然后写图标名。

默认子目录是展开的，如果你想要隐藏，在子目录里添加hide

```yaml
List||fas  fa-list||hide: Music: /music/ || fas fa-music Movie: /movies/ || fas fa-video
```

**标签页**

```shell
hexo new page tags
# source/tags/index.md
```

```yaml
--- 
title: 标签
date: 2018-01-05 00:00:00 
type: "tags" 
---
```

**分类页**

```shell
hexo new page categories
# source/categories/index.md
```

```yaml
--- 
title: 分类
date: 2018-01-05 00:00:00 
type: "categories" 
---
```

**友情链接**

```shell
hexo new page link
# source/link/index.md
```

```yaml
--- 
title: 友情链接
date: 2018-06-07 22:17:49 
type: "link" 
---
```

在Hexo博客目录中的`source/_data`（如果没有_data 文件夹，请自行创建），创建一个文件`link.yml`

```yaml
-  class_name: 网站class_desc:值得推荐的网站link_list: - name: Youtube link: https://www.youtube.com/ avatar: https://i.loli.net/2020/05/14/9ZkGg8v3azHJfM1.png descr:视频网站- name: Weibo link: https://www.weibo.com/ avatar: https://i.loli.net/2020/05/14/TLJBum386vcnI1P.png descr:中国最大社交分享平台- name: Twitter link: https://twitter.com/ avatar: https://i.loli.net/2020/05/14/5VyHPQqR6LWF39a.png descr:社交分享平台
```

class_name和 class_desc 支持html 格式书写，如不需要，也可以留空。

友情链接界面可以由用户自己自定义，只需要在友情链接的md档设置就行，以普通的Markdown格式书写。

**搜索系统**

记得运行hexo clean

[hexo-generator-search](https://github.com/PaicHyperionDev/hexo-generator-search)

```shell
npm install hexo-generator-search --save
```

```yaml
# Local search
local_search:
  enable: true
```



### 1.2 社交图标

```yaml
# social settings (社交圖標設置)
# formal:
#   icon: link || the description
social:
  CSDN: https://blog.csdn.net/weixin_44543463 || fab fa-cuttlefish
  GitHub: https://github.com/HuffieMa || fab fa-github
  E-Mail: mailto:haofei_ma@163.com || fa fa-envelope
  知乎: https://www.zhihu.com/people/ma-hao-fei-2 || fab fa-zhihu
```

### 1.3 网站图像

**网站图标与头像**

```yaml
# Favicon（網站圖標）
favicon: /img/favicon.png

# Avatar (頭像)
avatar:
  img: /img/avatar.jpg
  effect: false
```

**顶部图**

```yaml
disable_top_img: false
```

**设置顶部图**

| 配置 | 解释 |
| ---- | ---- |
|index_img|	主页的top_img|
|default_top_img|	默认的top_img，当页面的top_img 没有配置时，会显示default_top_img|
|archive_img|	归档页面的top_img|
|tag_img	tag| 子页面的默认top_img|
|tag_per_img|	tag 子页面的top_img，可配置每个tag 的top_img|
|category_img|	category 子页面的默认top_img|
|category_per_img|	category 子页面的top_img，可配置每个category 的top_img|

并不推荐为每个tag 和每个category 都配置不同的顶部图，因为配置太多会拖慢生成速度

```yaml
tag_per_img
  aplayer: https://xxxxxx.png
  android: ddddddd.png
category_per_img
随想: hdhdh.png
推荐: ddjdjdjd.png
```

```yaml
# 主页设置
# 默认top_img全屏，site_info在中间
# 使用默认, 都无需填写（建议默认）
index_site_info_top:  # 主页标题距离顶部距离例如300px/300em/300rem/10% 
index_top_img_height:   #主页top_img高度例如300px/300em/300rem 不能使用百分比
```

### 1.4 主页文章设置

**文章信息**

```yaml
post_meta:
  page: # Home Page
    date_type: created # created or updated or both 主頁文章日期是創建日或者更新日或都顯示
    date_format: date # date/relative 顯示日期還是相對日期
    categories: true # true or false 主頁是否顯示分類
    tags: true # true or false 主頁是否顯示標籤
    label: true # true or false 顯示描述性文字
  post:
    date_type: both # created or updated or both 文章頁日期是創建日或者更新日或都顯示
    date_format: date # date/relative 顯示日期還是相對日期
    categories: true # true or false 文章頁是否顯示分類
    tags: true # true or false 文章頁是否顯示標籤
    label: true # true or false 顯示描述性文字
```

![](https://cdn.jsdelivr.net/gh/jerryc127/CDN/img/hexo-theme-butterfly-docs-page-meta.png)

![](https://cdn.jsdelivr.net/gh/jerryc127/CDN/img/hexo-theme-butterfly-doc-post-info.png)

**文章简介**


在butterfly里，有四种可供选择
* description：只显示description
* **both**：优先选择description，如果没有配置description，则显示自动节选的内容
* auto_excerpt：只显示自动节选
* false：不显示文章内容

```yaml
# Display the article introduction on homepage
# 1: description
# 2: both (if the description exists, it will show description, or show the auto_excerpt)
# 3: auto_excerpt (default)
# false: do not show the article introduction
index_post_content:
  method: 2
  length: 500 # if you set method to 2 or 3, the length need to config

```


**文章封面**

```yaml
cover:
  # display the cover or not (是否顯示文章封面)
  index_enable: true
  aside_enable: true
  archives_enable: true
  # the position of cover in home page (封面顯示的位置)
  # left/right/both
  position: both
  # When cover is not set, the default cover is displayed (當沒有設置cover時，默認的封面顯示)
  default_cover: https://img.mahaofei.com/img/linux_debian.jpg
```

### 1.5 字数统计

`npm install hexo-wordcount --save`

```yaml
wordcount:
  enable: true
  post_wordcount: true
  min2read: true
  total_wordcount: true
```

![](https://cdn.jsdelivr.net/gh/jerryc127/CDN/img/hexo-theme-butterfly-docs-wordcount-totalcount.png)


### 1.6 页脚设置

**博客年份**

展示你站点起始时间的选项。它位于页面的最底部。

```yaml
# Footer Settings
# --------------------------------------
footer:
  owner:
    enable: true
    since: 2021
  custom_text: <a  href="https://beian.miit.gov.cn"><img  class="icp-icon"  src="/img/icp.png"><span>津ICP备2021000769号-2</span></a>
  copyright: true # Copyright of theme and framework

```


**百度统计**

```yaml
# Baidu Analytics
# https://tongji.baidu.com/web/welcome/login
baidu_analytics: 439a0d0abeb31dd8f338efd8266c999b
```


![](https://cdn.jsdelivr.net/gh/jerryc127/CDN/img/hexo-theme-butterfly-doc-footer-text.png)

**页脚背景**

```yaml
# footer是否显示图片背景(与top_img一致) 
footer_bg:  true
# 留空/false	显示默认的颜色
# img链接	图片的链接，显示所配置的图片
# 颜色(HEX值- #0000FF; RGB值- rgb(0,0,255);颜色单词- orange;渐变色- linear-gradient( 135deg, #E2B0FF 10%, #9F44D3 100%)） 对应的颜色
# true	显示跟top_img 一样
```


### 1.7 侧边栏设置
```yaml
# aside (側邊欄)
# --------------------------------------

aside:
  enable: true
  hide: false
  button: true
  mobile: true # display on mobile
  position: left # left or right
  card_author:
    enable: true
    description:
    button:
      enable: true
      icon: fab fa-cuttlefish
      text: CSDN欢迎关注
      link: https://blog.csdn.net/weixin_44543463
  card_announcement:
    enable: true
    content: 毕设ing！！
  card_recent_post:
    enable: true
    limit: 5 # if set 0 will show all
    sort: date # date or updated
    sort_order: # Don't modify the setting unless you know how it works
  card_categories:
    enable: true
    limit: 8 # if set 0 will show all
    expand: none # none/true/false
    sort_order: # Don't modify the setting unless you know how it works
  card_tags:
    enable: true
    limit: 40 # if set 0 will show all
    color: false
    sort_order: # Don't modify the setting unless you know how it works
  card_archives:
    enable: true
    type: monthly # yearly or monthly
    format: MMMM YYYY # eg: YYYY年MM月
    order: -1 # Sort of order. 1, asc for ascending; -1, desc for descending
    limit: 8 # if set 0 will show all
    sort_order: # Don't modify the setting unless you know how it works
  card_webinfo:
    enable: true
    post_count: true
    last_push_date: true
    sort_order: # Don't modify the setting unless you know how it works
```
## 二、文章设置

### 2.1 代码设置

**代码高亮**

Butterfly支持6种代码高亮样式：
- darker
- pale night
- **light**
- ocean
- mac
- **mac light**

具体样式参考[官方文档](https://butterfly.js.org/posts/4aa8abbe/#%E4%BB%A3%E7%A2%BC%E9%AB%98%E4%BA%AE%E4%B8%BB%E9%A1%8C)

```yaml
highlight_theme:  light
```

**代码复制**

```yaml
highlight_copy:  true
```

**代码展开关闭**

在默认情况下，代码框自动展开，可设置是否所有代码框都关闭状态，点击>可展开代码

```yaml
highlight_shrink:  true  
# true 代码框不展开，需点击>打开; 
# false 代码框展开，有>点击按钮
# none 不显示>按钮
```

**代码高度限制**

可配置代码高度限制，超出的部分会隐藏，并显示展开按钮。

```yaml
highlight_height_limit:  false  # unit: px 直接添加数字，如200
```


### 2.2 文章复制设置

```yaml
# copy settings 
# copyright: Add the copyright information after copied content (复制的内容后面加上版权信息)
copy:
  enable: false
  copyright:
    enable: false
    limit_count: 50
```

| 配置        | 解释                                                                   |
| ----------- | ---------------------------------------------------------------------- |
| enable      | 是否开启网站复制权限                                                   |
| copyright   | 复制的内容后面加上版权信息                                             |
| enable      | 是否开启复制版权信息添加                                               |
| limit_count | 字数限制，当复制文字大于这个字数限制时，将在复制的内容后面加上版权信息 |


### 2.3 文章目录

在文章页，会有一个目录，用于显示TOC。

```yaml
toc:
  post: true # 文章页是否显示TOC
  page: false # 普通页面是否显示TOC
  number: true # 是否显示章节数
  expand: false # 是否展开TOC
  style_simple: false # 简洁模式（侧边栏只显示TOC, 只对文章页有效）
```

主题会优先判断文章Markdown的Front-matter是否有配置，如有，则以Front-matter的配置为准。否则，以主题配置文件中的配置为准



### 2.4 文章打赏

```yaml
# Sponsor/reward
reward:
  enable: true
  QR_code:
    - img: /img/wechatpay.png
      link:
      text: 微信支付
    - img: /img/alipay.jpg
      link:
      text: 支付宝
```

### 2.5 下一篇文章
```yaml
# post_pagination (分頁)
# value: 1 || 2 || false
# 1: The 'next post' will link to old post
# 2: The 'next post' will link to new post
# false: disable pagination
post_pagination: 2
```
### 2.6 文章分享

```yaml
# Share.js
# https://github.com/overtrue/share.js
sharejs:
  enable: true
  sites: qq,wechat,weibo,facebook,twitter
```

在 head 里添加一些meta资料，例如缩略图、标题、时间等。当分享网页到一些平台时，平台会读取 Open Graph 的内容，展示缩略图，标题信息等等

```yaml
# Open graph meta tags
# https://developers.facebook.com/docs/sharing/webmasters/
Open_Graph_meta: true
```

### 2.7 数学公式KaTex

首先禁用MathJax（如果你配置过MathJax 的话），然后修改你的主題配置文件以便加载katex.min.css:

```yaml
# Math (數學)
# --------------------------------------
# About the per_page
# if you set it to true, it will load mathjax/katex script in each page (true 表示每一頁都加載js)
# if you set it to false, it will load mathjax/katex script according to your setting (add the 'mathjax: true' in page's front-matter)
# (false 需要時加載，須在使用的 Markdown Front-matter 加上 mathjax: true)

# MathJax
mathjax:
  enable: false
  per_page: false

# KaTeX
katex:
  enable: true
  per_page: false
  hide_scrollbar: true

```

卸载之前 hexo 的 markdown 渲染器以及 hexo-math，然后安装新的 `hexo-renderer-markdown-it-plus`

```shell
# 替换 `hexo-renderer-kramed` 或者 `hexo-renderer-marked` 等hexo的markdown渲染器  
# 可以在你的package.json里找到hexo的markdwon渲染器，并将其卸载  
npm un hexo-renderer-marked --save  
# or  
npm un hexo-renderer-kramed --save  
# 卸载 `hexo-math`  
npm un hexo-math --save  
  
# 然后安装 `hexo-renderer-markdown-it-plus`  
npm i @upupming/hexo-renderer-markdown-it-plus --save。

npm install @neilsustc/markdown-it-katex --save

```

在站点配置文件中配置

```yaml
markdown:
  plugins:
    - plugin:
      name: '@neilsustc/markdown-it-katex'
      options:
        strict: false
```


在博客模板文件添加

```markdown
katex: false
```

## 三、博客美化

### 3.1 背景canvas_nest

```yaml
canvas_nest:
  enable: true
  color: '0,0,255' #color of lines, default: '0,0,0'; RGB values: (R,G,B).( note: use ',' to separate.)
  opacity: 0.7 # the opacity of line (0~1), default: 0.5.
  zIndex: -1 # z-index property of the background, default: -1.
  count: 99 # the number of lines,default: 99.
  mobile: false # false 手机端不显示true 手机端显示
```

![](https://cdn.jsdelivr.net/gh/jerryc127/CDN/img/hexo-theme-butterfly-doc-canvas_nest.gif)



### 3.2 打字烟花特效

```yaml
# Typewriter Effect (打字效果) 
# https://github.com/disjukr/activate-power-mode 
activate_power_mode:
  enable: true
  colorful: true # open particle animation (冒光特效)
  shake: true # open shake (抖动特效)
  mobile: false
```

![](https://cdn.jsdelivr.net/gh/jerryc127/CDN/img/hexo-theme-butterfly-doc-type-animation.gif)

### 3.3 页面美化

```yaml
# 美化页面显示
beautify:
  enable: true
  field: site # site/post
  title-prefix-icon: '\f0c1'
  title-prefix-icon-color: "#F47466"
```

### 3.4 网站副标题打字效果

```yaml
# the subtitle on homepage (主頁subtitle)
subtitle:
  enable: true
  # Typewriter Effect (打字效果)
  effect: true
  # loop (循環打字)
  loop: true
  # source 調用第三方服務
  # source: false 關閉調用
  # source: 1  調用一言網的一句話（簡體） https://hitokoto.cn/
  # source: 2  調用一句網（簡體） http://yijuzhan.com/
  # source: 3  調用今日詩詞（簡體） https://www.jinrishici.com/
  # subtitle 會先顯示 source , 再顯示 sub 的內容
  source: 1
  # 如果關閉打字效果，subtitle 只會顯示 sub 的第一行文字
  sub:
```
### 3.5 访问人数busuanzi

```yaml
busuanzi:
  site_uv: true
  site_pv: true
  page_pv: true
```

![](https://cdn.jsdelivr.net/gh/jerryc127/CDN/img/hexo-theme-butterfly-doc-busuanzi-site-pv.png)


### 3.6 运行时间

```yaml
# Time difference between publish date and now (網頁運行時間)
# Formal: Month/Day/Year Time or Year/Month/Day Time
runtimeshow:
  enable: true
  publish_date: 2021/01/16 23:30:32

```

### 3.7 夜间模式

```yaml
# dark mode 
darkmode:
  enable: true # dark mode和light mode切换按钮
  button: true
  autoChangeMode: false
```
| 配置项                | 说明                                                                             |
| --------------------- | -------------------------------------------------------------------------------- |
| autoChangeMode: 1     | 跟随系统而变化，不支持的浏览器/系统将按照时间晚上6点到早上6点之间切换为dark mode |
| autoChangeMode: 2     | 只按照时间晚上6点到早上6点之间切换为dark mode,其余时间为light mode               |
| autoChangeMode: false | 取消自动切换                                                                     |

### 3.8 阅读模式

阅读模式下会去掉除文章外的内容，避免干扰阅读。

只会出现在文章页面，右下角会有阅读模式按钮。

```yaml
readmode:  true
```


### 3.9 页脚添加Github-badge标签

![](https://img.mahaofei.com/img/20220411223909.png)


1. 首先到[https://shields.io/](https://shields.io/)这个徽标生成网站生成Github-badge徽标。

![](https://img.mahaofei.com/img/20220411120309.png)

具体方法见网页，标签中用到的图标可以从[simpleicons](https://simpleicons.org/)查询。

生成的链接都是这样的 → [https://img.shields.io/badge/Hosted-Github-brightgreen?style=flat&logo=GitHub](https://img.shields.io/badge/Hosted-Github-brightgreen?style=flat&logo=GitHub)
然后简单写一下html代码，为每个标签添加链接

```html
<p>
	<a style="margin-inline:5px" target="_blank" href="https://github.com/">
		<img src="https://img.shields.io/badge/Hosted-Github-brightgreen?style=flat&logo=GitHub" title="本站项目由Gtihub托管">
	</a>
	<a style="margin-inline:5px" target="_blank" href="https://hexo.io/">
		<img src="https://img.shields.io/badge/Frame-Hexo-blue?style=flat&logo=hexo" title="博客框架为Hexo">
	</a>
	<a style="margin-inline:5px" target="_blank" href="https://butterfly.js.org/">
		<img src="https://img.shields.io/badge/Theme-Butterfly-6513df?logoColor=white&style=flat&logo=buefy" title="主题采用butterfly">
	</a>
	<a style="margin-inline:5px" target="_blank" href="https://aliyun.com/product/cdn">
		<img src="https://img.shields.io/badge/CDN-%E9%98%BF%E9%87%8C%E4%BA%91-orange?style=flat&logo=alibabacloud" title="本站使用阿里云为静态资源提供CDN加速">
	</a>
	<a style="margin-inline:5px" target="_blank" href="https://beian.miit.gov.cn/">
		<img src="https://img.shields.io/badge/%E6%B4%A5ICP%E5%A4%87-2021000769%E5%8F%B7--2-red?logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAdCAYAAAC9pNwMAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+nhxg7wAACNlJREFUSInF1mmMVeUdx/Hv2e+5+519mJWBYQZkGxZZxLKJqBXGoLS1iXWrmihotFXaJiTWWlsbl6q1aetWd5u0VkKjNG4YEJSlOCibDLMwM8x679z9nnPP1jcVJUxf+7z6J8+LT37/Z4VvaQhfFS8+sBXbctCDGrVTKlBUH4mxAbI9Hfj0IJLsp6paJ5/tmn20N/D0wKDRMq9F/c3M2U1/V0vDfWMFh+tv/Ig1zYPMabDImPJ52OaXO87W580KggCiiOsJOJ6I3wcNFaaeNKxrt72f2fLGu4FpJ/sDQABRzD22fH7/Yze069vGc6mrDLNIJCDik10sxz2by3VdPM87xzkP9jwPTZFRVI1YUJKH+oy7n3tbvv/P2wW/UQxRWe6w4ZJRptYLHDoCuz8v5cP92XbI762O+h6UVWHnUFbPpU0fEb2A60mMJ7MUi9b/b7UgKhiZMaIxm8YLplLMDPz8hl/EH+rs8TNlUpFf32uyZJGLPDwCiTGUyTWodTN49eUCdz2YwXb9NNcObp1X98WDoufynzMVCEKGn27ayPTWBi5ad8P5iQUkJEnFLjqM9Z+hrVX0vfDe6K2dPRWsW2bwyp9EUifSJB84gdxrkR0eRgv1o/3I4fbbprJ6scqamzVO9pffec1S5ZWY2Nfz5qEy/FqOC2Y3s3j53HMSi18VRjFPwSwg+1RfVbl115vvJrsfej7UGIsYPPGgQ7JXoO+Xx5B3dHEomyJ9x1qiQozkr95h5937aFnVyouPlgJK+Ss7Fxz64OTSxSX+LHYxT2IsRW5kbGI4oHcR0jqoqTjV9se3I7/f8rS/ClS23GxSXhph6L5d9Akm7qqZhHWBQGUJ+CWGFzcg7e7m6D3/ZuW1Ea5YKdA3EojuONi813TqNi+YPYOKUhXDtCeGL26/hakLLiEcdsaHRkRAoLRc4fJrmhnekyF0apgZowWSwwkaa+rw3f8WA1GZZsPP5JEChX8dhZTN6iU6kAcs5s+dHd183SJ0VVKL57pfw6YdRQw23aeWTns47DPTALWlRTR7kMLew6hGgYqUhWXYFFUdPZ6lUBahLA8hVcOftckfi7No7VRAAQqsX1dybfvG1qwriM9mM5mJ4e4jO5Cc01dPqixbr8tWGBQUL4vjGigEEShi+xUmZ2RiR/sJ1pbS8NkgZrKAGw0TsgQsQyFaF/nfYTGprAlMFysbA1pI3mhkR6snhGsaymYGvPyFEb9IdbUE2AzFFTwpRqCtBY0wmdER+hZW4j63gcJj38V+/ErSUZXsYBfjIZHIRW0c2Z8BskCAqN+CbBJBFnyyKjR+Ez57nBxLqpfMUeSISElMBFz6x2Q6OxzWrYjyxWVzEewioU3LCS5vQY6nMUrLwNaxXvoQ59IloFSx54PPAZtQLExVZZDxsVE8J4dn6v4JYatgbSjk0owPw7RGH2ADMo88Z7L20ip8f7gC7fAo0q4+0rt7kEQDvaghVZbiPHUHcyeXcfLjT3jmpR7AYsnSScya3UR8bARVMck7Y/cB75/X6rDf3Fg2dw2jKZm5dXGm1LuAzO5DCo9v6aT0ibco5kzOvLOP+NGTFJtDpPYeZKijk/Rn3QxsfZV7txwhX7ABiZUXBsGvIvguQApNQQva9RMmTvZ2dpVUls+tX/UD7GN/Y8Ws05w6rQF+9vyzg1vZjbvMRJhXiRSU8DpTFFe0QE8S6SfPkOkZoktrB2oAhZWrwljxOPmchiSMYOWNoxNuruFU5vWeXdsojiUon345113dBBQBmTYlTimgdB8nfPo4WjaNFgN9OMEkJ02dnadVt5ki54Esqy+bzKJltVhSPbI3iN2zCyMTeXNCuG7Omm2Zok7PR2+R7jvD8ouruHhmCrB5jVZeYxLdrTP4sr4Vtd9g4MA4qc4c+6cu5NPamfw4P59t2WrA4YdXKkASf7SFivo6PDdEPmf1fRM++zp1bH/0r4I1dD1ODtOWaW4IsvPjL7nqXhloQiSPwjjgMYkMASyGEBkjhISCQwkwzve/18AbT+pk8pVY4UacQi9y+gyZ0eRAw4qHa89LXEx1LXMSPfhDJYRb59BtlLKg2WPT2l6qYl1svtGkrLYckyA1S+t5+2ATm37WCui0LSynsckDNH5zTxAchbQtkx08hDHYiW6NgC0enHBzEZ102UDH8QORdEckjEzZrNWkRydzyx17uGnDXqbUnGZ6dRPjSY91q2TqwjFuvTxLo5Zn5Qo/pumRSFcTLQtybEhGE0fQrDhhJ0VvH2lTnnHPhGtsmWan469apERjI2MH3qN7+7MEfH6ql29CbV7PvsMG32k6yU2XDhEKyZw66eJaRdrXR7CzCcqUNC3zwgymPJRCH4KRRLINimpL14A5Y4GDeOqbsPRVcfuN7Xj44pav/hFfrNT2kr2rsqf2Ibp5pEA14ZIImUyW3t5REkkTXRGQ/DGGhtLginhqCWknQDE5hKf5UFSF9Lj020Q2ul5V1AR2hr+8vuP8Vlc2zMPRxoSjnx7XBC14sDoydahSGq7KdO/HFyrBchxCVfX4fDKp4T7SCQejYODZLrYgIqgKFsNIgQqEYob8mW6yiUyb7Z64LVK/+B85xznnJ3AWzqTzuIX46mr5wLs+UUTyIriBCjRNxguHMJIFDLEEvXEOVRWnSJ0+jCd4CJoGjoedM1CLcXQziW3nMV2TSMBeOx7vWZvPt1r+cMPzE8KunaUkFn0vNrvtqXj34c1W6gzxlEQ6naIoBahtnkMwoFMwIVzSRNguMt53Aj2s4nkSlgPoGqLkICsRNF0gl8rYWuP8+11/w/OOJDEhHPKLCIpOXmi+M9AgP+maiesLifF2T1Rn5ZNj5Lo/Qc/GcPMmhdoqlEgIGzCK4PiCmJKK68p4KfF3qYGuF0qCRUkJTzleUbvQyWRTuE5xYthxQbBs7EISAbkzUFG3VfXXbK2YFi3X/eryfKKnqVBItNjJxDzH8erddC4SqWwcN5WyTtlyO1RP/Lh3eHD76MB40swmiDVJyDLYRhpc5+ub6tse/wWKbvSQEAw1awAAAABJRU5ErkJggg==" title="备案号:津ICP备-2021000769号--2">
	</a>
	<a style="margin-inline:5px" target="_blank" href="https://tongji.baidu.com/web/10000399748/overview/index?siteId=17522448">
		<img src="https://img.shields.io/badge/%E7%99%BE%E5%BA%A6-%E7%BB%9F%E8%AE%A1-blue?style=flat&logo=baidu" title="本站采用百度统计进行网站管理与维护">
	</a>
	<a style="margin-inline:5px" target="_blank" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
		<img src="https://img.shields.io/badge/Copyright-BY--NC--SA%204.0-d42328?style=flat&logo=Claris" title="本站采用知识共享署名-非商业性使用-相同方式共享4.0国际许可协议进行许可">
	</a>
</p>
```

2. 到[HTML压缩网站](http://tool.ggo.net/htmlpack/)将代码压缩成一行，复制到footer属性中就完成Github-badge效果了

```yaml
# Footer Settings
# --------------------------------------
footer:
  owner:
    enable: false
    since: 2021
  custom_text: <p><a style="margin-inline:5px"target="_blank"href="https://github.com/"><img src="https://img.shields.io/badge/Hosted-Github-brightgreen?style=flat&logo=GitHub"title="本站项目由Gtihub托管"></a><a style="margin-inline:5px"target="_blank"href="https://hexo.io/"><img src="https://img.shields.io/badge/Frame-Hexo-blue?style=flat&logo=hexo"title="博客框架为Hexo"></a><a style="margin-inline:5px"target="_blank"href="https://butterfly.js.org/"><img src="https://img.shields.io/badge/Theme-Butterfly-6513df?logoColor=white&style=flat&logo=buefy"title="主题采用butterfly"></a><a style="margin-inline:5px"target="_blank"href="https://aliyun.com/product/cdn"><img src="https://img.shields.io/badge/CDN-%E9%98%BF%E9%87%8C%E4%BA%91-orange?style=flat&logo=alibabacloud"title="本站使用阿里云为静态资源提供CDN加速"></a><a style="margin-inline:5px"target="_blank"href="https://beian.miit.gov.cn/"><img src="https://img.shields.io/badge/%E6%B4%A5ICP%E5%A4%87-2021000769%E5%8F%B7--2-red?logo=data:image/png;base64,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"title="备案号:津ICP备-2021000769号-2"></a><a style="margin-inline:5px"target="_blank"href="https://tongji.baidu.com/web/10000399748/overview/index?siteId=17522448"><img src="https://img.shields.io/badge/%E7%99%BE%E5%BA%A6-%E7%BB%9F%E8%AE%A1-blue?style=flat&logo=baidu"title="本站采用百度统计进行网站管理与维护"></a><a style="margin-inline:5px"target="_blank"href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img src="https://img.shields.io/badge/Copyright-BY--NC--SA%204.0-d42328?style=flat&logo=Claris"title="本站采用知识共享署名-非商业性使用-相同方式共享4.0国际许可协议进行许可"></a></p>
  copyright: false # Copyright of theme and framework
```


### 3.10 评论系统valine

**开启评论**

在主题配置文件的`comments`中填写需要用的评论

```yaml
comments:
  # Up to two comments system, the first will be shown as default
  # Choose: Disqus/Disqusjs/Livere/Gitalk/Valine/Waline/Utterances/Facebook Comments/Twikoo/Giscus
  use: Valine # Valine,Disqus
  text: true # Display the comment name next to the button
  # lazyload: The comment system will be load when comment element enters the browser's viewport.
  # If you set it to true, the comment count will be invalid
  lazyload: false
  count: true # Display comment count in post's top_img
  card_post_count: false # Display comment count in Home Page
```

| 参数            | 解释                                                                                                           |
| --------------- | -------------------------------------------------------------------------------------------------------------- |
| use             | 使用的评论（请注意，最多支持两个，如果不需要请留空）                                                           |
| text            | 是否显示评论服务商的名字                                                                                       |
| lazyload        | 是否为评论开启lazyload，开启后，只有滚动到评论位置时才会加载评论所需要的资源（开启lazyload后，评论数将不显示） |
| count           | 是否在文章顶部显示评论数(livere、Giscus 和utterances 不支持评论数显示)                                         |
| card_post_count | 是否在首页文章卡片显示评论数(gitalk、livere 、Giscus 和utterances 不支持评论数显示)                            |


**配置Valine**

参考[Valine文档](https://valine.js.org/quickstart.html)与[Github项目](https://github.com/xCss/Valine)

1. 注册LeanCloud：[国内版](https://leancloud.cn/dashboard/login.html#/signup)注册使用需要域名备案，如果域名没有备案请使用[国际版](https://console.leancloud.app/register)。
2. 进入控制台，点击左下角创建应用

![](https://img.mahaofei.com/img/20220410162655.png)

3. 应用创建好后，进入应用界面，点击左下角的【设置-应用凭证】，可以看到APPID

![](https://img.mahaofei.com/img/20220410162923.png)

4. 将APPID和APPKey复制到主题配置文件的`valine`下

5. 重新部署自己的网站，就可以看到评论系统了

6. 在LeanCloud中：`登录>选择你创建的应用>存储>选择Class Comment`，然后就可以管理评论了

**Valine高级配置**

1. 头像配置

| 参数值       | 表现形式                                                                                                            | 备注                             |
| ------------ | ------------------------------------------------------------------------------------------------------------------- | -------------------------------- |
| 空字符串`''` | ![Gravatar官方图形](https://gravatar.loli.net/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40)                         | Gravatar官方图形                 |
| `mp`         | ![神秘人(一个灰白头像)](https://gravatar.loli.net/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&d=mp)                | 神秘人(一个灰白头像)             |
| `identicon`  | ![抽象几何图形](https://gravatar.loli.net/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&d=identicon)                 | 抽象几何图形                     |
| `monsterid`  | ![小怪物](https://gravatar.loli.net/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&d=monsterid)                       | 小怪物                           |
| `wavatar`    | ![用不同面孔和背景组合生成的头像](https://gravatar.loli.net/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&d=wavatar) | 用不同面孔和背景组合生成的头像   |
| `retro`      | ![八位像素复古头像](https://gravatar.loli.net/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&d=retro)                 | 八位像素复古头像                 |
| `robohash`   | ![机器人](https://gravatar.loli.net/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&d=robohash)                        | 一种具有不同颜色、面部等的机器人 |
| `hide`       |                                                                                                                     | 不显示头像                       |

2. 自定义表情

在Hexo根目录下的`source/_data/`下创建一个`valine.json`文件，文件内容为自定义表情，比如我们要用`Bilibili`的表情包(效果可以在评论区查看):

```json
{ 
"tv_doge" : "6ea59c827c414b4a2955fe79e0f6fd3dcd515e24.png" , 
"tv_亲亲" : "a8111ad55953ef5e3be3327ef94eb4a39d535d06.png" , 
"tv_偷笑" : "bb690d4107620f1c15cff29509db529a73aee261.png" , 
"tv_再见" : "180129b8ea851044ce71caf55cc8ce44bd4a4fc8.png" , 
"tv_冷漠" : "b9cbc755c2b3ee43be07ca13de84e5b699a3f101.png" , 
"tv_发怒" : "34ba3cd204d5b05fec70ce08fa9fa0dd612409ff.png" , 
"tv_发财" : "34db290afd2963723c6eb3c4560667db7253a21a.png", 
"tv_可爱" :"9e55fd9b500ac4b96613539f1ce2f9499e314ed9.png" , 
"tv_吐血" : "09dd16a7aa59b77baa1155d47484409624470c77.png" , 
"tv_呆" : "fe1179ebaa191569b0d31cecafe7a2cd1c951c9d.png" , 
"tv_呕吐" : "9f996894a39e282ccf5e66856af49483f81870f3.png" , 
"tv_困" : "241ee304e44c0af029adceb294399391e4737ef2.png" , 
"tv_坏笑" : "1f0b87f731a671079842116e0991c91c2c88645a.png" , 
"tv_大佬" : "093c1e2c490161aca397afc45573c877cdead616.png" , 
"tv_大哭" :"23269aeb35f99daee28dda129676f6e9ea87934f.png" , 
"tv_委屈": "d04dba7b5465779e9755d2ab6f0a897b9b33bb77.png" , 
"tv_害羞" : "a37683fb5642fa3ddfc7f4e5525fd13e42a2bdb1.png" , 
"tv_尴尬" : "7cfa62dafc59798a3d3fb262d421eeeff166cfa4.png" , 
"tv_微笑" : "70dc5c7b56f93eb61bddba11e28fb1d18fddcd4c.png" , 
"tv_思考" : "90cf159733e558137ed20aa04d09964436f618a1.png" , 
"tv_惊吓" : "0d15c7e2ee58e935adc6a7193ee042388adc22af.png"
// 更多表情
}
```

**主页显示最近评论**
```yaml
# Aside widget - Newest Comments 
newest_comments : 
  enable: true
  sort_order : # Don 't modify the setting unless you know how it works
  limit: 6
  storage: 10 # unit: mins, save data to localStorage
  avatar: true
```



![](https://cdn.jsdelivr.net/gh/jerryc127/CDN/img/hexo-theme-butterfly-docs-newest-comments.png)



### 3.11 评论系统twikoo

**配置云环境**

1. 打开腾讯云，[创建云环境](https://console.cloud.tencent.com/tcb/env/login?rid=4)
> 应用模板：选择空模板，套餐选择包月免费套餐
> 环境信息：推荐创建上海环境。如选择广州环境，需要在 `twikoo.init()` 时额外指定环境 `region: "ap-guangzhou"`； 环境名称自由填写；推荐选择计费方式`包年包月`，套餐版本`免费版`
![](https://img.mahaofei.com/img/20220412085817.png)

2. 进入【控制台-登录授权】，开启【匿名登陆】

![](https://img.mahaofei.com/img/20220412090355.png)

3. 进入【控制台-安全配置】，添加自己的域名和`localhost:4000`
>当你的博客使用了二级域名的场合，需要将完整的二级域名填入，而不是只填入主域名。


4. 进入【控制台-云函数】，新建云函数

![](https://img.mahaofei.com/img/20220412090822.png)


5. 2.  函数名称请填写：`twikoo`，创建方式请选择：`空白函数`，运行环境请选择：`Nodejs 10.15`，函数内存请选择：`128MB`，点击“下一步”

![](https://img.mahaofei.com/img/20220412090902.png)


6. 清空输入框中的示例代码，复制以下代码、粘贴到“函数代码”输入框中，点击“确定”

```
exports.main = require('twikoo-func').main
```

![](https://img.mahaofei.com/img/20220412091047.png)


7. 创建完成后，点击“twikoo"进入云函数详情页，进入“函数代码”标签，点击“文件 - 新建文件”，输入 `package.json`，复制以下代码、粘贴到代码框中，点击“保存并安装依赖”

```
{ "dependencies": { "twikoo-func": "1.5.3" } }
```

![](https://img.mahaofei.com/img/20220412091344.png)

**Butterfly配置**

首先再主题配置文件中启用twikoo评论

```yaml
# Comments System
# --------------------------------------

comments:
  # Up to two comments system, the first will be shown as default
  # Choose: Disqus/Disqusjs/Livere/Gitalk/Valine/Waline/Utterances/Facebook Comments/Twikoo/Giscus
  use: twikoo # Valine,Disqus
  text: true # Display the comment name next to the button
  # lazyload: The comment system will be load when comment element enters the browser's viewport.
  # If you set it to true, the comment count will be invalid
  lazyload: false
  count: true # Display comment count in post's top_img
  card_post_count: false # Display comment count in Home Page

```

进入【环境总览】，复制环境ID到主题配置文件的twikoo配置项中，这时使用`hexo clean & hexo s`就可以看到twikoo评论框了

下载私钥，然后用记事本打开私钥文件，将内容复制。

![](https://img.mahaofei.com/img/20220412091956.png)

打开`http://localhost:4000/`，再twikoo右下角点击齿轮，输入复制的密钥，并设置密码，即可完成注册

![](https://img.mahaofei.com/img/20220412092724.png)


大功告成！

![](https://img.mahaofei.com/img/20220412094538.png)
### 3.12 Artitalk说说

1.  前往 [LeanCloud 国际版](https://leancloud.app/)，注册账号。
2.  注册完成之后根据 LeanCloud 的提示绑定手机号和邮箱。
3.  绑定完成之后点击`创建应用`，应用名称随意，接着在`结构化数据`中创建 `class`，命名为 `shuoshuo`。
4.  在你新建的应用中找到`结构化数据`下的`用户`。点击`添加用户`，输入想用的用户名及密码。
5.  回到`结构化数据`中，点击 `class` 下的 `shuoshuo`。找到权限，在 `Class 访问权限`中将 `add_fields` 以及 `create` 权限设置为指定用户，输入你刚才输入的用户名会自动匹配。为了安全起见，将 `delete` 和 `update` 也设置为跟它们一样的权限。
6.  然后新建一个名为`atComment`的class，权限什么的使用默认的即可。
7.  点击 `class` 下的 `_User` 添加列，列名称为 `img`，默认值填上你这个账号想要用的发布说说的头像url，这一项不进行配置，说说头像会显示为默认头像 —— Artitalk 的 logo。
8.  在最菜单栏中找到设置-> 应用 keys，记下来 `AppID` 和 `AppKey` ，一会会用。
9.  最后将 `_User` 中的权限全部调为指定用户，或者数据创建者，为了保证不被篡改用户数据以达到强制发布说说。
10. 安装`hexo-butterfly-artitalk`插件

```shell
npm install hexo-butterfly-artitalk
```

11. 在主题配置文件中添加如下配置

```yaml
# Artitalk
# see https://artitalk.js.org/
artitalk:
  enable: true
  appId:  # 【必须】LeanCloud 创建应用中的 AppID
  appKey:  # 【必须】LeanCloud 创建应用中的 AppKEY
  path:  # 【任选】Artitalk的路径名称（默认为artitalk，生成的页面为artitalk/index.html）
  js:  # 【任选】更换Artitalk的js CDN（默认为https://cdn.jsdelivr.net/npm/artitalk）
  option:  # 【任选】Artitalk 需要的额外配置
  front_matter:  # 【任选】Arttalk页面的front_matter配置
```

12. 默认的访问网址：`/artitalk/index.html`

![](https://img.mahaofei.com/img/20220412165755.png)

### 3.13 动态分类条

参考[【张洪老师的博客】](https://blog.zhheo.com/p/bc61964d.html)，分类的添加使用纯手工的方式。

![](https://img.mahaofei.com/img/20220427195336.png)


**新建文件**

新建一个文件：`themes/butterfly/layout/includes/categoryBar.pug`

```pug
#category-bar
    .category-bar-items#category-bar-items
        .category-bar-item(id='首页')
            a(href="/") 首页
        .category-bar-item(id='机器人')
            a(href="/categories/机器人/") 机器人
        .category-bar-item(id='程序设计')
            a(href="/categories/程序设计/") 程序设计
        .category-bar-item(id='嵌入式')
            a(href="/categories/嵌入式/") 嵌入式
        .category-bar-item(id='机械')
            a(href="/categories/机械/") 机械
        .category-bar-item(id='破解技巧')
            a(href="/categories/破解技巧/") 破解技巧
        .category-bar-item(id='随笔')
            a(href="/categories/随笔/") 随笔
    a.category-bar-more(href="/categories/") 更多
```

**引用文件**

编辑`themes/butterfly/layout/index.pug`

在`+postUI`上一行添加`include includes/categoryBar.pug`，并保持缩进相同。

```pug
extends includes/layout.pug

block content
  include ./includes/mixins/post-ui.pug
  #recent-posts.recent-posts
	include includes/categoryBar.pug
    +postUI
    include includes/pagination.pug
```

编辑`themes/butterfly/layout/category.pug`，在`#category`下方添加以下代码

```pug
#category  
  .category-in-bar  
    .category-in-bar-tips  
      | 分类  
    include includes/categoryBar.pug
```

**引用CSS和JS**

链接: https://pan.baidu.com/s/13iOkTwWDbtzlFzRLTdQl9Q?pwd=9e32 
提取码: 9e32

将其中的`MainColor.css`, `categoryBar.css`两个文件复制到`themes/butterfly/source/css`目录下，将`categoryBar.js`复制到`themes/butterfly/source/js`目录下，然后在主题配置文件`_config.yml`中引用这三个文件。

```yaml
inject:
  head:
    - <link rel="stylesheet" href="/css/categoryBar.css">
    - <link rel="stylesheet" href="/css/MainColor.css">
  bottom:
    - <script src="/js/categoryBar.js"></script>
```


### 3.14 Butterfly首页隐藏文章

打开文件：`themes/butterfly/layout/includes/mixins/post-ui.pug`

注意，主要是添加了`if article.hide !== true`这一行，然后这一行后全部需要按下tab缩进一层。

```pug
mixin postUI(posts)  
  each article , index in page.posts.data  
    if article.hide !== true  
      .recent-post-item
```

在md文件的头部信息中添加`hide: true`

### 3.15 相关推荐侧边栏化

参考文章：[《Butterfly 布局调整 ——— 相关推荐版块侧栏卡片化》](https://akilar.top/posts/194e1534/)


![](https://img.mahaofei.com/img/20220428112259.png)


修改 `[Blogroot]\themes\butterfly\scripts\helpers\related_post.js`, 从大概 47 行开始到 70 行的部分。

```js
if (relatedPosts.length > 0) {  
    result += '<div class="card-widget card-recommend-post">'  
    result += `<div class="item-headline"><i class="fas fa-dharmachakra"></i><span>${headlineLang}</span></div>`  
    result += '<div class="aside-list">'  
    for (let i = 0; i < Math.min(relatedPosts.length, limitNum); i++) {  
      const cover =  
        relatedPosts[i].cover === false  
          ? relatedPosts[i].randomcover  
          : relatedPosts[i].cover  
      result += `<div class="aside-list-item">`  
      result += `<a class="thumbnail" href="${this.url_for(relatedPosts[i].path)}" title="${relatedPosts[i].title}"><img src="${this.url_for(cover)}" alt="${relatedPosts[i].title}"></a>`  
      result += `<div class="content">`  
      result += `<a class="title" href="${this.url_for(relatedPosts[i].path)}" title="${relatedPosts[i].title}">${relatedPosts[i].title}</a>`  
      if (dateType === 'created') {  
        result += `<time datetime="${this.date(relatedPosts[i].created, hexoConfig.date_format)}" title="发表于 ${this.date(relatedPosts[i].created, hexoConfig.date_format)}">${this.date(relatedPosts[i].created, hexoConfig.date_format)}</time>`  
      } else {  
        result += `<time datetime="${this.date(relatedPosts[i].updated, hexoConfig.date_format)}" title="发表于 ${this.date(relatedPosts[i].updated, hexoConfig.date_format)}">${this.date(relatedPosts[i].updated, hexoConfig.date_format)}</time>`  
      }  
      result += `</div></div>`  
    }  
    result += '</div></div>'  
    return result  
  }
```

因为原本的版块是在文章下方，而现在我们需要把它改到侧栏。所以需要修改 `[Blogroot]\themes\butterfly\layout\post.pug` 大约 26 行的位置先移除在文章底部的推荐版块。

```diff
  if theme.post_pagination  
    include includes/pagination.pug  
- if theme.related_post && theme.related_post.enable  
-   != related_posts(page,site.posts)  
  
  if page.comments !== false && theme.comments && theme.comments.use
```

然后修改 `[Blogroot]\themes\butterfly\layout\includes\widget\index.pug`, 这个文件每个版本都长得不太一样，这里仅供参考。因为感觉文章也最新文章和推荐文章同时存在，最新文章就显得有点多余了，所以我把最新文章的侧栏卡片注释了。

```diff
#aside-content.aside-content  
  //- post  
  if is_post()  
    if showToc && theme.toc.style_simple  
      .sticky_layout  
        include ./card_post_toc.pug  
    else  
      !=partial('includes/custom/SAO_card_player', {}, {cache:theme.fragment_cache})  
      !=partial('includes/widget/card_announcement', {}, {cache:theme.fragment_cache})  
      !=partial('includes/widget/card_top_self', {}, {cache:theme.fragment_cache})    
      .sticky_layout  
        if showToc  
          include ./card_post_toc.pug  
+       if theme.related_post && theme.related_post.enable  
+         != related_posts(page,site.posts)  
-       - !=partial('includes/widget/card_recent_post', {}, {cache:theme.fragment_cache})  
+       //- !=partial('includes/widget/card_recent_post', {}, {cache:theme.fragment_cache})  
        !=partial('includes/widget/card_ad', {}, {cache:theme.fragment_cache})
```

改动完成后运行 `hexo clean`,`hexo generate`,`hexo server` 三件套就能看到完成效果了。

### 3.16 侧边栏添加历史上的今天

在`[Blogroot]\themes\butterfly\layout\includes\widget\` 中新建一个`card_history.pug`文件，内容如下。

```pug
.card-widget.card-history
  .card-content
    .item-headline
       i.fas.fa-clock.fa-spin
       span= _p('那年今日')
    #history-baidu(style='height: 60px;overflow: hidden;')
      #history-container.history_swiper-container(style="width: 100%;height: 100%;")
          #history_container_wrapper.swiper-wrapper(style="height:20px" )
```

修改位于 `[Blogroot]\themes\butterfly\layout\includes\widget\` 中的`index.pug`。

```diff
#aside-content.aside-content
  //- post
  if is_post()
    - const tocStyle = page.toc_style_simple
    - const tocStyleVal = tocStyle === true || tocStyle === false ? tocStyle : theme.toc.style_simple
    if showToc && tocStyleVal
      .sticky_layout
        include ./card_post_toc.pug
    else
      !=partial('includes/widget/card_author', {}, {cache: true})
      !=partial('includes/widget/card_announcement', {}, {cache: true})
      !=partial('includes/widget/card_top_self', {}, {cache: true})
      .sticky_layout
        if showToc
          include ./card_post_toc.pug
        if theme.related_post && theme.related_post.enable
+         !=partial('includes/widget/card_history', {}, {cache: true})
          !=partial('includes/widget/card_recent_post', {}, {cache:theme.fragment_cache})
        !=partial('includes/widget/card_ad', {}, {cache: true})
  else
    //- page
    !=partial('includes/widget/card_author', {}, {cache: true})
    !=partial('includes/widget/card_announcement', {}, {cache: true})
    !=partial('includes/widget/card_top_self', {}, {cache: true})      

    .sticky_layout
      if showToc
        include ./card_post_toc.pug
+     !=partial('includes/widget/card_history', {}, {cache: true})
      !=partial('includes/widget/card_recent_post', {}, {cache: true})
      !=partial('includes/widget/card_ad', {}, {cache: true})
      !=partial('includes/widget/card_newest_comment', {}, {cache: true})
      !=partial('includes/widget/card_categories', {}, {cache: true})
      !=partial('includes/widget/card_tags', {}, {cache: true})
      !=partial('includes/widget/card_archives', {}, {cache: true})
      !=partial('includes/widget/card_webinfo', {}, {cache: true})
      !=partial('includes/widget/card_bottom_self', {}, {cache: true})
```

打开 主题配置文件`_config.yml` 搜索到 `aside:` 处，添加开关：

```yaml
aside:  
  enable: true  
  mobile: true # display on mobile  
  position: left # left or right  
  card_history: # 添加开关名称  
    enable: true # 打开card_history开关  
  card_author:  
    enable: true
```

然后搜索`inject:`，进行如下修改

```yaml
inject:  
  head:  
    - <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">  
    - <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Zfour/Butterfly-card-history/baiduhistory/css/main.css">  
  
  bottom:  
    - <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>  
    - <script src="https://cdn.jsdelivr.net/gh/Zfour/Butterfly-card-history/baiduhistory/js/main.js"></script>
```

### 3.17 白天/黑夜模式切换动画

参考[《Akilarの糖果屋-添加白天夜间模式转换动画》](https://akilar.top/posts/d9550c81/)

新建 `[Blogroot]\themes\butterfly\layout\includes\custom\light_dark.pug`, 这部分其实实质上就是一个 svg 文件，通过 js 操作它的旋转显隐，淡入淡出实现动画效果。

```pug
svg(aria-hidden='true', style='position:absolute; overflow:hidden; width:0; height:0')  
  symbol#icon-sun(viewBox='0 0 1024 1024')  
    path(d='M960 512l-128 128v192h-192l-128 128-128-128H192v-192l-128-128 128-128V192h192l128-128 128 128h192v192z', fill='#FFD878', p-id='8420')  
    path(d='M736 512a224 224 0 1 0-448 0 224 224 0 1 0 448 0z', fill='#FFE4A9', p-id='8421')  
    path(d='M512 109.248L626.752 224H800v173.248L914.752 512 800 626.752V800h-173.248L512 914.752 397.248 800H224v-173.248L109.248 512 224 397.248V224h173.248L512 109.248M512 64l-128 128H192v192l-128 128 128 128v192h192l128 128 128-128h192v-192l128-128-128-128V192h-192l-128-128z', fill='#4D5152', p-id='8422')  
    path(d='M512 320c105.888 0 192 86.112 192 192s-86.112 192-192 192-192-86.112-192-192 86.112-192 192-192m0-32a224 224 0 1 0 0 448 224 224 0 0 0 0-448z', fill='#4D5152', p-id='8423')  
  symbol#icon-moon(viewBox='0 0 1024 1024')  
    path(d='M611.370667 167.082667a445.013333 445.013333 0 0 1-38.4 161.834666 477.824 477.824 0 0 1-244.736 244.394667 445.141333 445.141333 0 0 1-161.109334 38.058667 85.077333 85.077333 0 0 0-65.066666 135.722666A462.08 462.08 0 1 0 747.093333 102.058667a85.077333 85.077333 0 0 0-135.722666 65.024z', fill='#FFB531', p-id='11345')  
    path(d='M329.728 274.133333l35.157333-35.157333a21.333333 21.333333 0 1 0-30.165333-30.165333l-35.157333 35.157333-35.114667-35.157333a21.333333 21.333333 0 0 0-30.165333 30.165333l35.114666 35.157333-35.114666 35.157334a21.333333 21.333333 0 1 0 30.165333 30.165333l35.114667-35.157333 35.157333 35.157333a21.333333 21.333333 0 1 0 30.165333-30.165333z', fill='#030835', p-id='11346')
```

新建 `[Blogroot]\themes\butterfly\source\css\_layout\light_dark.styl`

```styl
.Cuteen_DarkSky,  
.Cuteen_DarkSky:before  
  content ''  
  position fixed  
  left 0  
  right 0  
  top 0  
  bottom 0  
  z-index 88888888  
  
.Cuteen_DarkSky  
  background linear-gradient(#feb8b0, #fef9db)  
  &:before  
    transition 2s ease all  
    opacity 0  
    background linear-gradient(#4c3f6d, #6c62bb, #93b1ed)  
  
.DarkMode  
  .Cuteen_DarkSky  
    &:before  
      opacity 1  
  
.Cuteen_DarkPlanet  
  z-index 99999999  
  position fixed  
  left -50%  
  top -50%  
  width 200%  
  height 200%  
  -webkit-animation CuteenPlanetMove 2s cubic-bezier(0.7, 0, 0, 1)  
  animation CuteenPlanetMove 2s cubic-bezier(0.7, 0, 0, 1)  
  transform-origin center bottom  
  
  
@-webkit-keyframes CuteenPlanetMove {  
  0% {  
    transform: rotate(0);  
  }  
  to {  
    transform: rotate(360deg);  
  }  
}  
@keyframes CuteenPlanetMove {  
  0% {  
    transform: rotate(0);  
  }  
  to {  
    transform: rotate(360deg);  
  }  
}  
.Cuteen_DarkPlanet  
  &:after  
    position absolute  
    left 35%  
    top 40%  
    width 9.375rem  
    height 9.375rem  
    border-radius 50%  
    content ''  
    background linear-gradient(#fefefe, #fffbe8)  
  
.search  
  span  
    display none  
  
.menus_item  
  a  
    text-decoration none!important  
```

新建 `[Blogroot]\themes\butterfly\source\js\sun_moon.js`

```js
function switchNightMode() {  
  document.querySelector('body').insertAdjacentHTML('beforeend', '<div class="Cuteen_DarkSky"><div class="Cuteen_DarkPlanet"></div></div>'),  
    setTimeout(function() {  
      document.querySelector('body').classList.contains('DarkMode') ? (document.querySelector('body').classList.remove('DarkMode'), localStorage.setItem('isDark', '0'), document.getElementById('modeicon').setAttribute('xlink:href', '#icon-moon')) : (document.querySelector('body').classList.add('DarkMode'), localStorage.setItem('isDark', '1'), document.getElementById('modeicon').setAttribute('xlink:href', '#icon-sun')),  
        setTimeout(function() {  
          document.getElementsByClassName('Cuteen_DarkSky')[0].style.transition = 'opacity 3s';  
          document.getElementsByClassName('Cuteen_DarkSky')[0].style.opacity = '0';  
          setTimeout(function() {  
            document.getElementsByClassName('Cuteen_DarkSky')[0].remove();  
          }, 1e3);  
        }, 2e3)  
    })  
  const nowMode = document.documentElement.getAttribute('data-theme') === 'dark' ? 'dark' : 'light'  
  if (nowMode === 'light') {  
    activateDarkMode()  
    saveToLocal.set('theme', 'dark', 2)  
    GLOBAL_CONFIG.Snackbar !== undefined && btf.snackbarShow(GLOBAL_CONFIG.Snackbar.day_to_night)  
    document.getElementById('modeicon').setAttribute('xlink:href', '#icon-sun')  
  } else {  
    activateLightMode()  
    saveToLocal.set('theme', 'light', 2)  
    document.querySelector('body').classList.add('DarkMode'), document.getElementById('modeicon').setAttribute('xlink:href', '#icon-moon')  
  }  
  // handle some cases  
  typeof utterancesTheme === 'function' && utterancesTheme()  
  typeof FB === 'object' && window.loadFBComment()  
  window.DISQUS && document.getElementById('disqus_thread').children.length && setTimeout(() => window.disqusReset(), 200)  
}
```

修改 `[Blogroot]\themes\butterfly\layout\includes\rightside.pug`, 把原本的昼夜切换按钮替换掉

```diff
  when 'translate'  
    if translate.enable  
      button#translateLink(type="button" title=_p('rightside.translate_title'))= translate.default  
  when 'darkmode'  
    if darkmode.enable && darkmode.button  
-     button#darkmode(type="button" title=_p('rightside.night_mode_title'))  
-       i.fas.fa-adjust  
+     a.hidden(onclick='switchNightMode()',  title=_p('rightside.night_mode_title'))  
+       i.fas.fa-adjust  
+         use#modeicon(xlink:href='#icon-moon')
```

修改 `[Blogroot]\_config.butterfly.yml`, 引入一下 js

```yaml
inject:  
  head:  
  bottome:  
    - <script src="/js/sun_moon.js" async></script>
```


### 3.18 twikoo评论气泡风格

参考[《Akilarの糖果屋-twikoo 评论块气泡风格魔改美化》](https://akilar.top/posts/d99b5f01/)

新建 `[Blogroot]\themes\butterfly\source\css\custom\twikoo_beautify.css`

```css
/* 调整表情大小 */
.OwO .OwO-body .OwO-items-image .OwO-item {
    max-width: calc(25% - 10px) !important;
}

/* 调整表情位置 */
.tk-content img.tk-owo-emotion {
    vertical-align: bottom;
}

/* 自定义twikoo评论输入框高度 */
.tk-input[data-v-619b4c52] .el-textarea__inner {
    height: 130px !important;
}

/* 输入评论时自动隐藏输入框背景图片 */
.tk-input[data-v-619b4c52] .el-textarea__inner:focus {
    background-image: none !important;
}

/* 调整楼中楼样式 ，整体左移，贴合气泡化效果 */
.tk-replies {
    left: -70px;
    width: calc(100% + 70px);
}

/* 头像宽度调整 rem单位与全局字体大小挂钩，需配合自己情况调整大小以保证头像显示完整 */
.tk-avatar {
    width: 3rem !important;
    height: 3rem !important;
}

.tk-avatar img {
    width: 3rem !important;
    height: 3rem !important;
}

/* 回复框左移，避免窄屏时出框 */
.tk-comments-container .tk-submit {
    position: relative;
    left: -70px;
    width: 110%;
}

/* 评论块气泡化修改 */
.tk-content {
    background: #00a6ff; /* 默认模式访客气泡配色 */
    padding: 10px;
    left: 8px;
    color: white; /* 默认模式访客气泡字体配色 */
    border-radius: 10px;
    font-size: 16px !important;
    width: fit-content;
    max-width: 100%;
    position: relative !important;
    overflow: visible !important;
    max-height: none !important;
}

/* 修复图片出框 */
.tk-content img {
    max-width: 100% !important;
}

/* 修复过长文本出框 */
.tk-content pre {
    white-space: pre-wrap;
    word-wrap: break-word;
}

.tk-content a {
    color: #eeecaa; /* 默认模式超链接配色 */
}

.tk-content::before {
    content: '';
    width: 0;
    height: 0;
    position: absolute;
    top: 20px;
    left: -13px;
    border-top: 2px solid transparent;
    border-bottom: 20px solid transparent;
    border-right: 15px solid #00a6ff; /* 默认模式访客气泡小三角配色 */
    border-left: 0 solid transparent;
}

.tk-master .tk-content {
    background: #ff8080; /* 默认模式博主气泡配色 */
    color: white; /* 默认模式博主气泡字体配色 */
    width: fit-content;
    max-width: 100%;
    left: 9px;
}

.tk-master .tk-content a {
    color: #eeecaa;
}

.tk-master .tk-content::before {
    content: '';
    width: 0;
    height: 0;
    position: absolute;
    top: 20px;
    left: -13px;
    border-top: 2px solid transparent;
    border-bottom: 20px solid transparent;
    border-right: 15px solid #ff8080; /* 默认模式博主气泡小三角配色 */
    border-left: 0 solid transparent;
}

.tk-row[data-v-d82ce9a0] {
    max-width: 100%;
    width: fit-content;
    margin-left: 10px;
}

.tk-avatar {
    border-radius: 50%;
    margin-top: 15px;
}

.tk-master .tk-avatar {
    position: relative;
    left: 6px;
}

/* 夜间模式配色，具体比照上方默认模式class */
[data-theme="dark"] .tk-content {
    background: #1d1d1f;
    color: white;
}

[data-theme="dark"] .tk-content a {
    color: #dfa036;
}

[data-theme="dark"] .tk-content::before {
    border-right: 15px solid #1d1d1f;
}

[data-theme="dark"] .tk-master .tk-content {
    background: #1c1c1e;
    color: white;
}

[data-theme="dark"] .tk-master .tk-content a {
    color: #dfa036;
}

[data-theme="dark"] .tk-master .tk-content::before {
    border-top: 2px solid transparent;
    border-bottom: 20px solid transparent;
    border-right: 15px solid #1c1c1e;
    border-left: 0 solid transparent;
}

/* 自适应内容 */
@media screen and (min-width: 1024px) {
    /* 设置宽度上限，避免挤压博主头像 */
    .tk-content {
        max-width: 75%;
        width: fit-content;
    }

    .tk-master .tk-content {
        width: 75%;
        left: 80px;
    }

    .tk-master .tk-content::before {
        left: 100%;
        border-left: 15px solid #ff8080;
        border-right: 0 solid transparent;
    }

    .tk-master .tk-avatar {
        position: relative;
        left: calc(75% + 120px);
    }

    .tk-master .tk-row[data-v-d82ce9a0] {
        position: relative;
        top: 0;
        left: calc(55%);
    }

    [data-theme="dark"] .tk-master .tk-content::before {
        border-left: 15px solid #1c1c1e;
        border-right: 0 solid transparent;
    }
}

/* 设备名称常态隐藏，悬停评论时显示 */
.tk-extras {
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
}

.tk-content:hover + .tk-extras {
    -webkit-animation: tk-extras-fadeIn 0.5s linear;
    -moz-animation: tk-extras-fadeIn 0.5s linear;
    -o-animation: tk-extras-fadeIn 0.5s linear;
    -ms-animation: tk-extras-fadeIn 0.5s linear;
    animation: tk-extras-fadeIn 0.5s linear;
    -webkit-animation-fill-mode: forwards;
    -moz-animation-fill-mode: forwards;
    -o-animation-fill-mode: forwards;
    -ms-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}

@-moz-keyframes tk-extras-fadeIn {
    from {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
    }
    to {
        opacity: 1;
        -ms-filter: none;
        filter: none;
    }
}

@-webkit-keyframes tk-extras-fadeIn {
    from {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
    }
    to {
        opacity: 1;
        -ms-filter: none;
        filter: none;
    }
}

@-o-keyframes tk-extras-fadeIn {
    from {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
    }
    to {
        opacity: 1;
        -ms-filter: none;
        filter: none;
    }
}

@keyframes tk-extras-fadeIn {
    from {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
        filter: alpha(opacity=0);
    }
    to {
        opacity: 1;
        -ms-filter: none;
        filter: none;
    }
}
```

修改 `[Blogroot]\_config.butterfly.yml` 的 `inject` 配置项

```diff
  inject:  
    head:  
+     - <link rel="stylesheet" href="/css/custom/twikoo_beautify.css"  media="defer" onload="this.media='all'">
```

### 3.19 留言板

参考[《Akilarの糖果屋-信笺样式留言板》](https://akilar.top/posts/e2d3c450/)

安装插件

```shell
npm install hexo-butterfly-envelope --save
```

在站点配置文件或者主题配置文件添加配置项（对，两者任一均可。但不要都写）

```yaml
# envelope_comment  
# see https://akilar.top/posts/58900a8/  
envelope_comment:  
  enable: true #开关  
  cover: https://ae01.alicdn.com/kf/U5bb04af32be544c4b41206d9a42fcacfd.jpg #信笺封面图  
  message: #信笺内容，支持多行  
    - 有什么想问的？  
    - 有什么想说的？  
    - 有什么想吐槽的？  
    - 哪怕是有什么想吃的，都可以告诉我哦~  
  bottom: 自动书记人偶竭诚为您服务！ #信笺结束语，只能单行  
  height: #调整信笺划出高度，默认1050px  
  path: #【可选】comments 的路径名称。默认为 comments，生成的页面为 comments/index.html  
  front_matter: #【可选】comments页面的 front_matter 配置  
    title: 留言板  
    comments: true
```

修改留言页：打开`[Blogroot]\node_modules\hexo-butterfly-envelope\lib\html.pug`，在文件末尾添加自己想要的内容。

>HTML转PUG在线工具：[http://www.html2jade.org/](http://www.html2jade.org/)

### 3.20 GitCalendar提交日历

项目地址：[https://github.com/Zfour/hexo-github-calendar](https://github.com/Zfour/hexo-github-calendar)

**（1）安装插件**

```shell
npm i hexo-githubcalendar --save  
```

**（2）新增网站根目录_config 配置项 (不是主题的)**

```yaml
# Ice Kano Plus_in
# Hexo Github Canlendar
# Author: Ice Kano
# Modify: Lete乐特
githubcalendar:
  enable: true
  enable_page: /comments/index.html
  user: HuffieMa
  layout:
    type: id
    name: recent-posts
    index: 0
  githubcalendar_html: '<div class="recent-post-item" style="width:100%;height:auto;padding:10px;"><div id="github_loading" style="width:10%;height:100%;margin:0 auto;display: block"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 50 50" style="enable-background:new 0 0 50 50" xml:space="preserve"><path fill="#d0d0d0" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z" transform="rotate(275.098 25 25)"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"></animateTransform></path></svg></div><div id="github_container"></div></div>'
  pc_minheight: 280px
  mobile_minheight: 0px
# color: "['#e4dfd7', '#f9f4dc', '#f7e8aa', '#f7e8aa', '#f8df72', '#fcd217', '#fcc515', '#f28e16', '#fb8b05', '#d85916', '#f43e06']" #橘黄色调
# color: "['#ebedf0', '#fdcdec', '#fc9bd9', '#fa6ac5', '#f838b2', '#f5089f', '#c4067e', '#92055e', '#540336', '#48022f', '#30021f']" #浅紫色调
# color: "['#ebedf0', '#f0fff4', '#dcffe4', '#bef5cb', '#85e89d', '#34d058', '#28a745', '#22863a', '#176f2c', '#165c26', '#144620']" #翠绿色调
  color: "['#ebedf0', '#f1f8ff', '#dbedff', '#c8e1ff', '#79b8ff', '#2188ff', '#0366d6', '#005cc5', '#044289', '#032f62', '#05264c']" #天青色调
  api: https://python-github-calendar-api.vercel.app/api
  # api: https://python-gitee-calendar-api.vercel.app/api
  calendar_js: https://cdn.jsdelivr.net/gh/Zfour/hexo-github-calendar@1.21/hexo_githubcalendar.js
  plus_style: ""
```

更多配置项含义请到[https://zfe.space/post/hexo-githubcalendar.html](https://zfe.space/post/hexo-githubcalendar.html)查看。

**（3）将提交日历插入关于页面**

在关于页面md文件中，想要插入的位置插入

```html
<div id="recent-posts"></div>
```

修改站点配置文件中的属性

```yaml
  enable_page: /comments/index.html
```

重新`hexo clean`,`hexo g`, `hexo s`即可看到效果
## 四、网站优化

### 4.1 链接预加载

当鼠标悬停到链接上超过65毫秒时，instantpage会对该链接进行预加载，提升访问速度。

```yaml
# https://instant.page/
# prefetch (預加載)
instantpage: true
```

### 4.2 SEO优化

**优化链接**

采用`hexo-abbrlink`插件实现链接，后期不管怎么修改永久链接都不会变，不用考虑分类中文化的问题，并且更利于SEO。

```shell
npm install hexo-abbrlink --save
```

配置站点文件`config.yml`

```yml
permalink: post/:abbrlink.html
abbrlink:
  alg: crc32  # 算法：crc16(default) and crc32
  rep: hex    # 进制：dec(default) and hex
```

**生成新的站点地图**

```shell
npm install hexo-generator-sitemap --save
npm install hexo-generator-baidu-sitemap --save
```

**百度资源平台管理站点**

打开[百度搜索资源平台](https://ziyuan.baidu.com/)，进入【用户中心-站点管理-添加网站】，按照流程添加网站。

在验证阶段选择**HTML标签验证**，将`content`内容填入主题配置文件`site_verification`处部署后点击完成验证。

验证成功后，点击普通提交，首先提交`sitemap`

![](https://img.mahaofei.com/img/20220410152709.png)

然后如果想百度收录的更加及时，可以再配置API提交，首先需要安装额外的插件。

```shell
npm install hexo-baidu-url-submit --save
```

修改站点配置

```yaml
deploy:
  - type: git
    repo: https://github.com//xxx.github.io.git
    branch: main
  - type: baidu_url_submitter
```

添加站点配置

```yaml
baidu_url_submit:
  count: 100 # 提交最新的100个链接
  host: https://www.mahaofei.com # 站点管理中添加的网站域名
  token: xR6nigjGWFHyybFO # token可以在API提交页面找到
  path: baidu_urls.txt # 文本文档的地址，新链接会保存在此文本文档里
```

此后每次 `hexo d`都会进行API提交

**谷歌收录**

进入[Google Search Console](https://search.google.com/search-console/welcome)，进行网站验证

![](https://img.mahaofei.com/img/20220410154319.png)

验证成功后，进入配置页面，点击**Sitemaps**，提交自己的Sitemap文件就可以了。

![](https://img.mahaofei.com/img/20220410154520.png)


## 五、博客撰写

### 3.1 页面配置Page Front-matter

```yaml
---
title:
date:
updated:
type:
comments:
description:
keywords:
top_img:
mathjax:
katex:
aside:
aplayer:
highlight_shrink:
---
```

| 写法             | 解释                                                                         |
| ---------------- | ---------------------------------------------------------------------------- |
| title            | 【必需】页面标题                                                             |
| date             | 【必需】页面创建日期                                                         |
| type             | 【必需】标签、分类和友情链接三个页面需要配置                                 |
| updated          | 【可选】页面更新日期                                                         |
| description      | 【可选】页面描述                                                             |
| keywords         | 【可选】页面关键字                                                           |
| comments         | 【可选】显示页面评论模块(默认true)                                           |
| top_img          | 【可选】页面顶部图片                                                         |
| mathjax          | 【可选】显示mathjax(当设置mathjax的per_page: false时，才需要配置，默认false) |
| katex            | 【可选】显示katex(当设置katex的per_page: false时，才需要配置，默认false)     |
| aside            | 【可选】显示侧边栏(默认true)                                                 |
| aplayer          | 【可选】在需要的页面加载aplayer的js和css,请参考文章下面的音樂 配置           |
| highlight_shrink | 【可选】配置代码框是否展开(true/false)(默认为设置中highlight_shrink的配置)   |

### 3.2 文章页配置

```yaml
--- 
title: 
date: 
updated: 
tags: 
categories: 
keywords: 
description: 
top _img: 
comments: 
cover: 
toc: 
toc_ number: 
toc _style_ simple: 
copyright: 
copyright _author: 
copyright_ author _href: 
copyright_ url: 
copyright _info: 
mathjax: 
katex: 
aplayer: 
highlight_ shrink: 
aside: 
stick:
---
```

| 写法                  | 解释                                                                                      |
| --------------------- | ----------------------------------------------------------------------------------------- |
| title                 | 【必需】文章标题                                                                          |
| date                  | 【必需】文章创建日期                                                                      |
| updated               | 【可选】文章更新日期                                                                      |
| tags                  | 【可选】文章标签                                                                          |
| categories            | 【可选】文章分类                                                                          |
| keywords              | 【可选】文章关键字                                                                        |
| description           | 【可选】文章描述                                                                          |
| top_img               | 【可选】文章顶部图片                                                                      |
| cover                 | 【可选】文章缩略图(如果没有设置top_img,文章页顶部将显示缩略图，可设为false/图片地址/留空) |
| comments              | 【可选】显示文章评论模块(默认true)                                                        |
| toc                   | 【可选】显示文章TOC(默认为设置中toc的enable配置)                                          |
| toc_number            | 【可选】显示toc_number(默认为设置中toc的number配置)                                       |
| toc_style_simple      | 【可选】显示toc 简洁模式                                                                  |
| copyright             | 【可选】显示文章版权模块(默认为设置中post_copyright的enable配置)                          |
| copyright_author      | 【可选】文章版权模块的文章作者                                                            |
| copyright_author_href | 【可选】文章版权模块的文章作者链接                                                        |
| copyright_url         | 【可选】文章版权模块的文章連結链接                                                        |
| copyright_info        | 【可选】文章版权模块的版權聲明文字                                                        |
| mathjax               | 【可选】显示mathjax(当设置mathjax的per_page: false时，才需要配置，默认false)              |
| katex                 | 【可选】显示katex(当设置katex的per_page: false时，才需要配置，默认false)                  |
| aplayer               | 【可选】在需要的页面加载aplayer的js和css,请参考文章下面的音樂 配置                        |
| highlight_shrink      | 【可选】配置代码框是否展开(true/false)(默认为设置中highlight_shrink的配置)                |
| aside                 | 【可选】显示侧边栏(默认true)                                                              |
| stick                 |    【可选】文章置顶(默认0不置顶，设置1时置顶)                                                                                        |





### 3.3 Butterfly主题可用功能

**Tag Inline**

类似于查题网站，点击查看答案按钮，显示答案

[https://butterfly.js.org/posts/4aa8abbe/#tag-hide](https://butterfly.js.org/posts/4aa8abbe/#tag-hide)

**mermail**

使用mermaid标签可以绘制Flowchart（流程图）、Sequence diagram（时序图）、Class Diagram（类别图）、State Diagram（状态图）、Gantt（甘特图）和Pie Chart（圆形图）

[https://butterfly.js.org/posts/4aa8abbe/#mermaid](https://butterfly.js.org/posts/4aa8abbe/#mermaid)

**Tabs**

```markdown
{% tabs test4 %} 
<!-- tab 第一个Tab --> 
**tab名字为第一个Tab**
 <!-- endtab -->

<!-- tab @fab fa-apple-pay --> 
**只有图标没有Tab名字**
 <!-- endtab -->

<!-- tab 炸弹@fas fa-bomb --> 
**名字+icon**
 <!-- endtab --> 
{% endtabs %}
```

**Button**

```markdown
{% btn [url],[text],[icon],[color] [style] [layout] [position] [size] %}

[url] : 链接
[text] : 按钮文字
[icon] : [可选] 图标
[color] : [可选] 按钮背景颜色(默认style时）
                      按钮字体和边框颜色(outline时) 
                      default/blue/pink/red/purple/orange/green 
[style] : [可选] 按钮样式默认实心
                      outline/留空
[layout] : [可选] 按钮布局默认为line 
                      block/留空
[position] : [可选] 按钮位置前提是设置了layout为block 默认为左边
                      center/right/留空
[size] : [可选] 按钮大小
                      larger/留空
```

**inlineImg**

```markdown
{% inlineImg [src] [height] %}

[src] : 图片链接
[height] ： 图片高度限制【可选】
```

**label**

高亮所需的文字

```markdown
{% label text color %}
[text] : 文字
[color] : 【可选】背景颜色，默认为default
default/blue/pink/red/purple/orange/green
```

**timeline**

```markdown
{% timeline title,color %} 
<!-- timeline title --> 
xxxxx 
<!-- endtimeline --> 
<!-- timeline title --> 
xxxxx 
<!-- endtimeline --> 
{% endtimeline %}

[title] : 标题/时间线
[color]	: timeline 颜色
default(留空) / blue / pink / red / purple / orange / green
```

**flink**

可在任何界面插入类似友情链接列表效果

```markdown
{% flink %} 
- class _name: 友情链接
  class_ desc: 那些人，那些事
  link _list: 
    - name: JerryC 
      link: https://jerryc.me/ 
      avatar: https://jerryc.me/img/avatar.png 
      descr: 今日事,今日毕
    - name: Hexo 
      link: https://hexo.io/zh-tw/ 
      avatar: https://d33wubrfki0l68.cloudfront.net/6657ba50e702d84afb32fe846bed54fba1a77add/827ae/logo.svg 
      descr: 快速、简单且强大的网志框架

- class_ name: 网站
  class _desc: 值得推荐的网站
  link_ list: 
    - name: Youtube 
      link: https://www.youtube.com/ 
      avatar: https://i.loli.net/2020/05/14/9ZkGg8v3azHJfM1.png 
      descr: 视频网站
    - name: Weibo 
      link: https://www.weibo.com/ 
      avatar: https://i.loli.net/2020/05/14/TLJBum386vcnI1P.png 
      descr: 中国最大社交分享平台
    - name: Twitter 
      link: https://twitter.com/ 
      avatar: https://i.loli.net/2020/05/14/5VyHPQqR6LWF39a.png 
      descr: 社交分享平台
{% endflink %}
```

# 博客备份

## 创建新分支

不过在建立新分支前请确保仓库内**已有master分支**（Hexo本地建站后第一次上传时会自动生成）。  
然后创建一个用来备份的分支hexo，并且将其设置为默认分支。

## 获取 .git文件夹

原始的博客文件夹只有`.deploy_git`文件夹，是没有.git文件夹的，于是我们先去桌面或者哪里随便一个地方，把刚刚的hexo分支给clone下来。然后复制出里面的.git文件夹，复制到现在的博客文件夹中。

在博客文件夹中检查是否有`.gitignore`文件，如果没有最好手动添加一个，用于上传时忽略一些不必要的文件

```
.DS_Store
Thumbs.db
db.json
*.log
node_modules/
public/
.deploy*/
```

>**注意**：如果你之前克隆过theme中的主题文件，那么应该把主题文件中的.git文件夹删掉，因为git不能嵌套上传，最好是显示隐藏文件，检查一下有没有，否则上传的时候会出错，导致你的主题文件无法上传，这样你的配置在别的电脑上就用不了了。

## 备份博客

通过如下命令将本地文件备份到Github上。  

在hexo博客的根目录下执行

```shell
git add .
git commit -m "Backup"
git push origin hexo
```

## 恢复博客

目前假设本地Hexo博客基础环境已经搭好：比如安装git  
、nodejs、hexo安装等等。

输入下列命令克隆博客必须文件(hexo分支)：

```shell
git clone https://github.com/yourgithubname/yourgithubname.github.io
```

在clone下来的那个文件夹里面执行

```shell
npm install hexo-cli
npm install hexo-deployer-git
```

不需要执行`hexo init`，直接继续安装原来安装的一些插件，然后就完成了