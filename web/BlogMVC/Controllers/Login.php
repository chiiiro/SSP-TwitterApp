<?php

namespace Controllers;

use Repository\UserRepository;

class Login implements Controller {

    public function action()
    {
        $mainView = new \templates\Main();
        $loginView = new \templates\Login();
        $mainView->setPageTitle('Login')->setBody((string) $loginView);

        echo $mainView;

        if (UserRepository::is_logged_in()) {
            redirect(\route\Route::get("userIndex")->generate());
        }

        if (isset($_POST['login'])) {

            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $errors = NULL;
            $errorMessage = '';

            if ($username == '') {
                $errors[] = 'Please enter username.';
            }

            if ($password == '') {
                $errors[] = 'Please enter password.';
            }

            if (count($errors) == 2) {
                $errorMessage = "Please enter username and password.";
            } else if ($errors[0] == 'Please enter username.') {
                $errorMessage = "Please enter username.";
            } else if ($errors[0] == 'Please enter password.'){
                $errorMessage = "Please enter password.";
            }

            if ($errorMessage != '') {
                echo "<script language='javascript'>
          document.getElementById('display').innerHTML = '$errorMessage';
        </script>";
            } else {
                if (UserRepository::login($username, $password)) {
                    redirect(\route\Route::get("userIndex")->generate());
                    exit;
                } else {
                    $errorMessage = 'Wrong username or password!';
                    echo "<script language='javascript'>
                document.getElementById('display').innerHTML = '$errorMessage';
            </script>";
                }
            }

        }

        if (isset($message)) {
            echo $message;
        }
    }

}