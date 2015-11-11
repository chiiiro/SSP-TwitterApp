<?php

namespace Controllers;

use Repository\CommentRepository;

class ViewComments implements Controller {

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
            redirect(\route\Route::get("viewPost")->generate(array("id"=>$id)));
        }

        $comments = CommentRepository::getAll($id);

        $mainView = new \templates\Main();
        $viewComments = new \templates\ViewComments();
        $viewComments->setComments($comments);
        $mainView->setPageTitle('Comments')->setBody((string) $viewComments);

        echo $mainView;

    }

}

