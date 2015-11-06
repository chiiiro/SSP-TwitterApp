<?php

include_once "../includes/config.php";
include_once "../Template.php";

$username = $_SESSION['username'];

$posts = PostRepository::getAllByUsername($username);

$userIndexTemplate = Template::create("user_index", array(
    "posts" => $posts
));

echo Template::create("main", array(
    "pageTitle" => "User posts",
    "body" => $userIndexTemplate->render()
));