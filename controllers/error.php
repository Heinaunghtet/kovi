<?php
/**
 * 
 */
class Eroor extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->view->title='ERROR';
		
		

	}

	function index(){
		$this->view->msg='This is error Message (get form error model)<br>';
		$this->view->css = array('error/css/default.css');
		$this->view->render('error/index',true);
	}
}
?>