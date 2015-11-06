<?php

namespace templates;

use Views\AbstractView;

class UserIndex extends AbstractView {

private $posts;

    protected function outputHTML()
    {
        ?>

<div class="container">
    <h1>User posts</h1>
    <hr/>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><a
                    href="create.php">Add post</a></h3>
        </div>
    </div>

    <hr/>

    <?php

    foreach ($this->posts as $post) {
        ?>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><a
                        href="read.php?id=<?php echo $post['postid'] ?>"><?php echo $post['posttitle'] ?></a></h3>
            </div>
            <div class="panel-body">
                <?php echo $post['postdesc']; ?>
            </div>
            <div class="panel-footer">
                <?php echo 'Created by: ' . $post['username']; ?>
            </div>
        </div>


    <?php } ?>

    <hr/>
    <a href="logout.php" role="button" class="btn btn-link">Logout</a>
    <hr/>

    <?php
    }

    /**
     * @param mixed $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }
}