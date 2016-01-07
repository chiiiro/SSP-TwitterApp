<?php

namespace Repository;

use includes\libraries\Database;
use Models\Tweet;

class TweetRepository {

    public static function getMyTweets($myID) {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM tweets WHERE toid = ? ORDER BY tweetid DESC ");
        $query->execute([$myID]);
        return $query;
    }

    public static function postTweet(Tweet $tweet) {
        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO tweets (fromid,toid,content,tag) VALUES (?, ?, ?, ?)');
        $query->execute([$tweet->getFromid(),$tweet->getToid(), $tweet->getContent(), $tweet->getTag()]);
    }

}