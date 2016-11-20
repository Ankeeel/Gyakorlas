<?php

class SettingsController extends BaseController
{
    public function personalSetting(){

        $this->view->genders = $this->model->getGender();
        $this->view->adatok = $this->model->personalData();
        $this->view->render('settings');
    }

    public function bekuld()
    {
        $this->model->settingsSave();
    }
}