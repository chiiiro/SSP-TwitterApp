<?php

namespace Controllers;

use templates\Main;

class TwitterWall implements Controller {

    public function action()
    {
        $main = new Main();
        $main->setPageTitle("TwitterApp");
        $body = new \templates\TwitterWall();
        $main->setBody($body);
        echo $main;
    }

}