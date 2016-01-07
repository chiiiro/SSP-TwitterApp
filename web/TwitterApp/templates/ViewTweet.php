<?php

namespace templates;

use Views\AbstractView;

class ViewTweet extends AbstractView
{

    private $tweet;

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
        </div>

        <form class="form-horizontal" id="tweet-form" role="form" method="post" action="">

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
                    <input type="submit" class="btn btn-info btn-block" name="postComment" id="postComment" value="Post Comment">
                </div>
            </div>

        </form>

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
    }

}