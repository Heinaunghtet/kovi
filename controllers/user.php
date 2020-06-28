<?php
/**
 *
 */
class User extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->js    = array('news/script/custom.js');
        $this->view->css   = array('news/css/default.css');
        $this->view->title = 'Users';

    }

    public function index()
    {

        $this->view->data = $this->model->read();
        $this->view->render('user/index');
    }

    public function insert()
    {
        $file      = 'userpic';
        $dir       = 'private/user/photos/';
        $filecheck = File::uploadFile($file, $dir,true);
        if ($filecheck != false) {
            $data['userpic']  = $filecheck;
            $data['name']     = $_POST['name'];
            $data['password'] = $_POST['pass'];
            $data['role']     = $_POST['role'];
            $data['date']     = true;
            $check            = $this->model->insert($data);
            if ($check == true) {
                header('location:http://localhost/kovi/user');

            } else {
                header('location:http://localhost/kovi/eroor');

            }

        } else {
            header('location:http://localhost/kovi/eroor');
        }

    }

    public function read()
    {
        $this->view->data = $this->model->read($data);

    }

    public function edit($where)
    {
        $data['user_id']  = $where;
        $this->view->data = $this->model->read($data);
        $this->view->render('user/edit');
    }

    public function update($where)
    {
        $data['user_id'] = $where;
        if (!($_FILES['userpic']['size'] == 0)) {

            $tmp_data = $this->model->read($data);
            $filename = $tmp_data[0]['userpic'];
            $dir      = 'private/user/photos/';
            $delcheck = File::deleteFile($filename, $dir);
            if ($delcheck == true) {
                $file        = 'userpic';
                $uploadcheck = File::uploadFile($file, $dir, true);

                if ($uploadcheck == true) {

                    $updatedata['userpic'] = $uploadcheck;

                } else {
                    header('location:http://localhost/kovi/eroor');

                }

            } else {

                header('location:http://localhost/kovi/eroor');

            }

        }

        
        $updatedata['name']     = $_POST['name'];
        if(!empty($_POST['pass'])){
             $updatedata['password'] = $_POST['pass'];
        }
        $updatedata['role']     = $_POST['role'];
        $check                  = $this->model->update($updatedata, $data);

        if ($check == true) {
            header('location:http://localhost/kovi/user');

        } else {
            header('location:http://localhost/kovi/eroor');

        }

    }

    public function delete($where)
    {
        $data['user_id'] = $where;
        $tmp_data        = $this->model->read($data);
        $filename        = $tmp_data[0]['userpic'];
        $dir             = 'private/user/photos/';
        $filecheck       = File::deleteFile($filename, $dir);
        if ($filecheck == true) {
            $check = $this->model->delete($data);
            if ($check == true) {
                header('location:http://localhost/kovi/user');

            } else {
                header('location:http://localhost/kovi/eroor');

            }

        } else {
            header('location:http://localhost/kovi/eroor');

        }
       
    }
}
