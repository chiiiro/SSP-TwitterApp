<?php

namespace Controllers;

use Repository\PhotoCommentRepository;
use Repository\PhotoRepository;
use templates\Main;
use templates\PhotoCommentsFeed;

class RssFeed implements Controller {

    public function action()
    {
        // TODO: Implement action() method.
    }

    public function photoCommentsRss() {

        checkUnauthorizedAccess();


        $photoID = getIdFromURL();
        checkIntValueOfId($photoID);

        $photo = PhotoRepository::getPhotoByID($photoID);

        if($photo == null) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $photoComments = PhotoCommentRepository::getPhotoComments($photoID);

        $data = '<?xml version="1.0" encoding="UTF-8" ?>';
        $data .= '<rss version="2.0">';
        $data .= '<channel>';
        $data .= '<title>'. $photo['title'] .'</title>';
        $data .= '<link>http://localhost:8080/TwitterApp/photo/' . $photoID .'</link>';
        $data .= '<description>List of all comments for selected photo.</description>';
        foreach ($photoComments as $comment) {
            $data .= '<item>';
            $data .= '<description>'.$comment['content'].'</description>';
            $data .= '</item>';
        }
        $data .= '</channel>';
        $data .= '</rss> ';

        header('Content-Type: application/xml');

        echo $data;

    }

}