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
            header('Location: /login');
        }
    }

    public function check ($email){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email =:email");
        $stmt->execute(array(
            'email' => $email
        ));
        $hiba = false;
        if($stmt->rowCount() > 0){
            $hiba = true;
        }
        return $hiba;
    }
}