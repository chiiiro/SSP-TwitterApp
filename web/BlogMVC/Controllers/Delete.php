<?php

namespace Controllers;

use Repository\PostRepository;
use Repository\UserRepository;

class Delete implements Controller {

    public function action()
    {

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("error404")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("error404")->generate());
        }

        $post = PostRepository::getById($id);

        $username = getUsername();
        $postUsername = UserRepository::getUsernameById($post['userid']);

        if($post == null) {
            redirect(\route\Route::get("error404")->generate());
        }

        if($postUsername !== $username) {
            redirect(\route\Route::get("error404")->generate());
        }

        PostRepository::delete($id);

        redirect(\route\Route::get("userIndex")->generate());

    }

}