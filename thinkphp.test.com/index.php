<?php
//定义项目名称和路径
#define('APP_NAME', 'hello');
define('APP_PATH', './Application/');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

// 加载框架入口文件
require( "../ThinkPHP/ThinkPHP.php");