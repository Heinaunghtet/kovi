<?php
/**
 *
 */
class Post_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function insert($data)
    {

        return $this->db->insert($data, 'posts');

    }

    public function read($data = null)
    {
        if($data==null){
             return $this->db->retrieve('posts');

        }else{
             return $this->db->retrieve('posts','',$data);
        }
       
    }

    public function update($data,$where)
    {
        return $this->db->update($data,'posts',$where);
    }

    public function delete($data)
    {
        return $this->db->delete($data,'posts');
    }

}
