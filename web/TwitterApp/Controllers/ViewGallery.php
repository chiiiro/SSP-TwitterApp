<?php

namespace Controllers;

use Repository\GalleryRepository;
use Repository\PhotoRepository;
use templates\Main;

class ViewGallery implements Controller {

    public function action()
    {
        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

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
        $body = new \templates\ViewGallery();
        $photos = PhotoRepository::getPhotosByGalleryID($id);
        $gallery = GalleryRepository::getByID($id);
        $body->setGalleryID($id)->setPhotos($photos)->setGallery($gallery);
        $main->setBody($body)->setPageTitle("View gallery");
        echo $main;

    }

}