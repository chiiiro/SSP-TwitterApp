<?php

include_once "../includes/config.php";
include_once "../Template.php";

$mainView = new \templates\Main();
$errorView = new \templates\Error404();
$mainView->setPageTitle('Error 404')->setBody((string) $errorView);
echo $mainView;