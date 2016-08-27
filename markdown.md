# 一级标题
## 二级标题
### 三级标题
#### 四级标题
##### 五级标题
###### 六级标题

这篇文章的关键字，和它们的脚注:
关键字1的脚注在底下[^key-1] , 关键字2的脚注在底下[^key-2], 关键字3的脚注在底下[^key-3], 关键字4的脚注在底下[^key-4], 关键字5的脚注在底下[^key-5]
>     wuchangqian
>     
>     这里特特殊字符不会被转义以>开头后跟5个空格 **qian** ##a;la;fa;dsfa'

**加粗**
_斜体_

+ 无序列表项一
+ 无序列表项二
+ 无序列表项三

1. 有序列表项一
11. 有序列表项二
133. 有序列表项三

        这里是代码以两个tab开始
        function fn($arg1 , $arg2){
            return $arg1 + $arg2;
        }

<ul>
    <li class="cls-li">100这里是原生态的html代码</li>
    <li class="cls-li">101这里是原生态的html代码</li>
    <li class="cls-li">102这里是原生态的html代码</li>
    <li class="cls-li">103这里是原生态的html代码</li>
    <li class="cls-li">104这里是原生态的html代码</li>
    <li class="cls-li">105这里是原生态的html代码</li>
    <li class="cls-li">106这里是原生态的html代码</li>
    <li class="cls-li">107这里是原生态的html代码</li>
    <li class="cls-li">108这里是原生态的html代码</li>
    <li class="cls-li">109这里是原生态的html代码</li>
</ul>

Markdown中有两种方式，实现链接，分别为内联方式和引用方式。
内联方式：This is an [我的blog](http://me.94313.net/).引用方式：
[Google][href-google] 
[Yahoo][href-yahoo]
[MSN][href-msn]

图片（Images）
图片的处理方式和链接的处理方式，非常的类似。
内联方式：![新浪的logo](http://i2.sinaimg.cn/dy/deco/2013/0329/logo/LOGO_2x.png "Title of this image")
引用方式：
![显示不了][idofimg1] 

[idofimg1]: http://i2.sinaimg.cn/dy/deco/2013/0329/logo/LOGO_2x.png "Title of something"

[href-google]: http://google.com/        "Google" 
[href-yahoo]: http://search.yahoo.com/  "Yahoo Search" 
[href-msn]: http://search.msn.com/    "MSN Search"

[^key-1]:这里是关于关键字1的说明
[^key-2]:这里是关于关键字2的说明
[^key-3]:这里是关于关键字3的说明
[^key-4]:这里是关于关键字4的说明
[^key-5]:这里是关于关键字5的说明