<?php

namespace templates;

use Repository\UserRepository;use Views\AbstractView;

class UserIndex extends AbstractView {

private $posts;

    protected function outputHTML()
    {
        ?>

<div class="container">
    <h1>User posts</h1>
    <hr/>

    <?php

    foreach ($this->posts as $post) {
        $username = UserRepository::getUsernameById($post['userid']);
        ?>


        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><a
                        href="<?php echo \route\Route::get("readPost")->generate(array("id"=>$post['postid'])); ?>"><?php echo $post['posttitle'] ?></a></h3>
            </div>
            <div class="panel-body">
                <?php echo $post['postdesc']; ?>
            </div>
            <div class="panel-footer">
                <?php echo 'Created by: ' . $username; ?>
            </div>
        </div>


    <?php }
    }

    /**
     * @param mixed $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }
}