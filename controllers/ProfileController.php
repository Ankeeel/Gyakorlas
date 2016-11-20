<?php

class ProfileController extends BaseController {

    public function edit($id=false){
        $id=$id?$id:Session::get('user');
        $adatok = $this->model->personalData($id);
        if(!$adatok){
            $this->view->render('404');
        }else{
            $this->view->adat = $adatok;
            $this->view->render('profile');
        }

    }

    public function like($id=false){
        $this->model->like($id);
    }

}