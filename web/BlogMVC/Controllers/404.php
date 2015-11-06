<?php

include_once "../includes/config.php";
include_once "../Template.php";

$errorTemplate = Template::create("404", array());
echo Template::create("main", array(
    "pageTitle" => "Error 404",
    "body" => $errorTemplate->render()
));