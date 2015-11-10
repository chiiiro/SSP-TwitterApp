<?php

include_once "../inc/global.php";
include_once "../Models/User.php";
include_once "../DB/connection.php";
include_once "../lib/html_library.php";

$db = Database::getInstance();
$user = new User($db);

$query = $db->prepare("SELECT * FROM blog_members");
$query->execute();

include_once "../Views/UsersView.php";

if(post('back')) {
    redirect("Menu.php");
}
