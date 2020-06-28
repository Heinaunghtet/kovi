<?php
/**
 *
 */
class Note_Model extends Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function insert()
    {

        $title = $_POST['title'];
        $text  = $_POST['description'];
        $query = $this->db->prepare('INSERT INTO notes (title,text,create_date)VALUES (:title,:text,:date)');
        $query->execute(array(
            ':title' => $title,
            ':text'  => $text,
            ':date'  => date('Y-m-d')
        ));
        return true;


    }

    public function read($where = null)
    {
        if ($where == null) {
            $query = $this->db->prepare('SELECT * FROM notes');
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        } else {
            $query = $this->db->prepare('SELECT * FROM notes WHERE note_id=:id');
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute(array(
                ':id' => $where,
            ));
        }

        $data = $query->fetchAll();
        return $data;
    }

    public function update()
    {
        $id    = $_POST['where'];
        $title = $_POST['title'];
        $text  = $_POST['description'];
        $date  = date('Y-m-d');

        $query = $this->db->prepare('UPDATE notes SET title=:title,text=:text,create_date=:date WHERE note_id=:id');
        $query->execute(array(
            ':title' => $title,
            ':text'  => $text,
            ':date'  => $date,
            ':id'    => $id
        ));
         return true;
    }

    public function delete($where)
    {

        $query = $this->db->prepare('DELETE FROM notes WHERE note_id=:id');
        $query->execute(array(':id' => $where));
         return true;
    }

}
