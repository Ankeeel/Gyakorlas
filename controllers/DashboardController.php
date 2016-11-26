<?php


class DashboardController extends BaseController{

    function __construct()
    {
        parent::__construct();
        if(!Session::get('logged')){
            header('Location: /login');
        }
    }
    function indexAction(){
        $users = $this->model->lista();
        $this->view->users =  $users;
        $this->view->render('dashboard');

    }
    
    public function logoutAction(){
        Session::destroy();
        header('Location: /login');
    }

}
