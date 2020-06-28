<?php
/**
 *
 */
class Note extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->title = 'Notes';


    }

    public function index()
    {

        $this->view->data=$this->model->read();
        $this->view->render('note/index');
    }

    public function insert()
    {
        $render =$this->model->insert();
        if ($render) {
            header('location:http://localhost/kovi/note');

        }
    }

    public function read()
    {
        $this->view->data = $this->model->read();

    }

    public function edit($where)
    {
        $this->view->data = $this->model->read($where);
        $this->view->render('note/edit');
    }

    public function update()
    {
        
        $render =$this->model->update();
        if ($render) {
            header('location:http://localhost/kovi/note');

        }
    }

    public function delete($where)
    {

        
        $render =$this->model->delete($where);
        if ($render) {
            header('location:http://localhost/kovi/note');

        }
    }
}
