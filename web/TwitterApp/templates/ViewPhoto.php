<?php

namespace templates;

use Repository\UserRepository;
use Views\AbstractView;

class ViewPhoto extends AbstractView
{

    private $photo;
    private $title;
    private $comments;

    protected function outputHTML()
    {
        ?>
        <div class="container">

            <p><?php echo "<img width='1024' height='768' src='/TwitterApp/assets/images/galleries/" . $this->title . '/' . $this->photo['image'] . "' alt='image'>"; ?></p>

            <p>
                <a href="<?php echo \route\Route::get("setGalleryIcon")->generate(array("id" => $this->photo['photoid'])); ?>"
                   class="btn btn-danger">Set As Gallery Icon</a>
                <a href="<?php echo \route\Route::get("setUserBackground")->generate(array("id" => $this->photo['photoid'])); ?>"
                   class="btn btn-danger">Set As Background</a>
            </p>


            <div>
                <h3>Photo comments</h3>
                <?php
                if (count($this->comments) == 0) {
                    echo "There are no comments for this photo.";
                } else {
                    foreach ($this->comments as $comment) {
                        $user = UserRepository::getUserByID($comment['userid']);
                        echo "<p>" . $user['username'] . ": " . $comment['content'] . "</p>";
                    }
                }
                ?>
            </div>


            <form class="form-horizontal" id="comment-form" role="form" method="post"
                  action="<?php echo \route\Route::get("postPhotoComment")->generate(array("id" => $this->photo['photoid'])); ?>">

                <div class="form-group">
                    <div class="col-md-4">
                        <textarea class="form-control" rows="3" name="comment" id="comment"
                                  placeholder="Enter comment..." required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <div style="color: green" id="success"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-info btn-block" name="postComment" id="postComment"
                               value="Post Comment">
                    </div>
                </div>

            </form>

            <!--            dodati prikaz komentara-->

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

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

}