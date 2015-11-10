<?php

namespace Controllers;

use Repository\PostRepository;

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

        $username = $_SESSION['username'];

        $post = PostRepository::getById($id);

        if($post == null) {
            redirect(\route\Route::get("error404")->generate());
        }

        if($post['username'] !== $username) {
            redirect(\route\Route::get("error404")->generate());
        }

        PostRepository::delete($id);

        redirect(\route\Route::get("userIndex")->generate());

    }

}