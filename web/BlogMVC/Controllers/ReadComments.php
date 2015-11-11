<?php

namespace Controllers;

use Repository\CommentRepository;

class ReadComments implements Controller {

    public function action()
    {
        $id = \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");

        if(null === $id) {
            redirect(\route\Route::get("error404")->generate());
        }

        if(intval($id) < 1) {
            redirect(\route\Route::get("error404")->generate());
        }

        $checkId = CommentRepository::checkId($id);

        if($checkId == null) {
            redirect(\route\Route::get("readPost")->generate(array("id"=>$id)));
        }

        $comments = CommentRepository::getAll($id);

        $mainView = new \templates\Main();
        $readComments = new \templates\ReadComments();
        $readComments->setComments($comments);
        $mainView->setPageTitle('Comments')->setBody((string) $readComments);

        echo $mainView;
    }

}