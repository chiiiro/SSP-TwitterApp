<?php

namespace Controllers;

use Controllers\Controller;
use Repository\PostRepository;

class UserIndex implements Controller {

    public function action() {

        $username = $_SESSION['username'];

        $posts = PostRepository::getAllByUsername($username);

        $mainView = new \templates\Main();
        $userIndexView = new \templates\UserIndex();
        $userIndexView->setPosts($posts);
        $mainView->setPageTitle('User posts')->setBody((string) $userIndexView);

        echo $mainView;

    }

}