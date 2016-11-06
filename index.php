<?php
error_reporting(E_ALL);

//Új class esetén itt hívom meg (include)
include 'controllers/BaseController.php';
include 'classes/Database.php';
include 'classes/Model.php';
include 'classes/Bootstrap.php';
include 'configs/config.php';
include 'classes/Session.php';
include 'classes/View.php';

//sessiont idítja el, h működjön
Session::init();

//példányosítom itt
$database = new Database();
$bootstrap = new Bootstrap();

