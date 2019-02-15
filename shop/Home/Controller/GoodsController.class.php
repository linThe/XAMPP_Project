<?php
	namespace Home\Controller ;
	use Think\Controller ;
	
	class GoodsController extends Controller{
		
		public function detail(){
			$this->display() ;
		}
		
		public function showlist(){
			$this->display() ;
		}
	}
?>