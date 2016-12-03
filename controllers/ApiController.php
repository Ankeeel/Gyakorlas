<?php

class ApiController extends BaseController
{
    public function checkUserAction()
    {
        if ($this->model->check($_POST['email'])) {
            echo 'hiba';
        } else {
            echo 'ok';
        }
    }

    public function searchAction()
    {
        $users = $this->model->search();
        $data = $this->model->adatbazis();
        echo json_encode($users);
    }
}