<?php

namespace templates;

use Views\AbstractView;

class ViewPhoto extends AbstractView
{

    private $photo;
    private $title;

    protected function outputHTML()
    {
        ?>
        <div class="container">

<!--            <div class="panel panel-info" id="comments">-->
<!--                <div class="panel-heading">-->
<!--                    <h3 class="panel-title">Photo</h3>-->
<!--                </div>-->
<!---->
<!--                <div class="panel-body">-->

                    <p><?php echo "<img src='/TwitterApp/assets/images/galleries/" . $this->title . '/' . $this->photo['image'] . "' alt='image'>"; ?></p>

<!--                </div>-->
<!---->
<!--                <div class="panel-footer">-->
<!---->
                    <p>
                        <a href="<?php echo \route\Route::get("setGalleryIcon")->generate(array("id" => $this->photo['photoid'])); ?>" class="btn btn-danger">Set As Gallery Icon</a>
                        <a href="<?php echo \route\Route::get("setUserBackground")->generate(array("id" => $this->photo['photoid'])); ?>" class="btn btn-danger">Set As Background</a>
                    </p>
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
        </div>

        <?php
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

}