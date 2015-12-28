<?php

namespace Controllers;

use Repository\GalleryRepository;
use Repository\PhotoRepository;
use templates\Main;

class ViewPhoto implements Controller {

    public function action()
    {

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $photo = PhotoRepository::getPhotoByID($id);

        if($photo == null) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $galleryID = $photo['galleryid'];
        $gallery = GalleryRepository::getByID($galleryID);
        $galleryTitle = $gallery['title'];

        $main = new Main();
        $body = new \templates\ViewPhoto();
        $body->setPhoto($photo)->setTitle($galleryTitle);

        echo $main->setBody($body)->setPageTitle("View Photo");
    }

    public function setGalleryIcon() {

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $photo = PhotoRepository::getPhotoByID($id);
        $galleryID = PhotoRepository::getGalleryID($id);
        $icon = $photo['image'];

        try {
            GalleryRepository::setGalleryIcon($icon, $galleryID);
            redirect(\route\Route::get("listGalleries")->generate());
        } catch (\PDOException $e) {
            $e->getMessage();
        }


    }

}