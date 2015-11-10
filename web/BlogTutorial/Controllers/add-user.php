<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
    header('Location: Login.php');
}

include_once "../Views/AddUserHeader.html";
include('menu.php'); ?>
<p><a href="users.php">User Admin Index</a></p>

<h2>Add User</h2>

<?php

//if form has been submitted process it
if (isset($_POST['submit'])) {

    //collect form data
    extract($_POST);

    //very basic validation
    if ($username == '') {
        $error[] = 'Please enter the username.';
    }

    if ($password == '') {
        $error[] = 'Please enter the password.';
    }

    if ($passwordConfirm == '') {
        $error[] = 'Please confirm the password.';
    }

    if ($password != $passwordConfirm) {
        $error[] = 'Passwords do not match.';
    }

    if ($email == '') {
        $error[] = 'Please enter the email address.';
    }

    if (!isset($error)) {

        try {

            //insert into database
            insertUser($username, $password, $email);

            //redirect to index page
            header('Location: users.php?action=added');
            exit;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}

//check for any errors
if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="error">' . $error . '</p>';
    }
}

include_once "../Views/AddUserFooter.html";