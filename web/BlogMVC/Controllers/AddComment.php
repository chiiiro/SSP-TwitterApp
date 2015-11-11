<?php

namespace Controllers;

use Models\Comment;
use Repository\CommentRepository;

class AddComment implements Controller {

    public function action()
    {
        $content = NULL;

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("error404")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("error404")->generate());
        }

        if(isset($_POST['add'])) {
            $content = $_POST['content'];
            $username = $_SESSION['username'];

            try {
                $comment = new Comment();
                $comment->setPostid($id);
                $comment->setContent($content);
                $comment->setUsername($username);
                CommentRepository::insertComment($comment);
                redirect(\route\Route::get("readPost")->generate(array("id"=>$id)));
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }

        }

        $mainView = new \templates\Main();
        $addComment = new \templates\AddComment();
        $addComment->setContent($content)->setId($id);
        $mainView->setPageTitle('Add comment')->setBody((string)$addComment);
        echo $mainView;

    }

}