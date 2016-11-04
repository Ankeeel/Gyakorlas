<?php


class Dashboard extends Base{

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
        $this->view->render('index');
    }
    
    public function logout(){
        Session::destroy();
        header('Location: /login');
    }
    
}