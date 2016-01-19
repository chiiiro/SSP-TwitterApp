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

        <script>
            $(document).ready(function() {
                $("#editPhotoTags").hide();
                $("#comment-form").hide();

                $("#editTags").click(function() {
                    $("#editPhotoTags").show();
                    $("#comment-form").hide();
                });
                $("#commentPhoto").click(function() {
                    $("#editPhotoTags").hide();
                    $("#comment-form").show();
                });
                $("#closeEdit").click(function() {
                    $("#editPhotoTags").hide();
                    $("#comment-form").hide();
                });
            });
        </script>

        <div class="container">


            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Set As...
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo \route\Route::get("setGalleryIcon")->generate(array("id" => $this->photo['photoid'])); ?>">Set As Gallery Icon</a></li>
                    <li><a href="<?php echo \route\Route::get("setUserBackground")->generate(array("id" => $this->photo['photoid'])); ?>">Set As Background</a></li>
                </ul>
            </div>

            <br>

            <p><?php echo "<img width='1024' height='768' src='/TwitterApp/assets/images/galleries/" . $this->title . '/' . $this->photo['image'] . "' alt='image'>"; ?></p>

            <p><button class="btn btn-danger" id="editTags">Edit tags</button> <button class="btn btn-danger" id="commentPhoto">Comment photo</button> <button class="btn btn-default" id="closeEdit">Close</button></p>

            <div><h3>Photo tags</h3><p><?php echo $this->photo['tags']?></p></div>

            <form class="form-horizontal" id="editPhotoTags" role="form" method="post"
                  action="<?php echo \route\Route::get("editPhotoTags")->generate(array("id" => $this->photo['photoid'])); ?>">

                <?php
                    if(checkPermissionToCommentPhotoAndEditTags()) {
                        ?>
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="tags" id="tags" value="<?php echo $this->photo['tags'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-info btn-block" name="postTags" id="postTags"
                                       value="Submit changes">
                            </div>
                        </div>
                        <?php
                    } else {
                        echo "<p style='color: red'>You must be friends with user who created gallery to edit tags.</p>";
                    }
                ?>



            </form>

            <div>
                <h3>Photo comments</h3>
                <?php
                if (count($this->comments) == 0) {
                    echo "There are no comments for this photo.";
                } else {
                    foreach ($this->comments as $comment) {
                        $user = UserRepository::getUserByID($comment['userid']);
                        echo "<p>" . $user['username'] . ": " . parseText($comment['content']) . "</p>";
                    }
                }
                ?>
            </div>

            <form class="form-horizontal" id="comment-form" role="form" method="post"
                  action="<?php echo \route\Route::get("postPhotoComment")->generate(array("id" => $this->photo['photoid'])); ?>">

                <?php
                    if(checkPermissionToCommentPhotoAndEditTags()) {
                        ?>
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
                        <?php
                    } else {
                        echo "<p style='color: red'>You must be friends with user who created gallery to post comments.</p>";
                    }
                ?>

            </form>

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