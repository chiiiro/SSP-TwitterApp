<?php

namespace Repository;

use includes\libraries\Database;
use Models\Comment;

class CommentRepository {

    public static function getTweetComments($tweetID) {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM comments WHERE tweetid = ? ORDER BY commid DESC ");
        $query->execute([$tweetID]);
        return $query->fetchAll();
    }

    public static function postComment(Comment $comment) {
        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO comments (tweetid,userid,content) VALUES (?, ?, ?)');
        $query->execute([$comment->getTweetid(), $comment->getUserid(), $comment->getContent()]);
    }

}