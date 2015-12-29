<?php

namespace Controllers;

use Repository\GalleryRepository;
use Repository\PhotoRepository;
use Repository\UserRepository;

class SearchBar implements Controller {

    public function action()
    {
        $data = '';
        if(post('search')) {
            $str = post('search');
            $str = preg_replace("#[^0-9a-z]#i","",$str);
            //getting users that match given string
            $users = UserRepository::searchUsers($str);
            echo "<h3>Search results</h3>";
            foreach($users as $user) {
                ?>
                <div>
                    <a href="<?php echo \route\Route::get("twitterWall")->generate(array("id" => $user['userid'])); ?>">
                        <?php echo $user['username']?>
                    </a>
                </div>
                <?php
            }

            //getting galleries that match given string
            $galleries = GalleryRepository::searchGalleries($str);
            foreach($galleries as $photo) {
                ?>
                <div>
                    <a href="<?php echo \route\Route::get("viewGallery")->generate(array("id" => $photo['galleryid'])); ?>">
                        <?php echo $photo['title']?>
                    </a>
                </div>
                <?php
            }

            //getting photos that match given string
            $photos = PhotoRepository::searchPhotos($str);
            foreach($photos as $photo) {
                ?>
                <div>
                    <a href="<?php echo \route\Route::get("viewPhoto")->generate(array("id" => $photo['photoid'])); ?>">
                        <?php echo $photo['title']?>
                    </a>
                </div>
                <?php
            }

            echo "</br>";
            echo $data;
        }
    }

}