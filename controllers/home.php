<?php
/**
 *
 */
class Home extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->js    = array('home/script/custom.js');
        $this->view->css   = array('home/css/default.css');
        $this->view->title = 'HOME';

    }

    public function index()
    {

        $this->view->render('home/index');
    }

    public function ajaxGet()
	{
		
        $this->model->read();
        

	}

    public function ajaxInsert()
    {

        $this->model->insert();

    }


    public function ajaxUpdate()
    {
        
        $this->model->update();

    }

    public function ajaxDelete()
    {
        
        $this->model->delete();

    }

}
