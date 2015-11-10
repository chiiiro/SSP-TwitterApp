<?php

namespace templates;

use Views\AbstractView;

class AddUpdate extends AbstractView {

private $pageTitle;
private $title;
private $description;
private $content;

protected function outputHTML()
{ ?>

<div class="container">
    <h1><?php echo $this->pageTitle ?></h1>
    <hr/>

    <form class="form-horizontal" role="form" action="" method="post">
        <div class="form-group">
            <label class="control-label col-sm-1" for="title">Title:</label>

            <div class="col-sm-6">
                <input type="text" class="form-control" name="title" placeholder="Enter title" value="<?php
                echo sanitize_output($this->title); ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-1" for="description">Description:</label>

            <div class="col-sm-6">
                <textarea class="form-control" rows="2" name="description" placeholder="Enter description"><?php
                    echo sanitize_output($this->description); ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-1" for="content">Content:</label>

            <div class="col-sm-6">
                <textarea class="form-control" rows="8" name="content" placeholder="Enter content"><?php
                    echo sanitize_output($this->content); ?></textarea>
            </div>
        </div>

        <p name="display" id="display"></p>

        <input type="submit" class="btn btn-default" name="add" id="add" value="<?php
        echo sanitize_output($this->pageTitle); ?>">
        <a href="<?php echo \route\Route::get("userIndex")->generate(); ?>" role="button" class="btn btn-link">Back</a>
    </form>

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
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    }

    ?>