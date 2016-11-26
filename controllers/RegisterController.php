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

    public function indexAction()
    {
        $this->view->genders = $this->model->getGender();

        $this->view->render('register', true);
    }

    public function bekuldAction()
    {
        $this->model->regsave();

    }

}
