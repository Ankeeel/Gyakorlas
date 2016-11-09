<?php

class ProfileModel extends Model
{
  public $ertek;
    public function personalData($id){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(array('id'=>$id));
        return $stmt->fetch();
    }

    public function like(){
    $this->ertek++;
        header('Location: /login');
}

    public function dislike(){
        $this->ertek--;
        header('Location: /profile/edit');
    }

}