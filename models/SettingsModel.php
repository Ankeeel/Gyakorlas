<?php


class SettingsModel extends Model
{
    public function settingsSave (){
        $stmt = $this->db->prepare("SELECT * FROM persetting WHERE userId=:id");
        $stmt->execute(array('id'=>Session::get('user')));
            $stmt = $this->db->prepare("UPDATE persetting SET city=:city,school=:school,job=:job,gender=:gender,bday:=bday,looking:=looking,tol:=tol,ig=:ig WHERE userId=:userId ");
            $stmt->execute(array(
                'city' => $_POST['city'],
                'school' => $_POST['school'],
                'job' => $_POST['job'],
                'gender' => $_POST['gender'],
                'bday'=> $_POST['bday'],
                'looking'=> $_POST['looking'],
                'tol'=> $_POST['tol'],
                'ig'=> $_POST['ig'],
                'userId' => Session::get('user')
            ));
        header('Location: /settings/personalsetting');
    }

    public function personalData(){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id ");
        $stmt->execute(array('id'=>Session::get('user')));
        return $stmt->fetch();
    }
}
