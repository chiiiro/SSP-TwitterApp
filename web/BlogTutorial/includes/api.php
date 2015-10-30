<?php

function selectAllPosts() {
    try {
        global $db;
        $query = $db->prepare("SELECT * FROM blog_posts");
        $query->execute();
        return $query;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function selectPostById($postID) {
    global $db;
    $query = $db->prepare('SELECT posttitle, postcont, postdate FROM blog_posts WHERE postslug = ?');
    $query->execute([$postID]);
    $post = $query->fetch();
    return $post;
}

function deletePostByID($postID) {
    global $db;
    $stmt = $db->prepare('DELETE FROM blog_posts WHERE postid = ?') ;
    $stmt->execute([$postID]);
}