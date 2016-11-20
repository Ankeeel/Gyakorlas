<?php


class SettingsModel extends Model
{
    public function settingsSave()
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email =:email");
        $stmt->execute(array(
            'email' => $_POST['email']
        ));
        $hiba = false;
        if ($stmt->rowCount() > 0) {
            $hiba = true;
        }


        if ($_POST['pass'] != $_POST['pass2']) {

            echo "Nem egyezik a password!";
        } elseif ($hiba) {
            echo 'Használt e-mail cím!';
        } else {
            $stmt = $this->db->prepare("UPDATE users SET username=:username,email=:email,pass=:pass WHERE id=:id ");
            $stmt->execute(array(
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'pass' => $_POST['pass']
            ));

            $stmt = $this->db->prepare("SELECT * FROM persetting WHERE userId=:id");
            $stmt->execute(array('id' => Session::get('user')));
            $stmt = $this->db->prepare("UPDATE persetting SET city=:city,school=:school,job=:job,gender=:gender,bday=:bday,looking=:looking,tol=:tol,ig=:ig WHERE userId=:userId ");
            $stmt->execute(array(
                'city' => $_POST['city'],
                'school' => $_POST['school'],
                'job' => $_POST['job'],
                'gender' => $_POST['gender'],
                'bday' => $_POST['bday'],
                'looking' => $_POST['looking'],
                'tol' => $_POST['tol'],
                'ig' => $_POST['ig'],
                'userId' => Session::get('user')
            ));
            die(var_dump('asd'));
            header('Location: /settings/personalsetting');
        }
    }

        function personalData()
        {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id=:id ");
            $stmt->execute(array('id' => Session::get('user')));
            return $stmt->fetch();
        }
}
