<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 15:54
 */

include_once "../inc/global.php";
include_once "../lib/html_library.php";
include_once "../Views/login_view.php";
include_once "../Model/Person.php";

if (isset($_SESSION['username'])) {
    header("Location: comments.php");
} else if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkUser($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: comments.php");
        exit;
    } else {
        header("Location: homepage.php");
        exit;
    }
} else if (isset($_POST['register'])) {
    header("Location: register.php");
} else {
    display_login_form();
}