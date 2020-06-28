<?php
/**
 *
 */
class News_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function insert($data)
    {

        return $this->db->insert($data, 'news');

    }

    public function read($data = null)
    {
        if($data==null){
             return $this->db->retrieve('news');

        }else{
             return $this->db->retrieve('news','',$data);
        }
       
    }

    public function update($data,$where)
    {
        return $this->db->update($data,'news',$where);
    }

    public function delete($data)
    {
        return $this->db->delete($data,'news');
    }

}
