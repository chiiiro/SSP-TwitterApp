<?php

namespace Controllers;

use Repository\UserRepository;
use Models\User;
use templates\Main2;

class Register implements Controller {
    public function action()
    {
        $mainView = new Main2();
        $registerView = new \templates\Register();
        $mainView->setPageTitle('Register')->setBody((string) $registerView);

        echo $mainView;

        $error = '';

        if(isset($_POST['register'])) {

            $username = trim($_POST['username']);

            $password = trim($_POST['password']);
            $hash = hash_password($password);

            $email = $_POST['email'];

            if(!ctype_alnum($username)) {
                $error .= 'Username should be alpha numeric characters only.';
            }

            if(strlen($username) < 4 || strlen($username) > 20) {
                $error .= 'Username should be within 4-20 characters long.';
            }

            if(!ctype_alnum($password)) {
                $error .= 'Username should be alpha numeric characters only.';
            }

            if(strlen($password) < 4 || strlen($password) > 20) {
                $error .= 'Username should be within 4-20 characters long.';
            }

            if($error == '') {
                $user = new User();
                $user->setUsername($username);
                $user->setPassword($hash);
                $user->setEmail($email);

                try {
                    UserRepository::register($user);
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            } else {
                echo "<script type='text/javascript'>document.getElementById('error').innerHTML = 'Error while submiting data.';</script>";
            }

        }
    }

}