<?php

namespace templates;

use Views\AbstractView;
use templates\components\Post;

class Read extends AbstractView {

    private $post;

    protected function outputHTML()
    {
        $postView = new Post();
        $postView->setPageTitle('User post');
        $postView->setPost($this->post);
        echo $postView;

        ?>

        <a href="<?php echo \route\Route::get("editPost")->generate(array("id"=>$this->post['postid'])); ?>" role="button" class="btn btn-link">Edit</a>
        <a href="<?php echo \route\Route::get("delete")->generate(array("id"=>$this->post['postid'])); ?>" role="button" class="btn btn-link" onclick="javascript: return confirm
				('Are you sure you want to delete?');">Delete</a>
        <a href="<?php echo \route\Route::get("userIndex")->generate(); ?>" role="button" class="btn btn-link">Back</a>

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

?>