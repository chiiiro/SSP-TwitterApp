<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 23/10/15
 * Time: 11:02
 */

include_once "../inc/global.php";
include_once "../lib/html_library.php";
include_once "../Views/register_view.php";
include_once "../Model/Person.php";

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(checkUser($username, $password)) {
        echo "Username already exists!";
    } else {
        $person = new Person();
        $person->username = $username;
        $person->password = $password;
        $person->save();

        redirect("Login.php");
    }
}

if(isset($_POST['index'])) {
    redirect("homepage.php");
}