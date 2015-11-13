<?php

namespace Controllers;

use Models\User;
use Repository\UserRepository;
use templates\Main;

class ChangeUser implements Controller {

    public function action()
    {

        $mainView = new Main();
        $userView = new \templates\ChangeUser();
        $mainView->setPageTitle('Change username')->setBody((string)$userView);
        echo $mainView;

        $username = $_SESSION['username'];
        $userid = UserRepository::getIdByUsername($username);

        if(isset($_POST['change'])) {
            $user1 = $_POST['username1'];
            $user2 = $_POST['username2'];

            if($user1 === $user2) {
                $user = new User();
                $user->setId($userid);
                $user->setUsername($user1);
                UserRepository::changeUsername($user);
                $_SESSION['username'] = $user1;
            } else {
                alert('error', 'Both entries must be the same.');
            }

        }

    }

}