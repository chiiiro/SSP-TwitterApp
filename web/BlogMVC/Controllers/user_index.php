<?php

include_once "../includes/config.php";
include_once "../Template.php";

$username = $_SESSION['username'];

$posts = PostRepository::getAllByUsername($username);

$userIndexTemplate = Template::create("UserIndex", array(
    "posts" => $posts
));

echo Template::create("main", array(
    "pageTitle" => "User posts",
    "body" => $userIndexTemplate->render()
));

$mainView = new \templates\Main();
$userIndexView = new \templates\UserIndex();
$userIndexView->setPosts($posts);
$mainView->setPageTitle('User posts')->setBody((string) $userIndexView);

echo $mainView;