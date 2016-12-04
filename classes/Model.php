<?php

class Model
{
    public $db;

    function __construct()
    {
        $this->db = new Database();
    }

    public function getGender()
    {
        $stmt = $this->db->prepare("SELECT * FROM gender");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selfData(){
        $stmt = $this->db->prepare("SELECT * FROM users,persetting,looking WHERE users.id=persetting.userId AND users.id=looking.userId AND id=:id");
        $stmt->execute(array('id' => Session::get('user')));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}