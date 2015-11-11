<?php

namespace templates;

use Views\AbstractView;

class ReadComments extends AbstractView {

    private $comments;

    protected function outputHTML()
    {

        ?>

        <div class="container">
        <h1></h1>

        <h1></h1>


        <div style="background: transparent" class="jumbotron">
            <h3>
                Comments for selected blog post.
            </h3>
            <h3></h3>

            <?php

            foreach ($this->comments as $comment) {
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <?php echo 'Created by: ' . $comment['username']; ?>
                    </div>
                    <div class="panel-body">
                        <?php echo $comment['content']; ?>
                    </div>
                </div>

                <?php
            }
            ?>

            <a
                href="<?php echo \route\Route::get("readPost")->generate(array("id"=>$comment['postid'])); ?>">Back</a>

        </div>

        <?php

    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

}