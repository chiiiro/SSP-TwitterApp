<?php

namespace Controllers;
use Controllers\Controller;
use Repository\UserRepository;
use templates\Main;

class Index implements \Controllers\Controller {

    //renderira glavnu stranicu i obavlja logiranje korisnika
    public function action()

    {

        $main = new Main();
        $main->setPageTitle("Twitter App");
        $body = new \templates\Index();
        $main->setBody($body);
        echo $main;

        if(UserRepository::isLoggedIn()) {
            redirect(\route\Route::get("twitterWall")->generate());
        }


        if (post('login')) {

            $username = trim(post('username'));
            $password = trim(post('password'));

            $hashedPassword = hash_password($password);

            if (UserRepository::login($username, $hashedPassword)) {
                redirect(\route\Route::get("twitterWall")->generate());
                exit;
            } else {
                ?>
                <script src="assets/js/loginError.js"></script>
                <?php
            }

        }

    }

    //logout korisnika
    public function logout() {
        UserRepository::logout();
        redirect(\route\Route::get("index")->generate());
    }

}