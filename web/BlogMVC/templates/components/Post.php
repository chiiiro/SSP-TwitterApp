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
                <h3 class="panel-title">Description</h3>
            </div>
            <div class="panel-body">
                <?php echo $this->post['postdesc']; ?>
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
                <h3 class="panel-title">Created</h3>
            </div>
            <div class="panel-body">
                <?php echo $this->post['postdate']; ?>
            </div>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">User</h3>
            </div>
            <div class="panel-body">
                <?php echo $this->post['username']; ?>
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