<?php

include_once "includes/config.php";

$errorCtl = new \Controllers\Error404();
$errorCtl->action();