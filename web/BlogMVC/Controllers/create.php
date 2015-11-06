<?php

include_once "../includes/config.php";
include_once "../Template.php";

// Initialize form values
$title = NULL;
$description = NULL;
$content = NULL;

// Check for page postback
if (isset($_POST['add'])) {

    // Get user input from form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $date = date('Y-m-d H:i:s');
    $username = $_SESSION['username'];

    $errors = null;
    $errorMessage = '';

    if ($title == '') {
        $errors[] = 'Please enter the title.';
    }

    if ($description == '') {
        $errors[] = 'Please enter the description.';
    }

    if ($content == '') {
        $errors[] = 'Please enter the content.';
    }

    if (count($errors) != 0) {
        $errorMessage = "Please enter missing data.";
    }

    if ($errorMessage != '') {
        echo "<script language='javascript'>
            alert('$errorMessage');
        </script>";
    } else {
        try {
            $post = new Post();
            $post->setTitle($title);
            $post->setDescription($description);
            $post->setContent($content);
            $post->setCreated($date);
            $post->setUsername($username);
            PostRepository::insert($post);
            redirect("user_index.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

$createTemplate = Template::create("createupdate", array(
    "pageTitle" => "Add post",
    "title" => $title,
    "description" => $description,
    "content" => $content
));

echo Template::create("main", array(
    "pageTitle" => "Add post",
    "body" => $createTemplate->render()
));