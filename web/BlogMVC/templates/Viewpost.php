<?php

namespace templates;

use Views\AbstractView;
use templates\components\Post;

class Viewpost extends AbstractView {

    private $post;

    protected function outputHTML()
    {
        $postView = new Post();
        $postView->setPageTitle('Post');
        $postView->setPost($this->post);
        echo $postView;
        ?>
        <a href="<?php echo \route\Route::get("index")->generate(); ?>" role="button" class="btn btn-link">Back</a>
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

}
