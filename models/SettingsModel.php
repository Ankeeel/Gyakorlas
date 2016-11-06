<?php


class SettingsModel extends model
{
    public function settingsSave (){
        $stmt = $this->db->prepare("INSERT INTO users (city,school,job,relationship) VALUES (:adress,:school,:job,:relationship)");
        $stmt->execute(array(
        'city' => $_POST['city'],
        'school' => $_POST['school'],
        'job' => $_POST['job'],
        'relationship' => $_POST['relationship'],
        ));
        header('Location: /Settings/personalSetting');
    }
}
