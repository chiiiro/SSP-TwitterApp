<?php

namespace Repository;

use includes\libraries\Database;
use Models\Comment;

class CommentRepository {

    public static function getAll($id)
    {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM blog_comments WHERE postid = ?");
        $query->execute([$id]);
        return $query;
    }

    public static function checkId($id) {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM blog_comments WHERE postid = ?");
        $query->execute([$id]);
        return $query->fetch();
    }

    public static function insertComment(Comment $comment)
    {
        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO blog_comments (postid,content,userid) VALUES (?, ?, ?)');
        $query->execute([$comment->getPostid(), $comment->getContent(), $comment->getUserid()]);
    }

}