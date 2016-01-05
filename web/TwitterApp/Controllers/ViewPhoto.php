<?php

namespace Controllers;

use Repository\GalleryRepository;
use Repository\PhotoRepository;
use Repository\UserRepository;
use templates\Main;

class ViewPhoto implements Controller {

    /**
     * Opens selected photo.
     */
    public function action()
    {

        $id = getIdFromURL();

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

    /**
     * Sets selected photo as gallery icon.
     */
    public function setGalleryIcon() {

        $id = getIdFromURL();
        checkUnauthorizedAccess();

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

    public function setUserBackground() {

        $id = getIdFromURL();
        checkUnauthorizedAccess();

        $photo = PhotoRepository::getPhotoByID($id);
        $galleryID = PhotoRepository::getGalleryID($id);
        $gallery = GalleryRepository::getByID($galleryID);
        $background = $gallery['title'] . '/' . $photo['image'];

        $userid = UserRepository::getIdByUsername($_SESSION['username']);

        try {
            UserRepository::setBackground($background, $userid);
            redirect(\route\Route::get("viewPhoto")->generate(array("id" => $photo['photoid'])));
        } catch (\PDOException $e) {
            $e->getMessage();
        }
    }

}