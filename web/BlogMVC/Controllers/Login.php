<?php

namespace Controllers;

use Repository\UserRepository;
use templates\Main;

class Login implements Controller {

    public function action()
    {
        $mainView = new Main();
        $loginView = new \templates\Login();
        $mainView->setPageTitle('Login')->setBody((string) $loginView);

        echo $mainView;

        if (UserRepository::is_logged_in()) {
            redirect(\route\Route::get("userIndex")->generate());
        }

        if (post('login')) {

            $username = trim(post('username'));
            $password = trim(post('password'));

            $hash = hash_password($password);

            if (UserRepository::login($username, $hash)) {
                redirect(\route\Route::get("userIndex")->generate());
                exit;
            } else {
                $errorMessage = 'Wrong username or password. User does not exists!';
                alert('display', $errorMessage);
            }
        }

        if (isset($message)) {
            echo $message;
        }
    }

}