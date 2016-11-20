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
}