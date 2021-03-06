<?php 
	Class controller {
		function __construct() {
			$this->param = application::param();
			$models = "model{$this->param->type}";
			new $model();
			$this->model = new $model();
			$this->index();
		}

		function index() {
			$method = isset($this->param->page) ? $this->param->page : "basic";
			if (method_exists($this,$method)) $this->$method();
			$this->header();
			$this->content();
			$this->footer();
		}

		function header() {
			include_once(_VIEW."header.php");
		}
		function content() {
			if ($this->param->page) {
				include_once(_VIEW."{$this->param->type}/{$this->param->page}.php");
			} else {
				include_once(_VIEW."content.php");
			}
		}
		function footer(){
			include_once(_VIEW."footer.php");	
		}
	}