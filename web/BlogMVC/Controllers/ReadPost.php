<?php

namespace Controllers;

use Repository\CommentRepository;
use Repository\PostRepository;
use Models\Comment;

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

        $checkId = CommentRepository::checkId($id);

        if($checkId == null) {
            redirect(\route\Route::get("readPost")->generate(array("id"=>$id)));
        }

        $comments = CommentRepository::getAll($id);

        $mainView = new \templates\Main();
        $readTemplate = new \templates\Read();
        $readTemplate->setPost($post)->setComments($comments);
        $mainView->setPageTitle('User post')->setBody((string) $readTemplate);
        echo $mainView;

        $error = '';

        if (isset($_POST['comment'])) {

            $content = trim($_POST['comm']);

            if($content === '') {
                $error = "Empty comment!";
            }

            $username = $_SESSION['username'];

            if($error == '') {
                try {
                    $comment = new Comment();
                    $comment->setPostid($id);
                    $comment->setContent(htmlentities($content));
                    $comment->setUsername($username);
                    CommentRepository::insertComment($comment);
                    redirect(\route\Route::get("readPost")->generate(array("id"=>$id)));
                } catch (\PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                echo "<script type='text/javascript'>document.getElementById('error').innerHTML = '$error';</script>";
            }

        }
    }

}