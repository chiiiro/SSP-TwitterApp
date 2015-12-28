<?php

namespace Repository;

use includes\libraries\Database;
use Models\Gallery;

class GalleryRepository
{

    public static function addGallery(Gallery $gallery)
    {

        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO gallery (userid,title,tag,created) VALUES (?, ?, ?, ?)');
        $query->execute([$gallery->getUserID(), $gallery->getTitle(), $gallery->getTag(), $gallery->getCreated()]);

    }

    public static function listGalleries()
    {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM gallery");
        $query->execute();
        return $query;
    }

    public static function getByID($id)
    {
        $db = Database::getInstance();
        $query = $db->prepare('SELECT * FROM gallery WHERE galleryid = ?');
        $query->execute([$id]);
        return $query->fetch();
    }

}