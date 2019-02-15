<?php
	namespace Admin\Controller ;
	use Think\Controller ;
	
	header("Content-type: text/html; charset=utf-8"); 
	
	class IndexController extends Controller{
		
		public function index(){
			$this->display() ;	
		}
		
		public function head(){
			$this->display() ;
		}
		
		public function left(){
			//根据管理员得id，用name获得该管理员的角色分组id
			$mg_id = session('mg_id') ; 
			$mg_info = D('Manager') -> find($mg_id) ;
			$mg_role_id = $mg_info['mg_role_id'] ;
			
			//根据角色分组id获得角色的权限id
			$role_info = D('Role') -> find($mg_role_id) ;
			$role_auth_ids = $role_info['role_auth_ids'] ;
			
			//根据角色权限id查询对应的权限
			$auth_info_0 = D('Auth') -> where("auth_level = 0 and auth_id in ( $role_auth_ids) ")->select() ;
			$auth_info_1 = D('Auth') -> where("auth_level = 1 and auth_id in($role_auth_ids)")->select() ;			
			
			
			$this->assign('auth_info_0', $auth_info_0) ;
			$this->assign('auth_info_1', $auth_info_1) ;
		
			$this->display() ;
		}
		
		public function right(){
			$this->display() ;
		}
	}
?>