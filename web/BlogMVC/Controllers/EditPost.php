<?php

namespace Controllers;

use Repository\PostRepository;
use Models\Post;

class EditPost implements Controller {

    public function action()
    {

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if (null === $id) {
            redirect(\route\Route::get("error404")->generate());
        }

        if (intval($id) < 1) {
            redirect(\route\Route::get("error404")->generate());
        }

        $username = $_SESSION['username'];

        $post = PostRepository::getById($id);

        if ($post == null) {
            redirect(\route\Route::get("error404")->generate());
        }

        if ($post['username'] !== $username) {
            redirect(\route\Route::get("error404")->generate());
        }

        $title = NULL;
        $description = NULL;
        $content = NULL;


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//            $post = PostRepository::getById($id);

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
                    redirect(\route\Route::get("userIndex")->generate());;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }

        $mainView = new \templates\Main();
        $updateView = new \templates\AddUpdate();
        $updateView->setPageTitle('Update post')->setTitle($title)->setDescription($description)->setContent($content);
        $mainView->setPageTitle('Update post')->setBody((string) $updateView);
        echo $mainView;
    }

}