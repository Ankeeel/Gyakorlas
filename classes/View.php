<?php

class View
{
    public function render($nev,$noInclude=false){
        if(!$noInclude) {
            include 'views/haeder.phtml';
            include '/../views/' . $nev . '.phtml';
            include 'views/footer.phtml';
        }
        else{
            include '/../views/' . $nev . '.phtml';
        }
    }
}