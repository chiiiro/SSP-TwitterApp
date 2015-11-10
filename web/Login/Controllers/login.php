<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 15:54
 */

include_once "../lib/html_library.php";
include_once "../Views/login_view.php";
include_once "../global.php";

//polje s predefiniranim podacima
$userinfo = array(
    'user1' => 'pass1',
    'user2' => 'pass2'
);

if(isset($_SESSION['username'])) {
    header("Location: comments.php");
} else if(isset($_POST['submit'])) {
    if(array_key_exists($_POST['username'], $userinfo) && $userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
        header("Location: comments.php");
        exit;
    } else {
        header("Location: homepage.php");
        exit;
    }
} else {
    display_login_form();
}
