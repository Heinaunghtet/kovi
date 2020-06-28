<?php

/**
 * 

 */
class Login extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->view->js=array('login/script/custom.js');
        $this->view->css=array('login/css/default.css');
        $this->view->title='login';
		
		
	}

	public function index(){

		
		
		$this->view->render('login/index');
		

	}

	public function check(){

		$this->model->check();
		


	}
}
?>