<?php

namespace Controllers;

class ShowUsers implements \Controllers\Controller {

    public function action()
    {
        $users = \Repository\UserRepository::getAllUsers();

        $mainView = new \templates\Main();
        $usersView = new \templates\ShowUsers();
        $usersView->setUsers($users);
        $mainView->setPageTitle("Users")->setBody($usersView);
        echo $mainView;
    }

}