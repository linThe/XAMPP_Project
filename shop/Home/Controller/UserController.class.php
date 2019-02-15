<?php
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller {

	public function login() {
		$this -> display();
	}

	//					$this->redirect(login,array{'name'=>'tom','age'=>'21'},3,"添加成功") ;
	//				$_POST['User']['user_hobby'] = implode(',',$_POST['User']['user_hobby']) ;
	public function register() {
		$user = new \Model\UserModel();
		if (IS_POST) {
			//create()搜集表单信息创建表单验证,如果创建失败则返回false
			$data = $user -> create();
			//dump($data);//取数据先dump出来看看结构，不要想当然，想当然常常是错的
			if ($data) {

				$data['user_hobby'] = implode(',', $data['user_hobby']);
				if ($user -> add($data)) {
					$this -> redirect('Index/index');
				}
				//				dump($data) ;

			} else {
				//打印表单验证的错误
				$this -> assign('errorInfo', $user -> getError());
				$this -> redirect('register');
			}
		} else {
			$this -> display();
		}
	}

}
?>

				//发送请求
				//*必填参数
				//表名
//				$tbName = 'test1';
				//选择add：添加数据或update：更新数据
//				$dbway = 'test2';

				//发送请求
				//			$url = "http://127.0.0.1:8001/sjzx/index.php/Home/Api/synVaildate/tbName/".$tbName."/dbway/".$dbway ;
				//				//output.php为接受文件，内容为print_r($_POST)
				//				$ch = curl_init();
				//				curl_setopt($ch, CURLOPT_URL, $url);
				//				//要访问的地址
				//				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				//				//执行结果是否被返回，0是返回，1是不返回
				//				curl_setopt($ch, CURLOPT_POST, 1);
				//				// 发送一个常规的POST请求
				//				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				//				//POST提交的数据包
				//				curl_setopt($ch, CURLOPT_TIMEOUT, 30);
				//				//设置超时
				//				$output = curl_exec($ch);
				//				//执行并获取数据
				//				curl_close($ch);
				//				var_dump($output);
				//			$this -> display();