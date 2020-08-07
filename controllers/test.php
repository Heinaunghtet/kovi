<?php
/**
 *
 */
class Test extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->js    = array('test/script/custom.js');
        $this->view->css   = array('test/css/custom.css');
        $this->view->title = 'Test';

    }

    public function index()
    {

        $this->view->data = $this->model->read();
        $this->view->render('test/index');
    }

    public function insert()
    {
        $data['name']=$_POST['test1'];
        $data['age']=$_POST['test2'];
        $data['age1']=$_POST['test3'];
        $data['age2']=$_POST['test4'];
        $data['age3']=$_POST['test5'];
        $check=$this->model->insert($data);
        if($check==true){
            header('location:http://localhost/kovi/test');

        }else{
            echo "error";
        }
        

    }

    public function read()
    {
        
        $this->view->data = $this->model->read();
    }

    public function edit($where)
    {
    }
        
    

    public function update($where)
    {
    }
        

    
}
