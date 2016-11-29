<?php

class AdminModel extends Model
{
    public function generate()
    {
        $db = $_POST['darab'];
        for ($i = 0; $i < $db;$i++) {
            $stmt = $this->db->prepare("INSERT INTO users (username,email,pass) VALUES (:username,:email,:pass)");
            $stmt->execute(array(
                'username' => 'RicsiU' . rand(1, 10),
                'email' => 'RicsiE' . rand(1, 10),
                'pass' => 'RicsiP' . rand(1, 10)
            ));
        }
        return true;

        // $stmt2 = $this->db->prepare("INSERT INTO presetting (city,school,job,userId,gender,bday,looking,tol,ig)VALUES (:city,:school,:job,:userId,:gender,:bday,:looking,:tol,:ig)");
    }


    public function kilistaz(){
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}


