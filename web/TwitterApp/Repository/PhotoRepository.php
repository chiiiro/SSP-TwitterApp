<?php

namespace Repository;

use includes\libraries\Database;
use Models\Photo;

class PhotoRepository
{

    public static function addPhoto(Photo $photo)
    {
        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO photo (galleryid,title,tags,created,image) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$photo->getGalleryid(), $photo->getTitle(), $photo->getTags(), $photo->getCreated(), $photo->getImage()]);
    }

    public static function getPhotosByGalleryID($galleryID)
    {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM photo WHERE galleryid = ?");
        $query->execute([$galleryID]);
        return $query;
    }

    public static function getPhotoByID($ID)
    {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM photo WHERE photoid = ?");
        $query->execute([$ID]);
        return $query->fetch();
    }

    public static function getGalleryID($photoID) {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT galleryid FROM photo WHERE photoid = ?");
        $query->execute([$photoID]);
        return $query->fetch()['galleryid'];
    }

}