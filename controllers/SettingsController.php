<?php

class SettingsController extends BaseController
{
    public function personalSettingAction(){

        $this->view->genders = $this->model->getGender();
        $this->view->adatok = $this->model->personalData();
        $this->view->render('settings');
    }

    public function bekuldAction()
    {
        $this->model->settingsSave();
        header('Location: /settings/personalsetting');
    }
}