<?php
/**
 *
 */
class User_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function insert($data)
    {

        return $this->db->insert($data, 'users');

    }

    public function read($data = null)
    {
        if($data==null){
             return $this->db->retrieve('users');

        }else{
             return $this->db->retrieve('users','',$data);
        }
       
    }

    public function update($data,$where)
    {
        return $this->db->update($data,'users',$where);
    }

    public function delete($data)
    {
        return $this->db->delete($data,'users');
    }

}
