<?php

namespace Controllers;

use Repository\PostRepository;
use Models\Post;
use Repository\UserRepository;

class AddPost implements Controller
{

    public function action()
    {
        $title = NULL;
        $description = NULL;
        $content = NULL;

        // Check for page postback
        if (post('add')) {

            // Get user input from form
            $title = post('title');
            $description = post('description');
            $content = post('content');
            $date = date('Y-m-d H:i:s');
            $username = getUsername();
            $userid = UserRepository::getIdByUsername($username);

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
                    $post->setTitle(htmlentities($title));
                    $post->setDescription(htmlentities($description));
                    $post->setContent(htmlentities($content));
                    $post->setCreated($date);
                    $post->setUserid($userid);
                    PostRepository::insert($post);
                    redirect(\route\Route::get("userIndex")->generate());
                } catch (\PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }

        $mainView = new \templates\Main();
        $createView = new \templates\AddUpdate();
        $createView->setPageTitle('Add post')->setTitle($title)->setDescription($description)->setContent($content);
        $mainView->setPageTitle('Add post')->setBody((string)$createView);
        echo $mainView;
    }

}