<?php
/**
 *
 */
class Post extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->js    = array('post/script/custom.js');
        $this->view->css   = array('post/css/default.css');
        $this->view->title = 'Posts';

    }

    public function index()
    {

        $this->view->data = $this->model->read();
        $this->view->render('post/index');
    }

    public function insert()
    {
        $file      = 'files';
        $dir       = 'private/post/files/';
        $filecheck = File::upload($file, $dir, true);
        if ($filecheck != false) {
            $data['files']     = implode(',', $filecheck);
            $data['text'] = $_POST['text'];
            $data['date']        = true;
            $check               = $this->model->insert($data);
            if ($check == true) {
                header('location:http://localhost/kovi/post');

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
        $data['post_id']  = $where;
        $this->view->data = $this->model->read($data);
        $this->view->render('post/edit');
    }

    public function update($where)
    {
        $data['post_id'] = $where;
        $remainfile      = [];
        $deletefile      = [];
        $dir      = 'private/post/files/';

        if (isset($_POST['delete'])) {
            if (empty($_POST['delete'])) {
                $tmp_data  = $this->model->read($data);
                $datafiles = $tmp_data[0]['files'];
                $remainfile= explode(',', $datafiles);
                // print_r($tmp_data);

            } else {
                $deletefile= explode(',', $_POST['delete']);
                //echo $_POST['delete'].'<br>';
                if(!empty($_POST['remain'])){
                    $remainfile= explode(',', $_POST['remain']);
                }
                
                //echo $_POST['remain'].'<br>';
            }

        }
        

        if (($_FILES['files']['size'][0] > 0)) {

            if (!empty($deletefile)) {
                $filename = $deletefile;
               

                //print_r($filename);
                //echo 'file contain and delete';
                //print_r($remainfile);
                //exit();
                $delcheck = File::deleteFiles($filename, $dir);
                if ($delcheck == true) {
                    $file        = 'files';
                    $uploadcheck = File::upload($file, $dir, true);

                    if ($uploadcheck == true) {

                       $tempupdatedata        = array_merge($remainfile, $uploadcheck);
            
                       $updatedata['files'] = implode(',', $tempupdatedata);

                    } else {
                        header('location:http://localhost/kovi/eroor');

                    }

                } else {

                    header('location:http://localhost/kovi/eroor');

                }
                

            } else {

                $file        = 'files';
                // print_r($file);
                // echo "file contain and no delete";
                $uploadcheck = File::upload($file, $dir, true);

                if ($uploadcheck == true) {

                    $tempupdatedata        = array_merge($remainfile, $uploadcheck);
            
                    $updatedata['files'] = implode(',', $tempupdatedata);
                   
                   

                } else {
                    header('location:http://localhost/kovi/eroor');

                }

            }

        } else {

            if (!empty($deletefile)) {
                $filename = $deletefile;
                // print_r($filename);
                // echo "no file and delete";
                
                
                $delcheck = File::deleteFiles($filename, $dir);
                if ($delcheck == true) {
                    $updatedata['files'] = implode(',', $remainfile);
                    


                } else {
                    header('location:http://localhost/kovi/eroor');
                }
               
                
            }

        }
        // echo "no file and no delete";
        
       
        $updatedata['text']    = $_POST['text'];
        $updatedata['date']        = true;
        $check                     = $this->model->update($updatedata, $data);

        if ($check == true) {
            header('location:http://localhost/kovi/post');

        } else {
            header('location:http://localhost/kovi/eroor');

        }
        

    }

    public function delete($where)
    {
        $data['post_id'] = $where;
        $tmp_data        = $this->model->read($data);
        $filenames       = $tmp_data[0]['files'];
        $pictures        = explode(',', $filenames);
        $dir             = 'private/post/files/';
        $filecheck       = File::deletefiles($pictures, $dir);
        if ($filecheck == true) {
            $check = $this->model->delete($data);
            if ($check == true) {
                header('location:http://localhost/kovi/post');

            } else {
                header('location:http://localhost/kovi/eroor');

            }

        } else {
            header('location:http://localhost/kovi/eroor');

        }
        //echo $filename;

    }
}
