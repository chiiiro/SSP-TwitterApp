<?php

namespace templates;

use Views\AbstractView;

class ViewGallery extends AbstractView {

    private $galleryID;
    private $gallery;
    private $photos;

    protected function outputHTML()
    {

        ?>

        <div class="container">

            <div class="panel panel-info" id="comments">
                <div class="panel-heading">
                    <h3 class="panel-title">Gallery</h3>
                </div>

                <?php
                foreach ($this->photos as $photo) {

                    ?>

                    <div class="panel-body">

                        <p><?php echo "<img width='100' height='100' src='/TwitterApp/assets/images/galleries/" . $this->gallery['title'] . '/' . $photo['image'] . "' alt='image'>"; ?></p>
                        <p>Photo Title: <?php echo $photo['title']; ?></p>
                        <p>Photo Tags: <?php echo $photo['tags']; ?></p>
                        <p>Created: <?php echo $photo['created']?></p>
<!--                        <p><a href="--><?php //echo \route\Route::get("viewGallery")->generate(array("id"=>$photo['galleryid'])); ?><!--">View Gallery</a></p>-->
                    </div>

                    <?php

                }

                ?>

                <div class="panel-footer">
                    <p><a href="<?php echo \route\Route::get("addPhoto")->generate(array("galleryID" => $this->galleryID)); ?>" class="btn btn-danger">Add Photo</a></p>

            </div>
        </div>



        <?php

    }

    /**
     * @return mixed
     */
    public function getGalleryID()
    {
        return $this->galleryID;
    }

    /**
     * @param mixed $galleryID
     */
    public function setGalleryID($galleryID)
    {
        $this->galleryID = $galleryID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param mixed $gallery
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param mixed $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
        return $this;
    }

}