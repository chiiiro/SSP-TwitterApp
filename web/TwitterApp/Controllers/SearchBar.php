<?php

namespace Controllers;

use Repository\GalleryRepository;
use Repository\PhotoRepository;
use Repository\UserRepository;
use templates\SearchResults;

class SearchBar implements Controller {

    /**
     * Method lists users, galleries and images that match provided string.
     */
    public function action()
    {
        if(post('search')) {
            $str = post('search');
            $str = preg_replace("#[^0-9a-z]#i","",$str);

            //getting search results that match given string
            $users = UserRepository::searchUsers($str);
            $galleries = GalleryRepository::searchGalleries($str);
            $photos = PhotoRepository::searchPhotos($str);


            //showing results
            $searchResults = new SearchResults();
            $searchResults->setUsers($users);
            $searchResults->setGalleries($galleries);
            $searchResults->setPhotos($photos);
            echo $searchResults;
        }
    }

}