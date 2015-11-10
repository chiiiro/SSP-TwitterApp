<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
    header('Location: Login.php');
}

include_once "../Views/AddPostHeader.html";

include('menu.php'); ?>
    <p><a href="./">Blog Admin Index</a></p>

    <h2>Add Post</h2>

<?php

//if form has been submitted process it
if (isset($_POST['submit'])) {

    $_POST = array_map('stripslashes', $_POST);

    //collect form data
    extract($_POST);

    //very basic validation
    if ($postTitle == '') {
        $error[] = 'Please enter the title.';
    }

    if ($postDesc == '') {
        $error[] = 'Please enter the description.';
    }

    if ($postCont == '') {
        $error[] = 'Please enter the content.';
    }

    if (!isset($error)) {

        try {

            //insert into database
            insertPost($postTitle, $postDesc, $postCont);

            //redirect to index page
            header('Location: index.php?action=added');
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


include_once "../Views/AddPostFooter.html";