<?php

include_once "../inc/global.php";
include_once "../Views/Login.html";
include_once "../Models/User.php";
include_once "../DB/connection.php";

$db = Database::getInstance();
$user = new User($db);

if($user->isLoggedIn()) {
    redirect("Menu.php");
}

if(post('login')){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($user->login($username,$password)){
        redirect("Menu.php");
        exit;


    } else {
        $message = '<p class="error">Wrong username or password</p>';
    }

}

if(post('home')) {
    redirect("../homepage.php");
}

if(isset($message)) {
    echo $message;
}