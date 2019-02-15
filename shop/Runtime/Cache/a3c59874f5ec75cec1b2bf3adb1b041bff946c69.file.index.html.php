<?php /* Smarty version Smarty-3.1.6, created on 2019-01-06 10:32:26
         compiled from "D:/phpstudy/PHPTutorial/WWW/shop/Admin/View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:212135c316142474a69-07121694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3c59874f5ec75cec1b2bf3adb1b041bff946c69' => 
    array (
      0 => 'D:/phpstudy/PHPTutorial/WWW/shop/Admin/View\\Index\\index.html',
      1 => 1546741935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212135c316142474a69-07121694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5c3161424edc0',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3161424edc0')) {function content_5c3161424edc0($_smarty_tpl) {?><!doctype html public "-//w3c//dtd xhtml 1.0 frameset//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-frameset.dtd">
<html>

	<head>
		<meta http-equiv=content-type content="text/html; charset=utf-8" />
		<meta http-equiv=pragma content=no-cache />
		<meta http-equiv=cache-control content=no-cache />
		<meta http-equiv=expires content=-1000 />

		<title>管理中心 v1.0</title>
	</head>
	<frameset border=0 framespacing=0 rows="60, *" frameborder=0>
		
		<frame name='head' src="__CONTROLLER__/head.html" frameborder=0 noresize scrolling=no>
		
			<frameset cols="170, *">
				<frame name='left' src="__CONTROLLER__/left.html" frameborder=0 noresize />
				<frame name='right' src="__CONTROLLER__/right.html" frameborder=0 noresize scrolling=yes />
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
			__MODULE__路由分组地址,__CONTROLLER__路由控制器地址,__ACTION__路由操作方法的信息
			__SELF__代表路由的全部信息
        	MODULE_NAME,CONTROLLER_NAME.ACTION_NAME
        -->
		<?php }} ?>