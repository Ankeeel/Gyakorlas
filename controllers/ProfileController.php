<?php

class ProfileController extends BaseController {

    public function edit($name=false){
        $adatok = $this->model->PersonalData();
        $this->view->adat = $adatok;
        $this->view->render('profile');
       /* if($name){

        }
        else {

        }*/

    }

}