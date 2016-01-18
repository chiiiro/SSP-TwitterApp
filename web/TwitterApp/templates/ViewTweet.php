<?php

namespace templates;

use Repository\UserRepository;
use Views\AbstractView;

class ViewTweet extends AbstractView
{

    private $tweet;
    private $comments;

    protected function outputHTML()
    {

        ?>

        <div class="container">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info" id="comments">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tweet</h3>
                    </div>
                    <div class="panel-body">
                        <label>Content</label>

                        <p><?php echo $this->tweet['content']; ?></p>
                        <?php
                        if ($this->tweet['image'] != null) {
                            ?>
                            <hr>
                            <label>Image</label>
                            <p><?php echo $this->tweet['image']; ?></p>
                            <?php
                        }
                        if ($this->tweet['tag'] != null) {
                            ?>
                            <hr>
                            <label>Tag</label>
                            <p><?php echo $this->tweet['tag']; ?></p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info" id="comments">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tweet Comments</h3>
                    </div>

                    <div class="panel-body">
                        <div>
                            <?php
                            if(count($this->comments) == 0) {
                                echo "There are no comments for this tweet.";
                            } else {
                                foreach ($this->comments as $comment) {
                                    $user = UserRepository::getUserByID($comment['userid']);
                                    echo "<p>" . $user['username'] . ": " . $comment['content'] . "</p>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if(checkPermissionToCommentTweet()) {
                ?>
                <form class="form-horizontal" id="comment-form" role="form" method="post" action="<?php echo \route\Route::get("postTweetComment")->generate(array("id" => $this->tweet['tweetid'])); ?>">

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                        <textarea class="form-control" rows="3" name="comment" id="comment"
                                  placeholder="Enter comment..." required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <div style="color: green" id="success"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" class="btn btn-info btn-block" name="postComment" id="postComment"
                                   value="Post Comment">
                        </div>
                    </div>

                </form>
                <?php
            }
        ?>

        <?php
    }

    /**
     * @return mixed
     */
    public function getTweet()
    {
        return $this->tweet;
    }

    /**
     * @param mixed $tweet
     */
    public function setTweet($tweet)
    {
        $this->tweet = $tweet;
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
        return $this;
    }

}