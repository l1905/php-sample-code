## 加载,自动加载和命名空间

### 加载

常规加载使用include, require

官方文档解释：
> 被包含文件先按参数给出的路径寻找，如果没有给出目录（只有文件名）时则按照 include_path 指定的目录寻找。如果在 include_path 下没找到该文件则 include 最后才在调用脚本文件所在的目录和当前工作目录下寻找。

如果最后仍未找到文件则 include 结构会发出一条**警告**；这一点和 require 不同，后者会发出一个**致命错误**

include_once 语句在脚本执行期间包含并运行指定文件。此行为和 include 语句类似，唯一区别是如果该文件中已经被包含过，则不会再次包含。如同此语句名字暗示的那样，只会包含一次。

include_once 可以用于在脚本执行期间同一个文件有可能被包含超过一次的情况下，想确保它只被包含一次以**避免函数重定义**，**变量重新赋值**等问题。

`include_once` 和`require_once` 功能一样， 唯一区别是 前者报错等级是**警告**, 后者是**致命错误**

demo代码basic_00.php中验证了如下情况

* 错误等级
* include重新加载，变量是否被覆盖，函数是否重新被定义

### 自动加载文件

背景是： 常规加载include, require 每个脚本的开头，都需要包含（include）一个长长的列表（每个类都有个文件）, 代码不可维护， 和不可读

**__autoload**  将会被废弃(php 7.2) 缺点是 只允许单个autoload使用， 这里不再详细赘述 http://php.net/manual/en/function.autoload.php

`spl_autoload_register`

可以注册多个autoload使用，顺序执行。 官方文档：http://php.net/manual/en/function.spl-autoload-register.php

非限定名称，**警告：如果命名空间中的函数或常量未定义，则该非限定的函数名称或常量名称会被解析为全局函数名称或常量名称。** 

demo代码basic_01.php中验证了如下情况

* 可以注册多个autoload 
* 可以匿名注册autoload方法，并且可以指定autoload方法是在队列首部，还是尾部


官方文档介绍比较详细，不再详细描述

### 命名空间

三个基本概念

* 非限定名称：不包含前缀的类名称
* 限定名称： 包含前缀的名称
* 完全限定名称：包含了全局前缀操作符的名称

官方文档地址： http://php.net/manual/zh/language.namespaces.basics.php

结合自动加载实现功能
