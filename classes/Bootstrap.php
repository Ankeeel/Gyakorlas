<?php
class Bootstrap{
    function __construct(){
        $hiba = [];

        $url = isset($_GET['_url'])?$_GET["_url"]:null;
        $url = explode('/',$url);
        if(isset($url[1])&& !empty($url[1])){
            if(file_exists('controllers/'.$url[1].'Controller.php')) {


                include 'controllers/' . $url[1] . 'Controller.php'; //betöltjük a controllert

                $c = $url[1].'Controller';

                $controller = new $c(); // példányosítjuk azt
                $controller->loadModel($url[1]);

                    if (isset($url[2]) && !empty($url[2])) { //megvizsgáljuk ,hogy van-e 2. url paraméter
                        if(method_exists($controller,$url[2])) { //megvizsgáljuk ,hogy létezik -e az az action amit hívni próbálunk

                            if (isset($url[3]) && !empty($url[3])) {
                                $controller->{$url[2]}($url[3]);
                            }
                            else{
                                $controller->{$url[2]}();
                            }
                        }else{
                            $hiba[] = 'nemlétező method';
                        }
                    }

            }else{
                $hiba[] = 'nem létező controller';
            }
        }
        else {
            /*include 'controllers/Dashboard.php';
            $dashboard = new Dashboard();
            include "models/DashboardModel.php";
            $dashboardModel = new DashbordModel();*/
        }
    }
}