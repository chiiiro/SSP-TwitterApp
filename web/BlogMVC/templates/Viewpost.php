<?php

namespace templates;

use Views\AbstractView;
use templates\components\Post;

class Viewpost extends AbstractView {

    private $post;
    private $comments;

    protected function outputHTML()
    {
        $postView = new Post();
        $postView->setPageTitle('Post');
        $postView->setPost($this->post);
        echo $postView;
        ?>

        <div>

            <div class="panel panel-info" id="comments">
                <div class="panel-heading">
                    <h3 class="panel-title">Comments</h3>
                </div>
                <?php

                foreach ($this->comments as $comment) {
                    ?>

                    <div class="panel-body">
                        <p><?php echo $comment['content']; ?></p>
                        <p><?php echo 'Created by: ' . $comment['username']; ?></p>
                    </div>

                    <?php
                }
                ?>
            </div>

        </div>

<?php
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
        return $this;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

}
