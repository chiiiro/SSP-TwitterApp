<?php

namespace Controllers;

use Repository\UserRepository;
use Models\User;
use templates\Main;

class Register implements Controller {

    public function action()
    {
        $mainView = new Main();
        $registerView = new \templates\Register();
        $mainView->setPageTitle('Register')->setBody((string) $registerView);

        echo $mainView;

        $error = '';

        if(post('register')) {

            $username = trim(post('username'));

            $password = trim(post('password'));
            $hash = hash_password($password);

            $email = post('email');

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
                } catch (\PDOException $e) {
                    $e->getMessage();
                }
            } else {
                alert('display', 'Error while submitting data');
            }

        }
    }

}