<?php

namespace templates\components;
use Views\AbstractView;

class Post extends AbstractView {

    private $pageTitle;
    private $post;

    protected function outputHTML()
    {
        ?>

        <div class="container">
        <h1><?php echo $this->pageTitle ?></h1>
        <hr/>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Title</h3>
            </div>
            <div class="panel-body">
                <?php echo $this->post['posttitle']; ?>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Content</h3>
            </div>
            <div class="panel-body">
                <?php echo $this->post['postcont']; ?>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Informations about post</h3>
            </div>

            <div class="panel-body">
                <p><?php echo 'Description: ' . $this->post['postdesc']; ?></p>
                <p><?php echo 'Created by: ' . $this->post['username'];?></p>
                <p><?php echo 'Last edit: ' . $this->post['postdate'];?></p>
            </div>
        </div>

    <?php
    }

    /**
     * @param mixed $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
        return $this;
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