<?php 
	Class Application{

		function __construct(){
			$ctr = $this->param()->type."controller";
			new $ctr();
		}

		function param(){
			if(isset($_GET['param']) && $param = explode("/",$_GET['param'])){
				$param['type'] = isset($param[0]) && $param[0] ? $param[0] : "main";
				$param['page'] = isset($param[1]) && $param[1] ? $param[1] : NULL;
				$param['idx'] = isset($param[2]) && $param[2] ? $param[2] : NULL;
				$param['page_num'] = isset($param[2]) && $param[2] ? $param[2] : "1";
				return (object)$param;
			}
		}
	}