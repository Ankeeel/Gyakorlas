<?php


class SettingsModel extends Model
{
    public function settingsSave (){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(array('id'=>Session::get('user')));

        $stmt = $this->db->prepare("INSERT INTO persetting (city,school,job,relationship) VALUES (:city,:school,:job,:relationship)");
        $stmt->execute(array(
        'city' => $_POST['city'],
        'school' => $_POST['school'],
        'job' => $_POST['job'],
        'relationship' => $_POST['relationship'],
        'id' => Session::get('user')
        ));
        header('Location: /settings/personalsetting');
    }

    public function personalData(){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id ");
        $stmt->execute(array('id'=>Session::get('user')));
        return $stmt->fetch();
    }
}
