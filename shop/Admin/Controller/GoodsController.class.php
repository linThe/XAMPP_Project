<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload ;
use Think\Image ;


class GoodsController extends Controller {


	function add(){
		//展示表单，收集表单
		if(IS_POST){  
			$posData = I('post.') ;
			$files = $_FILES['goods_big_img'] ;
			$goods = D('Goods') ;
			
			
			//$file = I('files.goods_picture') ; //I函数无法获取$_FILES数组
			
			//处理图片
			if($files['error'] < 4){
				//配置upload()
				$config = array(
					'rootPath' => './Public/uploadCatalog/'  //   ./是代表当前的项目路径！！！！！！
				) ;
				//对象
				$upload = new Upload($config) ;
				//返回值
				$result = $upload->uploadOne($files) ;  //找错第一步：检查代码是否打错,第二步：思考当前函数他的真正作用是什么，是否能实现这个功能
				//图片路径
				$bigImgPath = $upload -> rootPath.$result['savepath'].$result['savename'] ;//upload会调用get魔术方法，读取配置变量，得到路径
				$smallImgPath = $upload -> rootPath.$result['savepath'].'small_'.$result['savename'] ;
				
				//有错就返回添加页面并提示
				if(!empty($upload->getError())){  
					$this->redirect(add,array('name'=>'tom','age'=>'21'),3,$upload->getError().',即将返回添加页面') ;
				}else{	//将路径存到数据库
					//数据传递时第一次先打印，确认能拿到你想要的数据了，在继续
					dump($files) ;
					//把路径存到数组
					$posData['goods_big_img'] =  $bigImgPath ;
					//制作缩略图
					$img = new Image() ;					$img->open($bigImgPath) ;
					//生成缩略图  默认等比例缩放
					$img->thumb($width, $height) ;
					//保存到
					$img->save($smallImgPath) ;
					//存到pos数组
					$posData['goods_small_img'] = $smallImgPath ;
				}
				
			}
	
			$creData = $goods -> create($posData) ;
			$result = $goods->add($creData) ;
			//根据结果重定向
			if($result){
				$this->redirect(show,array('name'=>'tom','age'=>'21'),3,"添加商品成功，三秒后返回add页面");
			}else{
				$this->redirect(show,array('name'=>'tom','age'=>'21'),3,"添加失败，三秒后返回add页面");
			}
			
		}else{
			//这么神奇两个display会出现两个拼接网页
			$this->display() ;
		}
	}
	
	function delete($goods_id){
		//实际工作中delete并不真实删除数据，只是做一个标记位，设置0：未删，1：已删
		//测试数据，这里直接删除
		$goods = D('Goods') ;
		$deinfo = $goods->find($goods_id) ;
		$result = $goods->delete($goods_id) ;
		if($result){
			$this->redirect(show,array('name'=>'tom','age'=>'21'),3,$deinfo['goods_name'].'删除成功') ;
		}else{
			$this->redirect(show,array('name'=>'tom','age'=>'21'),3,'Error') ;
		}
	}
	
	//直接接收url对象参数，写代码时尽量不用$_GET
	function update($goods_id) {
			
		$goods = D('Goods');
		
		if (IS_POST) {
			//返回一个boolean值
			$z = $goods->save($_POST) ;
			if($z){
				//重定向方法redirect参数：目标地址url地址，参数，延迟X秒跳转目标地址，提示信息
				//error:	http://localhost:8001/shop/index.php/Admin/Goods/update/name/tom/age/21.html
				dump($_POST) ;
				$this->redirect("show",array('name'=>'tom','age'=>'21'),10,'添加商品成功') ;
			}else{
				//失败可能是因为没有条件：id或where()
				dump($_POST) ;
				$this->redirect('update',array('name'=>'tom','age'=>'21'),3,'添加失败') ;
			}
		} else {
			//根据id查询信息  //select()返回一个二位数组，而find只返回一条记录并且是一个一位数组
			$info = $goods -> find($goods_id);
			//传递到页面
			$this -> assign('info', $info);

			$this -> display();
		}
	}

	
	function show() {
		//实例化对象
		$goods = D('Goods');
		$info = $goods -> select();
		//利用ThinkPHP做一个分页
		
		//传递信息到模板使用   把变量传递给模板
		$this -> assign('info', $info);
		$this -> display();
	}
}
?>

<!--		日后再议
	$this -> assign('pagelist', $pagelist);
	//		//实现数据分页效果
	//		//获得总记录数，所有商品数		
	//		$total = $goods->count() ;  //这是什么,传说一个对象对应数据库的一个记录
	//		$per = 7 ;
	//		//实例对象
	//		$page_obj = new \Tools\Page($total,$per) ;
	//		
	//		//自定义sql语句，获得每页信息
	//		$sql = "select * from sw_goods order by goods_id desc limit 0,7" ;
	//		$info = $goods -> query($sql) ;
	//		//获得页码列表
	//		$pagelist = $page_obj->fpage() ;
	
	/*
	//调用对象方法查询表的所有列的信息
	$info = $goods -> select();
	//根据id查询记录
	$info = $goods -> select(8);
	//id在某个范围的查询记录
	$info = $goods -> select("8,2,31,55");
	//条件限制查询
	$goods -> where('goods_price >= 0');
	//字段限制查询
	$goods -> field('goods_id,goods_name,goods_price,goods_number');
	//条数限制查询
	$goods -> limit(20);
	//偏移量限制查询
	$goods -> limit(5, 6);
	//按列排序
	$goods -> order('goods_price desc');
	//这个东西在一个select之后就失效了，第二个select就要重新设置条件 ，。
	*/
	//调用对象方法查询表的所有列的信息
	
	
	function sql(){
		//执行原生sql语句
		$model = D('TableName');
		$sql = 'insert delete update select ....' ;
		//查询语句	返回一个二维数组结果
		$model -> query($sql) ;
		//添加/修改/删除   结果返回受影响的条数
		$model -> execute($sql) ;
	}
	function showbf() {
		/*使用GoodsModel
		 通过命名空间实例化对象：实例化普通对象,倾向于操作该对象
		 $goods = new \Model\GoodsModel() ;
		 var_dump($goods) ;

		 D函数实例化父类Model对象
		 $model = D() ;	 // == new Model()  执行原生sql语句
		 var_dump($model) ;

		 实例化Model并操作指定数据表,即便该数据表并没用创建对应的模型类

		 $goods = D('Admin') ;
		 var_dump($goods) ;

		 //			$this->display() ; */
	}


	function addbf() {
		//			//$goods = D('Goods') ; //
		//			$goods = new \Model\GoodsModel();
		//			//add数据的两种方法
		//			//数组方式
		//			$arr = array(
		//			'goods_id' =>101,
		//			'goods_name' => 'IphoneX',
		//			'goods_price' => '6666',
		//			'goods_number' => '201',
		//			'goods_weight'=>'130',
		//			'goods_category_id' => 3,
		//			'goods_brand_id'=>31,
		//			'goods_introduce'=>'这怎么就不对了呢？？？？？？',
		//			'abc' => '你丫的真的有abc字段'
		//			);
		//			$r = $goods -> add($arr) ;
		//			dump($r) ;
		//
		$goods = D('Goods');
		$goods -> goods_name = 'IphoneXsPlus';
		$goods -> goods_price = '199999';
		$goods -> goods_number = 1;
		$goods -> goods_weight = 1;
		$goods -> goods_introduce = '这是一个特别牛逼的手机';
		$goods -> abc = '你个鬼';

		$result = $goods -> add();
		dump($result);
		$this -> display();
	}
	-->