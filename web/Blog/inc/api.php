<?php

include_once "DB/connection.php";

function selectAllPosts() {
    try {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM blog_posts");
        $query->execute();
        return $query;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function selectPostById($postID) {
    $db = Database::getInstance();
    $query = $db->prepare('SELECT * FROM blog_posts WHERE "postID" = ?');
    $query->execute([$postID]);

    $post = $query->fetch();
    if ($post['postID'] == '') {
        redirect("homepage.php");
        exit;
    } else {
        return $post;
    }
}