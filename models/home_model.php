<?php
/**
 * 
 */
class Home_Model extends Model
{
	
	function __construct()
	{
		 parent::__construct();
		
	}



	public function insert()
    {
        $text=$_POST['text'];
        $query=$this->db->prepare('INSERT INTO testdata (text)VALUES (:text)');
        $query->execute(array(
 			':text'=>$_POST['text']
 		));

        $data=array('text'=>$text,'id'=>$this->db->lastInsertId());
        echo json_encode($data);


    }

    public function read()
    {
        
        $query=$this->db->prepare('SELECT * FROM testdata');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $data=$query->fetchAll();
        echo json_encode($data);
    }

    public function delete()
    {
        $id=$_POST['id'];
        $query=$this->db->prepare('DELETE FROM testdata WHERE test_id=:id');
        $query->execute(array(':id'=>$id));
         
        
    }

    public function update()
    {
        
        $id=$_POST['id'];
        $data=$_POST['updatedata'];

        $query=$this->db->prepare('UPDATE testdata SET text=:text WHERE test_id=:id');
        if($query->execute(array(':id'=>$id,':text'=>$data))){
            echo 1;
        }
        
    }
}