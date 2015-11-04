<?php

include_once "includes/config.php";

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

    // Get id from querystring
    $id = $_GET['id'];

    $post = PostRepository::getById($id);

    if($post == null) {
        throw new Exception("Post with provided id does not exists.");
    }

} else {

    // Redirect to site root
    redirect("../index.php");
}

$pageTitle = 'Post';

require_once (VIEW_PATH.'viewpost.view.php');