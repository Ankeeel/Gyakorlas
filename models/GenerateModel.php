<?php

class GenerateModel extends Model
{
    public function generate(){
        $stmt = $this->db->prepare("INSERT INTO users (username,email,pass) VALUES (:username,:email,:pass)");
        $stmt->execute(array(
            'username'=> 'RicsiU'.rand(1,10),
            'email'=> 'RicsiE'.rand(1,10),
            'pass'=> 'RicsiP'.rand(1,10)
        ));
        $stmt2 = $this->db->prepare("INSERT INTO presetting (city,school,job,userId,gender,bday,looking,tol,ig)VALUES (:city,:school,:job,:userId,:gender,:bday,:looking,:tol,:ig)");

    }

}