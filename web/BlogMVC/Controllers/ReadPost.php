<?php

namespace Controllers;

use Repository\PostRepository;

class ReadPost implements Controller {

    public function action() {

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("error404")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("error404")->generate());
        }

        $username = $_SESSION['username'];

        $post = PostRepository::getById($id);

        if($post == null) {
            redirect(\route\Route::get("error404")->generate());
        }

        if($post['username'] !== $username) {
            redirect(\route\Route::get("error404")->generate());
        }


        $mainView = new \templates\Main();
        $readTemplate = new \templates\Read();
        $readTemplate->setPost($post);
        $mainView->setPageTitle('User post')->setBody((string) $readTemplate);
        echo $mainView;
    }

}