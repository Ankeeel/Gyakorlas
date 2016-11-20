<?php

class ApiModel extends Model
{
    public function check ($email){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email =:email");
        $stmt->execute(array(
            'email' => $email
        ));
        $hiba = false;
        if($stmt->rowCount() > 0){
            $hiba = true;
        }
        return $hiba;
    }

    public function search (){

        $stmt = $this->db->prepare("SELECT username,id FROM users WHERE username LIKE :username%");
        $stmt->execute(array(
            'username' => $_POST['%'.'$search'.'%']
        ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}