<?php

namespace Controllers;

use Models\Photo;
use templates\Main;
use Repository\PhotoRepository;
use Repository\GalleryRepository;

class AddPhoto implements Controller {

    public function action()
    {

        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("galleryID");

        if(null === $id) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $gallery = GalleryRepository::getByID($id);

        if($gallery == null) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $main = new Main();
        $body = new \templates\AddPhoto();
        $main->setBody($body)->setPageTitle("Upload photo");
        echo $main;

        if(post('submit')) {

            $title = trim(post('title'));
            $tags = trim(post('tags'));

            $error = false;

            if(strlen($title) < 4 || strlen($title) > 25) {
                $error = true;
            }

            if(strlen($tags) < 4 || strlen($tags) > 250) {
                $error = true;
            }

            if(!$error) {
                $photo = new Photo();
                $photo->setGalleryid($id);
                $photo->setTitle($title);
                $photo->setTags($tags);
                $photo->setCreated(date('Y-m-d H:i:s'));
                $photo->setImage($_FILES['file']['name']);

                try {
                    PhotoRepository::addPhoto($photo);

                    $dir = $gallery['title'];
                    $path = 'assets/images/galleries/' . $dir;

                    if (!file_exists($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($_FILES['file']['tmp_name'], $path . "/" . $_FILES['file']['name']);

                    redirect(\route\Route::get("viewGallery")->generate(array("id" => $id)));
                } catch(\PDOException $e) {
                    $e->getMessage();
                }
            }

        }

    }

}