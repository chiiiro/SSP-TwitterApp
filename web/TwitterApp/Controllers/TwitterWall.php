<?php

namespace Controllers;

use Models\Tweet;
use Repository\TweetRepository;
use Repository\UserRepository;
use templates\Main;

class TwitterWall implements Controller {

    public function action()
    {

        $id = getIdFromURL();
        $user = UserRepository::getUserByID($id);

        checkRequestURL($id, $user);

        $tweets = TweetRepository::getMyTweets($id);

        $main = new Main();
        $body = new \templates\TwitterWall();
        $body->setTweets($tweets);
        echo $main->setPageTitle("TwitterApp")->setBody($body);

    }

    public function postTweet() {
        checkUnauthorizedAccess();

        if(post('tweet')) {
            $fromid = UserRepository::getIdByUsername($_SESSION['username']);
            $toid = getIdFromURL();
            $content = htmlentities(trim(post('content')));
            $tag = htmlentities(trim(post('tag')));

            $tweet = new Tweet();
            $tweet->setFromid($fromid);
            $tweet->setToid($toid);
            $tweet->setContent($content);
            $tweet->setTag($tag);

            try {
                TweetRepository::postTweet($tweet);
                redirect(\route\Route::get("twitterWall")->generate(array("id" => $toid)));
            } catch (\PDOException $e) {
                $e->getMessage();
            }
        }

    }

    public function searchResult() {
        $data = '';
        if(post('search')) {
            $str = post('search');
            $str = preg_replace("#[^0-9a-z]#i","",$str);
            $users = UserRepository::searchUsers($str);
            foreach($users as $user) {
                ?>
                    <div>
                        <a href="<?php echo \route\Route::get("twitterWall")->generate(array("id" => $user['userid'])); ?>">
                            <?php echo $user['username']?>
                        </a>
                    </div>
                <?php
            }
            echo $data;
        }
    }

}