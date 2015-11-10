<?php

include_once "inc/global.php";
include_once "inc/api.php";
include_once "Views/ViewpostView.php";

$postID = $_GET['id'];
$post = selectPostById($postID);
displayPost($post);