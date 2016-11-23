<?php

class ProfileModel extends Model
{
    public function personalData($id){
        $stmt = $this->db->prepare("SELECT * FROM users,persetting WHERE id=userId AND id=:id");
        $stmt->execute(array('id'=>$id));
        return $stmt->fetch();
    }

    public function like($id){

        $stmt = $this->db->prepare("SELECT * FROM ratings WHERE userId=:id AND senderId=:senderId");
        $stmt->execute(array(
            'id'=>$id,
            'senderId'=>Session::get('user')
        ));
        if($stmt->rowCount() == 0){
            $stmt = $this->db->prepare("INSERT INTO ratings (userId,senderId,rating_value) VALUES (:userId,:senderId,:rating_value)");
            $stmt->execute(array(
                'userId' => $id,
                'senderId' => Session::get('user'),
                'rating_value' => 1
            ));
        }
             header('Location: /profile/edit');
    }

}