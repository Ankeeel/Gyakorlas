<?php

class ProfileController extends BaseController {

    public function edit($id=false){
        $id=$id?$id:Session::get('user');
        $adatok = $this->model->personalData($id);
        $this->view->adat = $adatok;
        $this->view->render('profile');
       /* if($name){

        }
        else {

        }*/

    }

}