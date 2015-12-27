<?php

namespace Repository;

use includes\libraries\Database;
use models\Gallery;

class GalleryRepository {

    public static function addGallery(Gallery $gallery) {

        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO gallery (userid,title,tag,created) VALUES (?, ?, ?, ?)');
        $query->execute([$gallery->getUserID(), $gallery->getTitle(), $gallery->getTag(), $gallery->getCreated()]);

    }

}