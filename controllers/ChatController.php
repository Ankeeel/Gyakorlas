<?php

class ChatController extends BaseController
{
    public function chatIndexAction(){
        $this->view->adatok = $this->model->selfData();
        $this->view->comment = $this->model->commentKiir();
        $this->view->render('chat');


    }

    public function commentAction(){
        $this->model->comment();
        header('Location: /chat/chatindex');
    }

}