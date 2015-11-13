<?php

namespace Controllers;

use Models\User;
use Repository\UserRepository;
use templates\Main;

class ChangePwd implements Controller {

    public function action()
    {

        $mainView = new Main();
        $pwdView = new \templates\ChangePwd();
        $mainView->setPageTitle('Change password')->setBody((string)$pwdView);
        echo $mainView;

        $username = $_SESSION['username'];
        $userid = UserRepository::getIdByUsername($username);

        if(isset($_POST['change'])) {
            $pwd = $_POST['password1'];
            $confirmedPwd = $_POST['password2'];

            if($pwd === $confirmedPwd) {
                $hash = hash_password($pwd);

                $user = new User();
                $user->setId($userid);
                $user->setUsername($username);
                $user->setPassword($hash);
                UserRepository::changePassword($user);
            } else {
                alert('error', 'Both entries must be the same.');
            }

        }

    }

}