<?php

namespace Controllers;

use Repository\TweetRepository;
use templates\Main;

class ViewTweet implements Controller {

    public function action()
    {
        $tweetID = getIdFromURL();
        $tweet = TweetRepository::getTweetById($tweetID);

        $main = new Main();
        $body = new \templates\ViewTweet();
        $body->setTweet($tweet);
        echo $main->setPageTitle("Tweet")->setBody($body);
    }

}