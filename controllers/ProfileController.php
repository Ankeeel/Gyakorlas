<?php

class ProfileController extends BaseController {

    public function editAction($id=false){
        $id=$id?$id:Session::get('user');
        $adatok = $this->model->personalData($id);
        if(!$adatok){
            $this->view->render('404');
        }else{
            $this->view->adat = $adatok;
            $this->view->render('profile');
        }

    }



}