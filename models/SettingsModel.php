<?php


class SettingsModel extends Model
{
    public function settingsSave()
    {
            $stmt = $this->db->prepare("UPDATE users SET username=:username,email=:email WHERE id=:id ");
            $stmt->execute(array(
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'id' => Session::get('user')
            ));

            $stmt = $this->db->prepare("SELECT * FROM persetting WHERE userId=:id");
            $stmt->execute(array('id' => Session::get('user')));
            $stmt = $this->db->prepare("UPDATE persetting SET city=:city,job=:job,school=:school,gender=:gender,bday=:bday,
                                        height=:height,weight=:weight,eColor=:eColor,hColor=:hColor,smoking=:smoking,
                                        looklike=:looklike,hChild=:hChild WHERE userId=:userId ");
            $stmt->execute(array(
                'city' => $_POST['city'],
                'job' => $_POST['job'],
                'school' => $_POST['school'],
                'gender' => $_POST['gender'],
                'bday' => $_POST['bday'],
                'height' => $_POST['height'],
                'weight' => $_POST['weight'],
                'eColor' => $_POST['eColor'],
                'hColor' => $_POST['hColor'],
                'smoking' => $_POST['smoking'],
                'looklike' => $_POST['looklike'],
                'hChild' => $_POST['hChild'],
                'userId' => Session::get('user')
            ));

        $stmt = $this->db->prepare("SELECT * FROM looking WHERE userId=:id");
        $stmt->execute(array('id' => Session::get('user')));
        $stmt = $this->db->prepare("UPDATE looking SET oGender=:oGender,tol=:tol,ig=:ig WHERE userId=:userId");
        $stmt->execute(array(
            'oGender'=> $_POST['oGender'],
            'tol'=> $_POST['tol'],
            'ig'=> $_POST['ig'],
            'userId' => Session::get('user')
        ));
    }

        function personalData()
        {
            $stmt = $this->db->prepare("SELECT * FROM users,persetting,looking WHERE users.id=persetting.userId AND users.id=looking.userId");
            $stmt->execute(array('id' => Session::get('user')));
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
}
