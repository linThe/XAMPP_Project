<?php
	//命名空间 站点目录下project的分组
	namespace Model ; 
	use Think\Model ;
	
	//创建sw_goods表的model
	//父类Model：ThinkPHP/Library/Think/Model.class.php
	class UserModel extends  Model {
		//model主要做数据验证，增删改查操作Model已经定义好了，调用就行了
		public  $_validate = array(
			//array(字段，验证规则，错误提示，验证条件，附加规则，验证时间);
			//默认规则：require==值不为空
			array('username','require','名字不能为空'),
			
//			array('username','','用户名已经存在',0,'unique'),
//			array('password','require','密码不能为空'),
//			//confirm验证两个字段是否一致，验证字段写在验证规则
//			array('password2','password','两次密码必须一致',0,'confirm'), 
//			array('user_email','email','非法邮箱格式'),
//			array('user_qq','number','qq号码必须为纯数字'),
//			array('user_qq','5,12','长度必须在5到12之间',0,'length'),
//			
//			array('user_tel','number','为纯数字'),
//			
//			array('user_xueli','2,5','学历必须选择一项',0,'between'),
			
//			array('user_hobby','check_hobby','请至少选择两项',1,'callback')
//			
		);
		public $test = "test"; 
		
//		function check_hobby($arg){
//			if(count($var)<2){
//				return false ;
//			}
//			return true ;
//		}
	}
	
?>