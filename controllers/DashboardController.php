<?php


class DashboardController extends BaseController{

    function __construct()
    {
        parent::__construct();
        if(!Session::get('logged')){
            header('Location: /login');
        }
    }
    function index(){
        $adatok = $this->model->lista();
        $this->view->adat = $adatok;
        die(var_dump($adatok));
        $this->view->render('dashboard');

    }
    
    public function logout(){
        Session::destroy();
        header('Location: /login');
    }


}
