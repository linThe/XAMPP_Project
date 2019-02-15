<?php
    namespace Home\Controller;
	use Think\Controller;
	
	interface syn{
		function synVaildate($tbName,$dbway) ;
	}
	//模拟用户中心api
	class ApiController extends Controller implements syn{
		
		//验证并添加数据
		function synVaildate($tbName,$dbway){
				
	  		$model = D($tbName);
			
	  		$sql = "select count(*) from information_schema.COLUMNS where table_name='".$tbName . 
	  		"' and table_schema = '".C('DB_NAME')."'";
	
	    	$colsql = "select COLUMN_NAME from information_schema.COLUMNS where table_name = '" . $tbName. 
	    	"' and table_schema = '".C('DB_NAME')."'";
			
			//查询表的总列数
	   		$counts =  $model.query($sql);
	   		//表中所有的列名  一个二维数组 
	  		$tbCols = $model.query($colsql) ;
			
	   		//创建一个新的数组存放获取的字段key和传过来的value
	   		$newdata->array() ; 
	   		
	   		//要验证的字段的数组
	   		$vailfield = array() ;
			$vailcount = 0 ;	
  			
			$vail = '' ;
			
			//创建model 操作属性 便利数组 取字段  连接 分割 
			foreach ($model->$_vaildata as $key => $value) {
				$v = $v.$value.',' ;
			}
			//数组最后一位是空字符串
			$vailfield = explode(",",$vail) ;
			//处理空字符串
			foreach ($vailfield as $key => $value) {
				if($value == ""){
					array_splice($vailfield,$key,1) ;
				}
			}
			//序列化下标
			array_merge($vailfield) ;
			
			//data长度与表列相等,或与必填字段vaildata数组里的验证字段的总数相等,则分别进行赋key，value值
	  		if(count($data) == $counts){
				for ($i=0; $i < $counts ; $i++) { 
					$newdata[$tbCols[$i]] = $data[$i] ;
				}
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
				    if($model.add($credata)){
				      return true ;
				    }else{
				       return  false ;
				    }
				}else if($dbway === 'update'){
					//更新数据
				    if($model.save($credata)){
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
		function Api ($tbName,$dbway){	
			if(IS_POST){
				$result = $this->synVaildate(I('post.'), $tbName, $dbway) ;	
				//返回处理码：0 表示成功	
				if($result){
					return 0 ;
				}else{
					return 1 ;
				}
			}
		}
		
		function sendData($data,$tableName,$dbQueryWay){
				
			dump('到了sendData') ;
			
			//*必填参数
			//表名
			$tbName = $tableName ;
			//选择add：添加数据或update：更新数据
			$dbway = $dbQueryWay ;
			//action 访问的操作方法
			$action = 'http://127.0.0.1:8001/shop/index.php/Admin/Api/api' ; 
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



















