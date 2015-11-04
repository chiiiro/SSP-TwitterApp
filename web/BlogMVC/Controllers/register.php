<?php

include_once "../includes/config.php";

$pageTitle = 'Register';
require_once (VIEW_PATH.'register.view.php');

if(isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $errorMessage = '';
    $errors = null;

    if ($username == '') {
        $errors[] = 'Please enter username.';
    }

    if ($password == '') {
        $errors[] = 'Please enter password.';
    }

    if ($email == '') {
        $errors[] = 'Please enter e-mail adress.';
    }

    if (count($errors) != 0) {
        $errorMessage = "Please enter the missing data.";
    }

    if ($errorMessage != '') {
        echo "<script language='javascript'>
            document.getElementById('display').innerHTML = '$errorMessage';
        </script>";
    } else {
        $user = new User();
        $user->$username = $username;
        $user->$password = $password;
        $user->$email = $email;

        try {
            UserRepository::register($user);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}