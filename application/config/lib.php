<?php 
	session_start();

	function alert($msg){
		echo "<script> alert('{$msg}')</script>";;
	}

	function move($url = false){
		echo "<script>";
		echo $url ? "location.href='{$url}'" : "history.back();";
		echo "</script>";
		exit;
	}

	function access($bool, $msg,$url = false){
		if($bool){
			alert($msg);
			move($url);
		}
	}

	function memberchk(){
		access(isset($_SESSION['member']),"회원은 접근불가능합니다.");
	}

	function loginchk(){
		access(!isset($_SESSION['member']),"로그인후 이용가능합니다");
	}

	function __autoload($className){
		$className = strtolower($className);
		$className2 = preg_replace("/(model|application)(.*)/", "$1" , $className);
		switch ($className2) {
			case 'model': $dir = _MODEL;break;
			case 'application': $dir = _APP; break;
			default: $dir = _CON; break;
		}
		require_once("{$dir}{$className}.php");
	}