<?php

namespace Controllers;

use Models\Comment;
use Repository\CommentRepository;
use Repository\TweetRepository;
use Repository\UserRepository;
use templates\Main;

class ViewTweet implements Controller {

    public function action()
    {
        checkUnauthorizedAccess();

        $tweetID = getIdFromURL();
        $tweet = TweetRepository::getTweetById($tweetID);
        $comments = CommentRepository::getTweetComments($tweetID);

        $main = new Main();
        $body = new \templates\ViewTweet();
        $body->setTweet($tweet)->setComments($comments);
        echo $main->setPageTitle("Tweet")->setBody($body);
    }

    public function postTweetComment() {

        if(post('postComment')) {
            $tweetid = getIdFromURL();
            $userid = UserRepository::getIdByUsername($_SESSION['username']);
            $content = htmlentities(trim(post('comment')));

            $comment = new Comment();
            $comment->setTweetid($tweetid);
            $comment->setUserid($userid);
            $comment->setContent($content);

            try {
                CommentRepository::postComment($comment);
                redirect(\route\Route::get("viewTweet")->generate(array("id" => $tweetid)));
            } catch (\PDOException $e) {
                $e->getMessage();
            }

        }
    }

}