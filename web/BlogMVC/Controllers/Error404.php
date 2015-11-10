<?php

namespace Controllers;

use Controllers\Controller;

class Error404 implements Controller {

    public function action()
    {
        $mainView = new \templates\Main();
        $errorView = new \templates\Error404();
        $mainView->setPageTitle('Error 404')->setBody((string) $errorView);
        echo $mainView;
    }

}