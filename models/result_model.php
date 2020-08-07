<?php
/**
 *
 */
class Result_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function insert($data)
    {

        return $this->db->insert($data, 'result');

    }

    public function insertexcel($data)
    {
        // $column=['class','name','subject','mark','date'];
        // return $this->db->excelInsert($data,$column ,'result');
        // echo $data;
        // exit();
        $column=['itemCode','itemName','categCode','groupCode','odtypeCode','odsubtypeCode'];
        return $this->db->excelMultiInsert($data,$column ,'oditem');

    }

    public function insertcsv($data)
    {
        
        $column=['class','name','subject','mark','date'];
        return $this->db->csvInsert($data,$column,'result');
        // echo $data;
        // exit();

    }

    public function read($data = null)
    {
        if($data==null){
             return $this->db->retrieve('result');

        }else{
             return $this->db->retrieve('result','',$data);
        }
       
    }

    public function update($data,$where)
    {
        return $this->db->update($data,'result',$where);
    }

    public function delete($data)
    {
        return $this->db->delete($data,'result');
    }

    

    public function output($data)

    {
        // $data['id']= array("1", "2", "3", "4");
        // $table =table name
        // selectedData($table, $reqdata)
        return $this->db->selectedData('result',$data);
        
       
    }

}
