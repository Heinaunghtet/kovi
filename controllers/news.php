<?php
/**
 *
 */
class News extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->js    = array('news/script/custom.js');
        $this->view->css   = array('news/css/default.css');
        $this->view->title = 'News';

    }

    public function index()
    {

        $this->view->data = $this->model->read();
        $this->view->render('news/index');
    }

    public function insert()
    {
        $file      = 'pics';
        $dir       = 'private/news/photos/';
        $filecheck = File::upload($file, $dir, true);
        if ($filecheck != false) {
            $data['newspic']     = implode(',', $filecheck);
            $data['newscontent'] = $_POST['title'];
            $data['newstext']    = $_POST['text'];
            $data['date']        = true;
            $check               = $this->model->insert($data);
            if ($check == true) {
                header('location:http://localhost/kovi/news');

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
        $data['news_id']  = $where;
        $this->view->data = $this->model->read($data);
        $this->view->render('news/edit');
    }

    public function update($where)
    {
        $data['news_id'] = $where;
        $remainfile      = [];
        $deletefile      = [];
        $dir      = 'private/news/photos/';

        if (isset($_POST['delete'])) {
            if (empty($_POST['delete'])) {
                $tmp_data  = $this->model->read($data);
                $datafiles = $tmp_data[0]['newspic'];
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
        

        if (($_FILES['pics']['size'][0] > 0)) {

            if (!empty($deletefile)) {
                $filename = $deletefile;
               

                //print_r($filename);
                //echo 'file contain and delete';
                $delcheck = File::deleteFiles($filename, $dir);
                if ($delcheck == true) {
                    $file        = 'pics';
                    $uploadcheck = File::upload($file, $dir, true);

                    if ($uploadcheck == true) {

                       $tempupdatedata        = array_merge($remainfile, $uploadcheck);
            
                       $updatedata['newspic'] = implode(',', $tempupdatedata);

                    } else {
                        header('location:http://localhost/kovi/eroor');

                    }

                } else {

                    header('location:http://localhost/kovi/eroor');

                }
                

            } else {

                $file        = 'pics';
                // print_r($file);
                // echo "file contain and no delete";
                $uploadcheck = File::upload($file, $dir, true);

                if ($uploadcheck == true) {

                    $tempupdatedata        = array_merge($remainfile, $uploadcheck);
            
                    $updatedata['newspic'] = implode(',', $tempupdatedata);
                   
                   

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
                    $updatedata['newspic'] = implode(',', $remainfile);
                    


                } else {
                    header('location:http://localhost/kovi/eroor');
                }
               
                
            }

        }
        // echo "no file and no delete";
        
        $updatedata['newscontent'] = $_POST['title'];
        $updatedata['newstext']    = $_POST['text'];
        $updatedata['date']        = true;
        $check                     = $this->model->update($updatedata, $data);

        if ($check == true) {
            header('location:http://localhost/kovi/news');

        } else {
            header('location:http://localhost/kovi/eroor');

        }
        

    }

    public function delete($where)
    {
        $data['news_id'] = $where;
        $tmp_data        = $this->model->read($data);
        $filenames       = $tmp_data[0]['newspic'];
        $pictures        = explode(',', $filenames);
        $dir             = 'private/news/photos/';
        $filecheck       = File::deletefiles($pictures, $dir);
        if ($filecheck == true) {
            $check = $this->model->delete($data);
            if ($check == true) {
                header('location:http://localhost/kovi/news');

            } else {
                header('location:http://localhost/kovi/eroor');

            }

        } else {
            header('location:http://localhost/kovi/eroor');

        }
        //echo $filename;

    }
}
