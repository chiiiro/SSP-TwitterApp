<?php

include_once "../includes/config.php";
include_once "../Template.php";

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

    // Get id from querystring
    $id = $_GET['id'];

    $post = PostRepository::getById($id);

    if($post == null) {
        redirect("404.php");
    }

} else {

    // Redirect to site root
    redirect("../index.php");
}

$viewPostTemplate = Template::create("viewpost", array(
        "post" => $post
    ));

echo Template::create("main", array(
        "pageTitle" => "Post",
        "body" => $viewPostTemplate->render()
    ));