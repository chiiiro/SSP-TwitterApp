<?php

namespace Controllers;

use templates\Main;

class ErrorPage implements  Controller {

    public function action()
    {
        $main = new Main();
        $main->setPageTitle("404 Not Found");
        $body = new \templates\ErrorPage();
        $main->setBody($body);
        echo $main;
    }

}