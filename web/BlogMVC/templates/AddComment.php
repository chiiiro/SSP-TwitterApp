<?php

namespace templates;

use Views\AbstractView;

class AddComment extends AbstractView {

    private $content;
    private $id;

    protected function outputHTML()
    {
        ?>

        <div class="container">
        <h1>Add comment</h1>
        <hr/>

        <form class="form-horizontal" role="form" action="" method="post">
            <div class="form-group">
                <label class="control-label col-sm-1" for="content">Content:</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control" name="content" id="content" placeholder="Enter comment" value="<?php
                    echo sanitize_output($this->content); ?>">
                </div>
            </div>

            <input type="submit" class="btn btn-default" name="add" id="add" value="Add comment">
            <a href="<?php echo \route\Route::get("readPost")->generate(array("id"=>$this->id)); ?>" role="button" class="btn btn-link">Back</a>
        </form>

        <?php
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

}