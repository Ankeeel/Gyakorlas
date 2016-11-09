<?php


class SettingsModel extends Model
{
    public function settingsSave (){
        $stmt = $this->db->prepare("SELECT * FROM persetting WHERE userId=:id");
        $stmt->execute(array('id'=>Session::get('user')));
        if($stmt->rowCount()>0){
            $stmt = $this->db->prepare("UPDATE persetting SET city=:city,school=:school,job=:job,relationship=:relationship WHERE userId=:userId ");
            $stmt->execute(array(
                'city' => $_POST['city'],
                'school' => $_POST['school'],
                'job' => $_POST['job'],
                'relationship' => $_POST['relationship'],
                'userId' => Session::get('user')
            ));
        }
            else{
                $stmt = $this->db->prepare("INSERT INTO persetting (city,school,job,relationship,userId) VALUES (:city,:school,:job,:relationship,:userId)");
                $stmt->execute(array(
                    'city' => $_POST['city'],
                    'school' => $_POST['school'],
                    'job' => $_POST['job'],
                    'relationship' => $_POST['relationship'],
                    'userId' => Session::get('user')
                ));
            }
        header('Location: /settings/personalsetting');

    }

    public function personalData(){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id ");
        $stmt->execute(array('id'=>Session::get('user')));
        return $stmt->fetch();
    }
}
