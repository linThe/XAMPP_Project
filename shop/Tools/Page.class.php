<?php
	namespace Tools ;
	
	class Page {
		
		private $total ; //数据表中总记录数
		private $listRows ; //每页显示的行数
		private $limit ;
		private $url ;
		private $pageNum ; // 页数
		private $config = array(
			'hearder' => '个记录',
			'prev' => '上一页',
			'next' => '下一页',
			'first' => '首页',
			'last' => '最后一页'
		) ;
		private $listNum = 8 ; //限制页码列表数码
	
		public  function __construct($total,$listRows = 10 , $pa = ''){
			$this->total = $total ;
			$this->listRows = $listRows ;
			$this->url = $this->getUri($pa) ;
			$this->page = !empty(I('get.page')) ? I('get.page') : 1 ;
			$this->pageNum = ceil($this->total / $this->listRows) ; //向上取整？
			$this->limit = $this->setLimit() ; 
		}
	
		//设置偏移量
		private function setLimit(){
			//偏移量=页面－1乘以行数 ??
			return "Limit:".($this->page - 1) * $this->listRows . ',{$this->listRows}' ;
		}
		
		private function getUri($pa){
//			$uri = I('server.request_uri')
			$url = $_SERVER['REQUEST_URI'] . (strpos($_SERVER['REQUEST_URI'], '?')  ? '' : '?' ) . $pa ;
			$parse = parse_url($url) ;
			
			if(isset($parse['query'])){
				parse_str($parse['query'],$params) ;
				unset($params['page']) ;
				$url = $parse['path'] . '?' .http_build_query($param) ;
			}
			
			return $url ;
		}
		
		function __get($args) {  //魔术方法  允许访问limit成员
			if(args == 'limit')
				return $this->limit ;
			else
				return null ;
		}
		
		//当前页从第几条开始的
		private function start() {
			if ($this->total == 0)
				return 0 ;
			else
				return ($this->page - 1 ) * $this->listRows + 1 ;
		}
		//当前页在第几条结束的
		private function end() {
			return min($this->page * $this->listRows, $this->total) ;
		}
		//首页超链接
		private function first() {
			$html = '' ;
			if ($this->page == 1)
				$html = '' ;
			else
				$html = '&nbsp;&nbsp;<a herf="{$this->uri}&page=1">{$this->config["first"]}</a>&nbsp;&nbsp;' ;
			
			return $html;
		}
		//上一页
		private function prev() {
			$html = '' ;
			if($this -> page == 1)
				$html = '' ;
			else
				$html = '&nbsp;&nbsp;<a herf="{$this->uri}&page=' . ($this->page - 1 ) .
				 '">{$this->config["prev"]}</a>&nbsp;&nbsp;' ; 
			
			return $html ;
		}
		
		private function pageList(){
			$linkPage = '' ;
			
			$inum = floor($this->listNum / 2) ;
			for ($i = $inum; $i >= 1; $i--){
				$page = $this->page - $i ;
				
				if($page < 1)
					continue;
				$listPage = "&nbsp;<a herf='{$this->uri}&page={$page}'>{$page}</a>&nbsp;" ;
			}
		}
		
		private function next(){
			$html = '' ;
			if($this->page == $this->pageNum)
				$html='' ;
			else
				$html = "&nusp;&nusp;<a herf='{$this->uri}&page=" . ($this->page +1) . 
				"'>{$this->config["next"]}</a>&nusp;&nusp;" ;
		}
		
		private function last(){
			$html = '' ;
			if($this->page == $this->pageNum)
				$html='' ;
			else
				$html = "&nusp;&nusp;<a herf='{$this->uri}&page=" . ($this->pageNum) . 
				"'>{$this->config["last"]}</a>&nusp;&nusp;" ;
			return $html ;
		}
		
		private function goPage(){
			return '&nbsp;&nbsp;
						<input type="text" onkeydown = "
							javascript:
							if(event.keyCode == 13){
								var page = (this.value > '.$this->pageNum . ') ? '.$this-> pageNum.' : this.value:location=\'' . $this->uri .'&page=\'+page+\'\'
							}" 
						value ="' .$this->page.'"  style = "width:25px">
						
						<input type = "button" value = "GO" onClick = "
							javascript:
							var page = (this.previousSibling.value > ' .$this->pageNum. ') ? '.$this->pageNum.' : this.previousSibing.value : location=\''. $this->uri . 
						'&page=\' + page +\'\'">
					&nbsp;&nbsp;' ;
			
		}
		
		public function fPage($display = array(0,1,2,3,4,5,6,7,8) ){
				
			$html[0] = "&nbsp;&nbsp;共有<b>{$this->total}</b>{$this->config["header"]}&nbsp;&nbsp;" ;
			$html[1] = "&nbsp;&nbsp;每页显示<b>". ($this->end() - $this->start() + 1) . "</b>条，本页<b>{$this->start()}-{$this->end()}</b>条&nbsp;&nbsp;" ;
			$html[2] = "&nbsp;&nbsp;<b>{$this->page}/{$this->pageNum}</b>页&nbsp;&nbsp;" ;
			$html[3] = $this->first() ;
			$html[4] = $this->prev() ;
			$html[5] = $this->pageList() ;
			$html[6] = $this->next() ;
			$html[7] = $this->last() ;
			$html[8] = $this->goPage() ;
			$fpage = '' ;
			
			foreach ($display as $index){
				$fpage = $html[$index] ;
			}
			
			return  $fpage ;
				
		}
		
	}
?>