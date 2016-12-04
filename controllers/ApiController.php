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
        echo json_encode($users);
    }
}