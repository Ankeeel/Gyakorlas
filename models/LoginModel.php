<?php

class LoginModel extends Model
{

    public function login(){

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email =:email AND pass =:pass");
        $stmt->execute(array(
            'email' => $_POST['email'],
            'pass' =>$_POST['pass']
        ));

        if($stmt->rowCount() > 0){
            $data = $stmt->fetch();
            Session::set('logged',true);
            Session::set('user',$data['id']);
            header('Location: /dashboard/index');
        }else{
           // header('Location: /login');
            echo 'hibás belépés';
        }

    }
}