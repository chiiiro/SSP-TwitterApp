<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if (!$user->is_logged_in()) {
    header('Location: Login.php');
}

include_once "../Views/EditPostHeader.html";

include('menu.php'); ?>

<p><a href="./">Blog Admin Index</a></p>

<h2>Edit Post</h2>


<?php

//if form has been submitted process it
if (isset($_POST['submit'])) {

    $_POST = array_map('stripslashes', $_POST);

    //collect form data
    extract($_POST);

    //very basic validation
    if ($postID == '') {
        $error[] = 'This post is missing a valid id!.';
    }

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

            $postSlug = slug($postTitle);

            //insert into database
            updatePost($postTitle, $postDesc, $postCont, $postID);

            //redirect to index page
            header('Location: index.php?action=updated');
            exit;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

}

?>


<?php
//check for any errors
if (isset($error)) {
    foreach ($error as $error) {
        echo $error . '<br />';
    }
}

try {

    $postID = $_GET['id'];
    $stmt = $db->prepare('SELECT postid, posttitle, postdesc, postcont FROM blog_posts WHERE postid = ?');
    $stmt->execute([$postID]);
    $post = $stmt->fetch();

} catch (PDOException $e) {
    echo $e->getMessage();
}

include_once "../Views/EditPostFooter.html";