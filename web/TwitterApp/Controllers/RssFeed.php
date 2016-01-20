<?php

namespace Controllers;

use Repository\GalleryRepository;
use Repository\PhotoCommentRepository;
use Repository\PhotoRepository;
use Repository\TweetCommentRepository;
use templates\Main;

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

        header('Content-Type: application/xml');

        echo '<?xml version="1.0" encoding="ISO-8859-1"?>
            <rss version="2.0">
                <channel>
                    <title>Tweet</title>
                    <description>List of all comments for selected tweet.</description>
                    <link>http://localhost:8080/TwitterApp/tweet/' . $photoID  . '</link>';

        foreach ($photoComments as $comment) {
            echo '<item><title>Komentar</title><description>' . $comment['content'] . '</description></item>';
        }


        echo '</channel></rss>';

    }

    public function tweetCommentsRss() {
        checkUnauthorizedAccess();
        $tweetID = getIdFromURL();
        checkIntValueOfId($tweetID);

        $tweetComments = TweetCommentRepository::getTweetComments($tweetID);

//        header("Content-Type: application/rss+xml; charset=UTF-8");
        header('Content-Type: text/xml');

        $xml = new \SimpleXMLElement('<rss/>');
        $xml->addAttribute("version", "2.0");

        $channel = $xml->addChild("channel");

        $channel->addChild("title", "Tweet");
        $channel->addChild("link", "http://localhost:8080/TwitterApp/tweet/" . $tweetID);
        $channel->addChild("description", "List of all comments for selected tweet.");

        foreach($tweetComments as $comment) {
            $item = $channel->addChild("item");
            $item->addChild("title", "Komentar");
            $item->addChild("description", $comment['content']);
        }

        echo $xml->asXML();

    }

    public function galleryRssFeed() {
        checkUnauthorizedAccess();

        $galleryID = getIdFromURL();
        checkIntValueOfId($galleryID);
        $gallery = GalleryRepository::getByID($galleryID);

        if($gallery == null) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $photos = PhotoRepository::getPhotosByGalleryID($galleryID);

        header('Content-Type: text/xml');

        $xml = new \SimpleXMLElement('<rss/>');
        $xml->addAttribute("version", "2.0");

        $channel = $xml->addChild("channel");

        $channel->addChild("title", $gallery['title']);
        $channel->addChild("link", "http://localhost:8080/TwitterApp/gallery/" . $galleryID);
        $channel->addChild("description", "Images in selected gallery.");

        foreach ($photos as $photo) {
            $item = $channel->addChild("item");
            $item->addChild("title", $photo['title']);
            $item->addChild("description", $photo['tags']);
            $item->addChild("guid", "http://localhost:8080/TwitterApp/photo/" . $photo['photoid']);
        }

        echo $xml->asXML();
    }

}