<?php
	
	header("Content-Type:text/html;charset=utf-8") ;
	
	define('APP_DEBUG', true) ;
	
	define('SITE_URL', 'http://127.0.0.1/shop/') ;
	
	//Home
	define('CSS_URL', '/shop/Public/css/') ;
	define('JS_URL', '/shop/Public/js/') ;
	define('IMG_URL', '/shop/Public/images/') ;
	
	//Admin
	define('ADMIN_CSS_URL', '/shop/Admin/Public/css/') ;
	define('ADMIN_IMG_URL', '/shop/Admin/Public/img/') ;
	
//	defined('如果没定义') or define('就创建') ;
	
	
	require 'ThinkPHP/ThinkPHP.php' ;
?>

 
<!--
	一个Model对应一个数据表
-->

<!--
	数据表前缀：当数据库资源紧张时用于区分数据库
-->
<!--
	执行流程：
	Project_index --  tp_index.php --  记录开始运行时间  --  内存初始使用
	--  新浪sex环境判断  -- 系统信息  --  命令行或浏览器运行php -- 加载核心类
	--  初始化 -- 混编处理  --  。。。
-->