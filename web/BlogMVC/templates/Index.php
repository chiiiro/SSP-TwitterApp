<?php

namespace templates;

use Views\AbstractView;

class Index extends AbstractView {

    private $posts;

    protected function outputHTML() {

    ?>

    <div class="container">
        <h1></h1>

        <h1></h1>


        <div style="background: transparent" class="jumbotron">

            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="<?php echo \route\Route::get("index")->generate(); ?>">Home</a></li>
                <li role="presentation"><a href="<?php echo \route\Route::get("login")->generate(); ?>">Login</a></li>
                <li role="presentation"><a href="<?php echo \route\Route::get("register")->generate(); ?>">Register</a></li>
            </ul>

            <h1>Home page</h1>

            <p>This is a simple blog created for learning purposes. New user can register, login and then add, update
                or delete posts. Unregistered users can only view posts stored in database.
            </p>

            <?php
                foreach ($this->posts as $post) {
            ?>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a
                                href="<?php echo \route\Route::get("viewPost")->generate(array("id"=>$post['postid'])); ?>"><?php echo $post['posttitle'] ?></a>

                        </h3>
                    </div>
                    <div class="panel-body">
                       <?php echo $post['postdesc']; ?>
                    </div>
                    <div class="panel-footer">
                        <?php echo 'Created by: ' . $post['username']; ?>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>

        <?php

    }/**
         * @param mixed $posts
         */
        public function setPosts($posts)
        {
            $this->posts = $posts;
            return $this;
        }
}
?>