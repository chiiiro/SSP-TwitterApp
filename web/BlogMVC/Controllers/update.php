<?php

include_once "../includes/config.php";
include_once "../Template.php";

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

    // Initialize form values
    $title = NULL;
    $description = NULL;
    $content = NULL;

    // Get id from querystring
    $id = $_GET['id'];

    // Check for inital page request
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $post = PostRepository::getById($id);

        // Set form values
        $title = $post['posttitle'];
        $description = $post['postdesc'];
        $content = $post['postcont'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get user input from form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $date = date('Y-m-d');

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
                $post->setId($id);
                $post->setTitle($title);
                $post->setDescription($description);
                $post->setContent($content);
                $post->setCreated($date);
                PostRepository::update($post);
                redirect("user_index.php");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

} // Check for page postback
else {

    // Redirect to site root
    redirect("../index.php");
}

$mainView = new \templates\Main();
$updateView = new \templates\AddUpdate();
$updateView->setPageTitle('Update post')->setTitle($title)->setDescription($description)->setContent($content);
$mainView->setPageTitle('Update post')->setBody((string) $updateView);
echo $mainView;