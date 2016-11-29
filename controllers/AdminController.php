<?php

class AdminController extends BaseController
{
    public function adminAction()
    {
        $this->view->uAdatok = $this->model->kilistaz();
        $this->view->render('admin');
    }

    public function generateAction()
    {
        $result = $this->model->generate();
        if ($result) {
            header('Location: /admin/admin');
            }
    }

}