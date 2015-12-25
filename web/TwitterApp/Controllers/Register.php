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

            $firstName = trim(post('first-name'));
            $lastName = trim(post('last-name'));
            $username = trim(post('username'));
            $password = trim(post('password'));
            $hashedPassword = hash_password($password);
            $confirmedPassword = trim(post('confirm-password'));
            $email = trim(post('email'));
            $userSecurityNumber = (int) trim(post('security'));

            if($password != $confirmedPassword) {
                ?>

                <script>
                    document.getElementById("passwordCheck").innerHTML =
                        "Passwords doesn't match.";
                </script>

                <?php
            } else if($userSecurityNumber < 1113 || $userSecurityNumber > 1207) {
                ?>

                <script>
                    document.getElementById("registerError").innerHTML =
                        "Please re-enter security number.";
                </script>

                <?php
            } else {

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