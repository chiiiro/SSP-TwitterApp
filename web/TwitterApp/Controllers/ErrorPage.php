<?php

namespace Controllers;

use templates\Main;

class ErrorPage implements  Controller {

    public function action()
    {
        $body = new \templates\ErrorPage();
        echo $body;
    }


}