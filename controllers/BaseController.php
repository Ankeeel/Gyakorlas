<?php

class BaseController
{
    public $model;

    function __construct()
    {
        $this->view = new View();
    }


    public function loadModel($nev)
    {
        $path = 'models/' . $nev . 'Model.php';
        if (file_exists($path)) {
            include $path;
            $m = $nev . 'Model';
            $this->model = new $m();
        }

    }
}