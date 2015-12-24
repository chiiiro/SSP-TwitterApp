<?php

namespace Controllers;

use Repository\CommentRepository;
use Repository\PostRepository;
use Models\Comment;
use Repository\UserRepository;
use templates\Main;

class ReadPost implements Controller {

    public function action() {

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("error404")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("error404")->generate());
        }

        $username = getUsername();

        $post = PostRepository::getById($id);

        if($post == null) {
            redirect(\route\Route::get("error404")->generate());
        }

        $userid = $post['userid'];
        $user = UserRepository::getUsernameById($userid);

        $comments = CommentRepository::getAll($id);


        $mainView = new Main();

        if(null === $username || $user !== $username) {

            $viewPostTemplate = new \templates\Viewpost();
            $viewPostTemplate->setPost($post)->setComments($comments);
            $mainView->setPageTitle('Post')->setBody((string) $viewPostTemplate);

        } else {
            $readTemplate = new \templates\Read();
            $readTemplate->setPost($post)->setComments($comments);
            $mainView->setPageTitle('User post')->setBody((string) $readTemplate);
        }

        echo $mainView;

    }

    public function postCommentAction() {
        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("error404")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("error404")->generate());
        }

        $username = getUsername();
        $userid = UserRepository::getIdByUsername($username);

        $error = '';
        if (post('comment')) {

            $content = trim(post('comment'));

            if($content === '') {
                $error = "Empty comment!";
            }

            if($error === '') {
                try {
                    $comment = new Comment();
                    $comment->setPostid($id);
                    $comment->setContent(htmlentities($content));
                    $comment->setUserid($userid);
                    CommentRepository::insertComment($comment);
                    if($userid == null) {
                        $username = 'guest';
                    }
                    echo json_encode(['message' => 'success', 'comment' => $comment->getContent(), 'user' => $username]);
                } catch (\PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                alert('error', $error);
            }

        }
    }
}