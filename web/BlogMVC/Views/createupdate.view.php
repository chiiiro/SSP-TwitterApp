<?php

require_once(VIEW_PATH . 'header.php');

?>

    <body>
    <div class="container">
    <h1><?php echo $pageTitle ?></h1><hr />

    <form class="form-horizontal" role="form" action="" method="post">
        <div class="form-group">
            <label class="control-label col-sm-1" for="title">Title:</label>

            <div class="col-sm-6">
                <input type="text" class="form-control" name="title" placeholder="Enter title" value="<?php
                echo sanitize_output($title); ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-1" for="description">Description:</label>

            <div class="col-sm-6">
                <textarea class="form-control" rows="2" name="description" placeholder="Enter description"><?php
                    echo sanitize_output($description); ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-1" for="content">Content:</label>

            <div class="col-sm-6">
                <textarea class="form-control" rows="8" name="content" placeholder="Enter content"><?php
                    echo sanitize_output($content); ?></textarea>
            </div>
        </div>

        <input type="submit" class="btn btn-default" name="add" id="add" value="<?php
        echo sanitize_output($pageTitle); ?>">
        <a href="user_index.php" role="button" class="btn btn-link">Back</a>
    </form>

<?php
require_once(VIEW_PATH . 'footer.php');