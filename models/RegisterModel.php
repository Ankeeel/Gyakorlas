<?php


class RegisterModel extends Model
{
    public function regsave()
    {

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email =:email");
        $stmt->execute(array(
            'email' => $_POST['email']
        ));
        $hiba = false;
        if($stmt->rowCount() > 0){
           $hiba = true;
        }


        if ($_POST['pass'] != $_POST['pass2']) {

            echo "Nem egyezik a password!";
        } elseif($hiba) {
            echo 'Használt e-mail cím!';
        }else{
            $stmt = $this->db->prepare("INSERT INTO users (username,email,pass) VALUES (:username,:email,:pass)");
            $stmt->execute(array(
                'username' => $_POST['name'],
                'email' => $_POST['email'],
                'pass' => $_POST['pass'],

            ));
            $stmt = $this->db->prepare("INSERT INTO persetting (city,school,job,userId,gender,bday,looking,tol,ig)VALUES (:city,:school,:job,:userId,:gender,:bday,:looking,:tol,:ig)");
            $stmt->execute(array(
                'city' => '',
                'school' => '',
                'job' => '',
                'gender' => $_POST['gender'],
                'bday'=> $_POST['bday'],
                'looking'=> $_POST['looking'],
                'tol'=> $_POST['tol'],
                'ig'=> $_POST['ig'],
                'userId' => $this->db->lastInsertId()
        ));
            header('Location: /login');
        }
    }


}