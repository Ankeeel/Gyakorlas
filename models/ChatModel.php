<?php

class ChatModel extends Model
{
    public function comment()
    {
        foreach ($this->selfData() as $adatok) {
            $commentUserName = $adatok->username;
        }
        $sent = $_POST['msg'];
        $stmt = $this->db->prepare("INSERT INTO comment (msg,commenterUserName) VALUES (:msg,:commenterUserName)");
        $stmt->execute(array(
            'msg' => $sent,
            'commenterUserName' => $commentUserName
        ));
    }

    public function commentKiir()
    {
        $stmt = $this->db->prepare("SELECT * FROM comment");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function commentReWrite()
    {
        $stmt = $this->db->prepare('');
        $stmt->execute();
    }
}