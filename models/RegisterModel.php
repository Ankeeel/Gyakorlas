<?php


class RegisterModel extends Model
{
    public function regsave()
    {
        $date = date("Y-m-d");
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
            $stmt = $this->db->prepare("INSERT INTO users (username,email,pass,regDate) VALUES (:username,:email,:pass,:regDate)");
            $stmt->execute(array(
                'username' => $_POST['name'],
                'email' => $_POST['email'],
                'pass' => $_POST['pass'],
                'regDate' => $date
            ));

            $lastInsertId = $this->db->lastInsertId();

            $stmt = $this->db->prepare("INSERT INTO persetting (city,job,school,bday,height,weight,eColor,hColor,smoking,looklike,hChild,userId)
                                        VALUES (:city,:job,:school,:bday,:height,:weight,:eColor,:hColor,:smoking,:looklike,:hChild,:userId)");
            $stmt->execute(array(
                'city' => '',
                'job' => '',
                'school' => '',
                'bday' => '',
                'height' => '',
                'weight' => '',
                'eColor' => '',
                'hColor' => '',
                'smoking' => '',
                'looklike' => '',
                'hChild' => '',
                'userId' => $lastInsertId
            ));
            $stmt = $this->db->prepare("INSERT INTO looking (oGender,tol,ig,oCity,oEColor,oHColor,oLooklike,online,oSmoking,oHChild,userId)
                                        VALUES (:oGender,:tol,:ig,:oCity,:oEColor,:oHColor,:oLooklike,:online,:oSmoking,:oHChild,:userId)");
            $stmt->execute(array(
                'oGender'=>'',
                'tol' => 18,
                'ig' => 18,
                'oCity' => '',
                'oEColor' => '',
                'oHColor' => '',
                'oLooklike' => '',
                'online' => '',
                'oSmoking' => '',
                'oHChild' => '',
                'userId' => $lastInsertId
            ));
        }
    }


}