<?php

include_once "../inc/global.php";
include_once "../DB/connection.php";
include_once "../Models/User.php";
include_once "../lib/html_library.php";
include_once "../Views/IndexView.php";

$db = Database::getInstance();
$user = new User($db);

if(!$user->isLoggedIn()) {
    redirect("Login.php");
}

try {
    $query = $db->prepare("SELECT * FROM blog_posts");
    $query->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}

displayPostsInTable($query);

if(post('logout')) {
    $user->logout();
    redirect("../homepage.php");
}

if(post('back')) {
    redirect("Menu.php");
}