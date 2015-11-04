<?php

require_once(VIEW_PATH . 'header.php');
?>

    <body>
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

<?php
require_once(VIEW_PATH . 'footer.php');