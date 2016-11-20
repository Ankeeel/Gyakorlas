<?php

class ApiController extends BaseController
{
    public function checkUser(){
        if($this->model->check($_POST['email'])){
            echo 'hiba';
        }
        else{
            echo 'ok';
        }
    }
}