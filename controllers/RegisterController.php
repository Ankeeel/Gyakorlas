<?php

class RegisterController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if (Session::get('logged')) {
            header('Location: /dashboard');
        }
    }

    public function index()
    {
        $this->view->render('register', true);
    }

    public function bekuld()
    {
        $this->model->regsave();

    }


}
