<?php

namespace Controllers;

use Repository\UserRepository;
use templates\Main;

class TwitterWall implements Controller {

    public function action()
    {

        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $user = UserRepository::getUserByID($id);

        if($user == null) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $main = new Main();
        $main->setPageTitle("TwitterApp");
        $body = new \templates\TwitterWall();
        $main->setBody($body);
        echo $main;

    }

    public function searchResult() {
        $data = '';
        if(post('search')) {
            $str = post('search');
            $str = preg_replace("#[^0-9a-z]#i","",$str);
            $users = UserRepository::searchUsers($str);
            foreach($users as $user) {
                ?>
                    <div>
                        <a href="<?php echo \route\Route::get("twitterWall")->generate(array("id" => $user['userid'])); ?>">
                            <?php echo $user['username']?>
                        </a>
                    </div>
                <?php
            }
            echo $data;
        }
    }

}