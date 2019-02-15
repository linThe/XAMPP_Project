<?php
	namespace Model ;
	use Think\Model ;
	
	class ManagerModel extends Model{
		
		public function checkNamePsw($n, $p){
			$info = $this->where(" mg_name = '$n' and mg_pwd = '$p' ") -> find() ;
			if($info)
				return $info ;
			else
				return null ;
			
		}
	}
?>