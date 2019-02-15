<?php
    namespace Admin\Controller;
	use Think\Controller ;
	use Model\UserModel ;
	interface syn{
		function synVaildate($data,$tbName,$dbway) ;
	}
	
	//模拟骑士用户中心
	class ApiController extends Controller  implements syn{
		
		//验证并添加数据
		function synVaildate($data,$tbName,$dbway){
	  		$model = D($tbName);
			echo $model->$_validate . "天意如此";
			
	  		$sql = "select count(*) from information_schema.COLUMNS where table_name='".C('DB_PREFIX').$tbName.
	  		"' and table_schema = '".C('DB_NAME')."'"; 
	    	$colsql = "select COLUMN_NAME from information_schema.COLUMNS where table_name = '".C('DB_PREFIX').$tbName. 
	    	"' and table_schema = '".C('DB_NAME')."'";
			
			//查询表的总列数
	   		$counts =  $model->query($sql)[0]['count(*)'];  echo $counts.'总类数' ; dump($counts) ;
	   		//表中所有的列名  一个二维数组 	
	  		$tbCols = $model->query($colsql) ;  echo $tbCols.'所有表名'; dump($tbCols) ;
			
	   		//创建一个新的数组存放获取的字段key和传过来的value
	   		$newdata = array() ; 
	   		
	   		//要验证的字段的数组
	   		$vailfield = array() ; //留下疑问，如何获取model对象的protected属性？？
			$vailcount = 0 ;	
			$vail = '' ;
			
			//创建model 操作属性 便利数组 取字段  把数组连接成字符串(可用implode(分隔符，数组)方法)
			// 把字符串分割分割（explode（分隔符，数组）） 、去重 序列化
			//XML标签，in_array是否存在数组中
			
			echo '怎么访问属性' ;
			echo I($test) ;
			
			foreach ($model->$_validate as $key => $value) {
				$v = $v.$value.',' ;
			}
			$vailfield = array_unique(explode(",",$vail)) ;
			//处理空字符串
			foreach ($vailfield as $key => $value) {
				if($value == ""){
					array_splice($vailfield,$key,1) ;
				}
			}
			//序列化下标
			array_merge($vailfield) ;
			echo "打印三个变量" ;
			dump($vailfield);dump($vailcount) ;dump($vail) ;
			
			dump($data) ;
			//data长度与表列相等,或与必填字段vaildata数组里的验证字段的总数相等,则分别进行赋key，value值
	  		if(count($data) == $counts){
				for ($i=0; $i < $counts ; $i++) { 
					$newdata[$tbCols[$i]['column_name']] = $data[$i] ;
//					echo $tbCols[$i]['column_name'].'<br/>';
//					echo $data[$i].'<br/>' ;
					
				}
				echo '进入了full field 方法' ;
				dump($newdata) ;
	     	}else if( count($data) >=  $vailcount ){
				for ($i=0; $i < $vailcount ; $i++) { 
					$newdata[$vailfield[$i]] = $data[$i] ;
	     		}
	  		}else{
	    		return false ;
	  		}
			
  			//验证newdata是否合法,不合法返回false
		    $credata = $model-> create($newdata) ;
			if($credata){
				if($dbway === 'add'){
					//添加数据
					echo "要添加的数据";
				    dump($credata) ;
					echo "添加成功";
				    if($model->add($credata)){
				      return true ;
				    }else{
				       return  false ;
				    }
				}else if($dbway === 'update'){
					//更新数据
				    if($model->save($credata)){
				      return true ;
				    }else{
				       return  false ;
				    }
				}	
				
		    }else{
		    	return false ;
		    }

		}
	
		
//		function synVaildate($tbName,$dbway){
//			dump($tbName) ;
//			return 1 ;
//		}
		
		//$data :$_POST数组  返回码:0 = 添加成功
		function api ($tbName,$dbway){
			if(IS_POST){
				echo '展示数组post' ;
				dump(I('post.')) ;
				$result = $this->synVaildate(I('post.'), $tbName, $dbway) ;	
				//返回处理码：0 表示成功	
				if($result){
					dump('成功添加') ;
					return 0 ;
				}else{
					dump('添加失败') ;
					return 1 ;
				}
			}
		}
		
		function sendData($data){
			//*必填参数
			//表名
			$tbName = 'qs_ad' ;
			//选择add：添加数据或update：更新数据
			$dbway = 'add' ;
			//action 访问的操作方法
			$action = 'http://127.0.0.1:8001/sjzx/index.php/Home/Api/synVaildate' ; 
			//发送请求
			$url = $action."/tbName/".$tbName."/dbway/".$dbway ;  
			//初始化对象
			$ch = curl_init();
			//要访问的地址
			curl_setopt($ch, CURLOPT_URL, $url);
			//执行结果是否被返回，0是返回，1是不返回
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
			// 发送一个常规的POST请求
			curl_setopt($ch, CURLOPT_POST, 0);
			//POST提交的数据包
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			//设置超时
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			//执行并获取数据
			$output = curl_exec($ch);
			curl_close($ch);
			var_dump($output);
		}
		
	}
?>



















