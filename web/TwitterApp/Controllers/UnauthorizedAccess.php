<?php

namespace Controllers;

use templates\Main;

class UnauthorizedAccess implements Controller {

    public function action()
    {
        $main = new Main();
        $body = new \templates\UnauthorizedAccess();
        $main->setPageTitle("UnauthorizedAccess")->setBody($body);
        echo $main;
    }

}