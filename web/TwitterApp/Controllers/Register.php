<?php

namespace Controllers;

use Models\User;
use Repository\UserRepository;
use templates\Main;

class Register implements Controller {

    public function action()
    {
        $main = new Main();
        $main->setPageTitle("Sign up for TwitterApp");
        $register = new \templates\Register();
        $main->setBody($register);
        echo $main;

        ?>

        <?php

        if(post('register')) {

            $firstName = trim(post('fname'));
            $lastName = trim(post('lname'));
            $username = trim(post('username'));
            $password = trim(post('password'));
            $hashedPassword = hash_password($password);
            $confirmedPassword = trim(post('cpassword'));
            $email = trim(post('email'));
            $userSecurityNumber = (int) trim(post('security'));

            //server-side validation
            $error = false;
            if(!ctype_alpha($firstName) || strlen($firstName) < 3 || strlen($firstName) > 25) {
                $error = true;
            }

            if(!ctype_alpha($lastName) || strlen($lastName) < 3 || strlen($lastName) > 25) {
                $error = true;
            }

            if(!ctype_alnum($username) || strlen($username) < 4 || strlen($lastName) > 25) {
                $error = true;
            }

            if(!ctype_alnum($password) || strlen($password) < 4 || strlen($password) > 25) {
                $error = true;
            }

            if(!ctype_alnum($confirmedPassword) || strlen($confirmedPassword) < 4 || strlen($confirmedPassword) > 25) {
                $error = true;
            }

            if($userSecurityNumber < 1113 || $userSecurityNumber > 1207) {
                $error = true;
            }

            if($password === $confirmedPassword && !$error){

                $user = new User();
                $user->setFirstName($firstName);
                $user->setLastName($lastName);
                $user->setUsername($username);
                $user->setPassword($hashedPassword);
                $user->setEmail($email);

                try {
                    UserRepository::registerUser($user);
                } catch (\PDOException $e) {
                    $e->getMessage();
                }

            }



        }
    }

}