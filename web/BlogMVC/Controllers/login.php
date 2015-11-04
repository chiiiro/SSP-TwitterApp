<?php

include_once "../includes/config.php";

$pageTitle = 'Login';
require_once(VIEW_PATH . 'login.view.php');

if (UserRepository::is_logged_in()) {
    redirect('user_index.php');
}

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $errors = NULL;
    $errorMessage = '';

    if ($username == '') {
        $errors[] = 'Please enter username.';
    }

    if ($password == '') {
        $errors[] = 'Please enter password.';
    }

    if (count($errors) == 2) {
        $errorMessage = "Please enter username and password.";
    } else if ($errors[0] == 'Please enter username.') {
        $errorMessage = "Please enter username.";
    } else if ($errors[0] == 'Please enter password.'){
        $errorMessage = "Please enter password.";
    }

    if ($errorMessage != '') {
        echo "<script language='javascript'>
          document.getElementById('display').innerHTML = '$errorMessage';
        </script>";
    } else {
        if (UserRepository::login($username, $password)) {
            redirect('user_index.php');
            exit;
        } else {
            $errorMessage = 'Wrong username or password!';
            echo "<script language='javascript'>
                document.getElementById('display').innerHTML = '$errorMessage';
            </script>";
        }
    }

}

if (isset($message)) {
    echo $message;
}