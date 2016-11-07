<?php

class ProfileModel extends Model
{
    public function personalData($id){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(array('id'=>$id));
        return $stmt->fetch();
    }

}