<?php

namespace Controllers;

use Repository\CommentRepository;
use Repository\PostRepository;

class ViewPost implements Controller {

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

        if($post == null) {
            redirect(\route\Route::get("error404")->generate());
        }

        $comments = CommentRepository::getAll($id);

        $mainView = new \templates\Main2();
        $viewPostTemplate = new \templates\Viewpost();
        $viewPostTemplate->setPost($post)->setComments($comments);
        $mainView->setPageTitle('Post')->setBody((string) $viewPostTemplate);
        echo $mainView;
    }

}