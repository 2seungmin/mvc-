<?php 
	Class model{
		function __construct () {
			$this->param = application::param();
		}

		function dbcon(){
			$this->db = new PDO("mysql:host=localhost;dbname=1012;charset=utf8","root","");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}

		function dbcut(){
			$this->db = NULL;
		}

		function query($sql = false){
			$this->dbcon();
			if ($sql) $this->sql = $sql;
			$res = $this->db->query($this->sql);
			if(!$res){
				echo "<pre>";
				print_r($this->db->errorInfo());
				echo "</pre>";
			} else{
				return $res;
			}
			$this->dbcut();
		}

		function fetch($sql = false){
			if($sql) $this->sql = $sql;
			return  $this->query()->fetch();
		}
		function fetchAll($sql = false){
			if($sql) $this->sql = $sql;
			return  $this->query()->fetchAll();
		}
		function cnt($sql = false){
			if($sql) $this->sql = $sql;
			return  $this->query()->rowCount();
		}