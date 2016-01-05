<?php

namespace Controllers;

use Repository\UserRepository;
use templates\Main;

class ListUsers implements Controller {

    public function action()
    {
        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $main = new Main();
        $body = new \templates\ListUsers();
        $users = UserRepository::getAllUsers();
        $body->setUsers($users);
        $main->setPageTitle("Users")->setBody($body);
        echo $main;
    }

}