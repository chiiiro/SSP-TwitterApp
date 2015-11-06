<?php

include_once "includes/config.php";
include_once "Template.php";

//$pageTitle = 'Home page';

$posts = PostRepository::getAll();

if(UserRepository::is_logged_in()) {
    redirect("Controllers/user_index.php");
}

if(isset($_POST['login'])) {
    redirect("Controllers/login.php");
} else if(isset($_POST['register'])) {
    redirect("Controllers/register.php");
}

//require_once (VIEW_PATH.'index.view.php');

$indexTemplate = Template::create("index", array(
    "posts" => $posts
));

echo Template::create("main", array(
   "pageTitle" => "Home page",
    "body" => $indexTemplate->render()
));