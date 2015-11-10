<?php

include_once "inc/global.php";
include_once "inc/api.php";
include_once "Views/HomepageView.php";
include_once "Models/User.php";

$db = Database::getInstance();
$user = new User($db);

$posts = selectAllPosts();
displayPosts($posts);
displayIndexForm();

if(post('login')) {
    redirect("Controllers/Login.php");
}