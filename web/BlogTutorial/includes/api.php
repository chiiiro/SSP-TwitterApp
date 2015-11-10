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
    $query = $db->prepare('SELECT posttitle, postcont, postdate FROM blog_posts WHERE postid = ?');
    $query->execute([$postID]);
    $post = $query->fetch();
    return $post;
}

function deletePostByID($postID) {
    global $db;
    $stmt = $db->prepare('DELETE FROM blog_posts WHERE postid = ?') ;
    $stmt->execute([$postID]);
}

function insertPost($postTitle, $postDesc, $postCont) {
    global $db;
    $stmt = $db->prepare('INSERT INTO blog_posts (posttitle,postdesc,postcont,postdate) VALUES (?, ?, ?, ?)');
    $stmt->execute([$postTitle, $postDesc, $postCont, date('Y-m-d H:i:s')]);
}

function insertUser($username, $password, $email) {
    global $db;
    $stmt = $db->prepare('INSERT INTO blog_members (username,password,email) VALUES (?, ?, ?)');
    $stmt->execute([$username, $password, $email]);
}

function updatePost($postTitle, $postDesc, $postCont, $postID) {
    global $db;
    $stmt = $db->prepare('UPDATE blog_posts SET posttitle = ?, postdesc = ?, postcont = ? WHERE postid = ?');
    $stmt->execute([$postTitle, $postDesc, $postCont, $postID]);
}