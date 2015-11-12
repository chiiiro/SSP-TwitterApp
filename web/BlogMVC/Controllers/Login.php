<?php

namespace Controllers;

use Repository\UserRepository;

class Login implements Controller {

    public function action()
    {
        $mainView = new \templates\Main2();
        $loginView = new \templates\Login();
        $mainView->setPageTitle('Login')->setBody((string) $loginView);

        echo $mainView;

        if (UserRepository::is_logged_in()) {
            redirect(\route\Route::get("userIndex")->generate());
        }

        if (isset($_POST['login'])) {

            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $hash = hash_password($password);

            if (UserRepository::login($username, $hash)) {
                redirect(\route\Route::get("userIndex")->generate());
                exit;
            } else {
                $errorMessage = 'Wrong username or password. User does not exists!';
                echo "<script language='javascript'>
                     document.getElementById('display').innerHTML = '$errorMessage';
                </script>";
            }
        }

        if (isset($message)) {
            echo $message;
        }
    }

}