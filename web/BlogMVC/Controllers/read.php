<?php

include_once "../includes/config.php";

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

    // Get id from querystring
    $id = $_GET['id'];

    $username = $_SESSION['username'];

    $post = PostRepository::getById($id);

    if($post['username'] !== $username) {
        redirect("404.php");
    }

} else {

    // Redirect to site root
    redirect("user_index.php");
}

$pageTitle = 'Post';

require_once (VIEW_PATH.'read.view.php');