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
        $this->view->self= $this->model->selfData();
        $this->view->genders= $this->model->getGender();
        $this->view->adatok = $this->model->lista();
        $this->view->render('dashboard');

    }
    
    public function logoutAction(){
        Session::destroy();
        header('Location: /login');
    }

}
