<?php

namespace Controllers;
use Controllers\Controller;
use templates\Main;

class Index implements \Controllers\Controller {

    public function action()

    {

        $main = new Main();
        $main->setPageTitle("Twitter App");
        $body = new \templates\Index();
        $main->setBody($body);
        echo $main;

    }

}