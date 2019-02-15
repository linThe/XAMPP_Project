<?php if (!defined('THINK_PATH')) exit();?><!doctype html public "-//w3c//dtd xhtml 1.0 frameset//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-frameset.dtd">
<html>

	<head>
		<meta http-equiv=content-type content="text/html; charset=utf-8" />
		<meta http-equiv=pragma content=no-cache />
		<meta http-equiv=cache-control content=no-cache />
		<meta http-equiv=expires content=-1000 />

		<title>管理中心 v1.0</title>
	</head>
	<frameset border=0 framespacing=0 rows="60, *" frameborder=0>
		
		<frame name=head src="/shop/index.php/Admin/Index/head.html" frameborder=0 noresize scrolling=no>
		
			<frameset cols="170, *">
				<frame name=left src="/shop/index.php/Admin/Index/left.html" frameborder=0 noresize />
				<frame name=right src="/shop/index.php/Admin/Index/right.html" frameborder=0 noresize scrolling=yes />
			</frameset>
	</frameset>
	<noframes>
	</noframes>

</html>

<!--
			可以直接使用在HTML页面因为tp有替换机制在tp/lib/behavior/contentrepalce
			.html只是一个伪静态后缀在tp/conf/convention.php：URL_HTML_SUFFIX => "html" 配置
		-->
<!--
			TP3常量：
			/shop/index.php/Admin路由分组地址,/shop/index.php/Admin/Index路由控制器地址,/shop/index.php/Admin/Index/index路由操作方法的信息
			/shop/index.php/Admin代表路由的全部信息
        	MODULE_NAME,CONTROLLER_NAME.ACTION_NAME
        -->