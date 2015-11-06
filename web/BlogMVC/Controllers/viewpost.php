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

$mainView = new \templates\Main();
$viewPostTemplate = new \templates\Viewpost();
$viewPostTemplate->setPost($post);
$mainView->setPageTitle('Post')->setBody((string) $viewPostTemplate);
echo $mainView;