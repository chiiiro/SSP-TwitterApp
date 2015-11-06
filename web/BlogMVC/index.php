<?php

include_once "includes/config.php";
include_once "Template.php";

$posts = PostRepository::getAll();

if(UserRepository::is_logged_in()) {
    redirect("Controllers/user_index.php");
}

if(isset($_POST['login'])) {
    redirect("Controllers/Login.php");
} else if(isset($_POST['register'])) {
    redirect("Controllers/register.php");
}

$mainView = new \templates\Main();
$indexView = new \templates\Index();
$indexView->setPosts($posts);
$mainView->setPageTitle('Home page')->setBody((string) $indexView);

echo $mainView;