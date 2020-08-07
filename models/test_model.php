<?php
/**
 *
 */
class Test_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }
    
    public function insert($data)
    {

       
       return $this->db->insert($data,'test');//true or false

    }

    public function insertexcel($data)
    {
       

    }

    public function insertcsv($data)
    {
        
        

    }

    public function read($data = null)
    {
       
       return $this->db->retrieve('test');
    }

    public function update($data,$where)
    {
        
    }

    public function delete($data)
    {
       
    }

    

    

}
