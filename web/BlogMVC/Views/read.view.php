<?php

require_once(VIEW_PATH . 'header.php');
require_once(VIEW_PATH . 'body_image.view.php');
?>

    <div class="container">
        <h1>Post</h1><hr />

   <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Title</h3>
        </div>
        <div class="panel-body">
            <?php echo $post['posttitle']; ?>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
           <h3 class="panel-title">Description</h3>
        </div>
        <div class="panel-body">
            <?php echo $post['postdesc']; ?>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
           <h3 class="panel-title">Content</h3>
        </div>
        <div class="panel-body">
            <?php echo $post['postcont']; ?>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
           <h3 class="panel-title">Created</h3>
        </div>
        <div class="panel-body">
            <?php echo $post['postdate']; ?>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
           <h3 class="panel-title">User</h3>
        </div>
        <div class="panel-body">
            <?php echo $post['username']; ?>
        </div>
    </div>

    <a href="update.php?id=<?php echo $post['postid']; ?>" role="button" class="btn btn-link">Update</a>
    <a href="delete.php?id=<?php echo $post['postid']; ?>" role="button" class="btn btn-link" onclick="javascript: return confirm
				('Are you sure you want to delete?');">Delete</a>
    <a href="user_index.php" role="button" class="btn btn-link">Back</a>

<?php
require_once(VIEW_PATH . 'footer.php');