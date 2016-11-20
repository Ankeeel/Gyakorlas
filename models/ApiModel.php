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
}