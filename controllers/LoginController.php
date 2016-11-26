<?php

class  LoginController extends BaseController{

    function __construct()
    {
        parent::__construct();
        if(Session::get('logged')){
            header('Location: /dashboard/index');
        }
        $this->view->render('login',true);

    }

    public function belepAction(){
        $this->model->login();
    }
}