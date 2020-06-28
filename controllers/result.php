<?php
/**
 *
 */
class Result extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->js    = array('result/script/custom.js');
        $this->view->css   = array('result/css/default.css');
        $this->view->title = 'Results';

    }

    public function index()
    {

        $this->view->data = $this->model->read();
        $this->view->render('result/index');
    }

    public function insert()
    {
        if (isset($_FILES['excel']) && !empty($_FILES['excel']['name'])) {
            $data  = 'excel';
            $check = $this->model->insertexcel($data);
            // echo $_FILES['excel']['name'];
            // exit();

        } elseif (isset($_FILES['csv']) && !empty($_FILES['csv']['name'])) {
            $data  = 'csv';
            $check = $this->model->insertcsv($data);
            // echo $_FILES['csv']['name'];
            // exit();

        } else {
            $data['class']   = $_POST['stuclass'];
            $data['name']    = $_POST['stuname'];
            $data['subject'] = $_POST['subject'];
            $data['mark']    = $_POST['mark'];
            $data['date']    = true;
            // print_r($data);
            // exit();
            $check = $this->model->insert($data);

        }

        if ($check == true) {
            header('location:http://localhost/kovi/result');

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
        $data['id']       = $where;
        $this->view->data = $this->model->read($data);
        $this->view->render('result/edit');
    }

    public function update($where)
    {
        $data['id']            = $where;
        $updatedata['class']   = $_POST['stuclass'];
        $updatedata['name']    = $_POST['stuname'];
        $updatedata['subject'] = $_POST['subject'];
        $updatedata['mark']    = $_POST['mark'];
        $updatedata['date']    = true;
        $check                 = $this->model->update($updatedata, $data);

        if ($check == true) {
            header('location:http://localhost/kovi/result');

        } else {
            header('location:http://localhost/kovi/eroor');

        }

    }

    public function delete($where)
    {
        $data['id'] = $where;

        $check = $this->model->delete($data);
        if ($check == true) {
            header('location:http://localhost/kovi/result');

        } else {
            header('location:http://localhost/kovi/eroor');
        }

    }

    public function excel()
    {

        if (isset($_FILES['excel'])) {

            ExcelView::excelShow('excel', $allsheet = false);
        }
        if (isset($_FILES['csv'])) {

            ExcelView::csvShow('csv');
        }

    }

    public function output()
    {

        $data['id'] = $_POST['id'];
        $type = $_POST['type'];

        $tmp_data   = $this->model->output($data);
        if ($type == 'csv') {
            echo json_encode($tmp_data);

        } else {
            $first = [];
            foreach ($tmp_data as $value) {
                $second = [];
                foreach ($value as $key => $val) {
                    $third    = [];
                    $third[]  = $key;
                    $third[]  = $val;
                    $second[] = $third;
                }
                $first[] = $second;
            }
            //print_r($first);
            echo json_encode($first);

        }

    }
}
