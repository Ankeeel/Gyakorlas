<?php

class SettingsController extends BaseController
{
    public function personalSetting(){


       // $this->view->adat = $this->model->personalData();
        $this->view->render('settings');
    }

    public function bekuld()
    {
        $this->model->settingsSave();
    }
}