<?php /* Smarty version Smarty-3.1.6, created on 2019-01-06 09:59:24
         compiled from "D:/phpstudy/PHPTutorial/WWW/shop/Admin/View\Goods\update.html" */ ?>
<?php /*%%SmartyHeaderCode:326865c3160fc4a3837-35958066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21f84b0dc75f448de72c412775fdad08770749d1' => 
    array (
      0 => 'D:/phpstudy/PHPTutorial/WWW/shop/Admin/View\\Goods\\update.html',
      1 => 1546697285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326865c3160fc4a3837-35958066',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5c3160fc5eba8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3160fc5eba8')) {function content_5c3160fc5eba8($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo @ADMIN_CSS_URL;?>
mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="./admin.php?c=goods&a=showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="./admin.php?c=goods&a=add" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="f_goods_name" value="KD877" /></td>
                </tr>
                <tr>
                    <td>商品分类</td>
                    <td>
                        <select name="f_goods_category_id">
                            <option>请选择</option>
                            <option>家用电器</option>
                            <option>手机数码</option>
                            <option>电脑办公</option>
                            <option>服饰鞋帽</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品品牌</td>
                    <td>
                        <select name="f_goods_brand_id">
                            <option>请选择</option>
                            <option>苹果</option>
                            <option>诺基亚</option>
                            <option>HTC</option>
                            <option>摩托罗拉</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td><input type="text" name="f_goods_price" value="1239.99" /></td>
                </tr>
                <tr>
                    <td>商品图片</td>
                    <td><input type="file" name="f_goods_image" value="<?php echo @ADMIN_IMG_URL;?>
2013-12-33.jpg" /></td>
                </tr>
                <tr>
                    <td>商品详细描述</td>
                    <td>
                        <textarea name="f_goods_introduce">卓越的纤薄设计，却依然为更大的显示屏和更快的芯片预留了空间。超快无线网络连接也不会牺牲电池使用时间。全新耳机带来绝佳音效和非凡贴合的舒适度。如此众多的精彩功能融入这款 iPhone，如此，你才可以享受它的精彩更多。</textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html><?php }} ?>