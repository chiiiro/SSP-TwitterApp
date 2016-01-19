<?php

namespace Controllers;

use Models\TweetComment;
use Repository\TweetCommentRepository;
use Repository\TweetRepository;
use Repository\UserRepository;
use templates\Main;

class ViewTweet implements Controller {

    public function action()
    {
        checkUnauthorizedAccess();

        $tweetID = getIdFromURL();
        $tweet = TweetRepository::getTweetById($tweetID);
        $comments = TweetCommentRepository::getTweetComments($tweetID);

        $main = new Main();
        $body = new \templates\ViewTweet();
        $body->setTweet($tweet)->setComments($comments);
        echo $main->setPageTitle("Tweet")->setBody($body);
    }

    public function postTweetComment() {
        checkUnauthorizedAccess();
        $id = getIdFromURL();
        checkIntValueOfId($id);

        if(post('postComment')) {
            $tweetid = $id;
            $userid = UserRepository::getIdByUsername($_SESSION['username']);
            $content = htmlentities(trim(post('comment')));

            $comment = new TweetComment();
            $comment->setTweetid($tweetid);
            $comment->setUserid($userid);
            $comment->setContent($content);

            try {
                TweetCommentRepository::postComment($comment);
//                echo json_encode(['message' => 'success', 'comment' => $comment->getContent()]);
                redirect(\route\Route::get("viewTweet")->generate(array("id" => $tweetid)));
            } catch (\PDOException $e) {
                $e->getMessage();
            }

        }
    }

}