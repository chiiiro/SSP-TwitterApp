<?php

namespace Controllers;

use models\Gallery;
use Repository\GalleryRepository;
use Repository\UserRepository;
use templates\Main;

class AddGallery implements Controller {

    public function action()
    {
        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $main = new Main();
        $main->setPageTitle("Add gallery");
        $body = new \templates\AddGallery();
        $main->setBody($body);
        echo $main;

        $username = $_SESSION['username'];

        if(post('addGallery')) {

            $userID = UserRepository::getIdByUsername($username);
            $title = trim(post('galleryTitle'));
            $tag = trim(post('galleryTag'));
            $dateOfCreation = date('Y-m-d H:i:s');

            $error = false;

            if(!ctype_alnum($title) || strlen($title) < 4 || strlen($title) > 25) {
                $error = true;
            }

            if(!ctype_alnum($tag) || strlen($tag) < 3 || strlen($tag) > 25) {
                $error = true;
            }

            if(!$error) {
                $gallery = new Gallery();
                $gallery->setUserID($userID);
                $gallery->setTitle($title);
                $gallery->setTag($tag);
                $gallery->setCreated($dateOfCreation);

                try {
                    GalleryRepository::addGallery($gallery);
                } catch (\PDOException $e) {
                    $e->getMessage();
                }
            }

        }

    }

}