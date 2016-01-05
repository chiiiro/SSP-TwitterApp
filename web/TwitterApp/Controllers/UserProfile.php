<?php

namespace Controllers;

use Repository\UserRepository;
use templates\Main;

class UserProfile implements Controller {

    public function action()
    {
        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $user = UserRepository::getUserByID($id);
        if($user == null) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $main = new Main();
        $body = new \templates\UserProfile();
        $user = UserRepository::getUserByID($id);
        $body->setUser($user);
        $main->setPageTitle("User Profile")->setBody($body);
        echo $main;


    }

}