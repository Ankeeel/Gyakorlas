<?php

class  Login extends Base{

    function __construct()
    {
        parent::__construct();
        if(Session::get('logged')){
            header('Location: /dashboard/index');
        }
        $this->view->render('login',true);
    }

    public function belep(){
        $this->model->login();
    }



}