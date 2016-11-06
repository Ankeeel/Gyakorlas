<?php


class SettingsModel extends Model
{
    public function settingsSave (){
        $stmt = $this->db->prepare("INSERT INTO users (city,school,job,relationship) VALUES (:city,:school,:job,:relationship)");
        $stmt->execute(array(
        'city' => $_POST['city'],
        'school' => $_POST['school'],
        'job' => $_POST['job'],
        'relationship' => $_POST['relationship']
        ));
        //header('Location: /settings/personalsetting');
    }
}
