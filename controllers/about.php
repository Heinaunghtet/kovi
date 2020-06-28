<?php
/**
 * 
 */
class About extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->view->title='About';
		
		

	}

	function index(){
		
		$this->view->render('about/index',true);
	}
}
?>