<?php

namespace Controllers;

use templates\Main;

class TwitterWall implements Controller {

    public function action()
    {

        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $main = new Main();
        $main->setPageTitle("TwitterApp");
        $body = new \templates\TwitterWall();
        $main->setBody($body);
        echo $main;
    }

}