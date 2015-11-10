<?php

include_once "includes/config.php";

//$indexCtl = new \Controllers\Index();
//$indexCtl->action();


try {
    \dispatcher\DefaultDispatcher::instance()->dispatch();
}
catch (Exception $e) {
    redirect(\route\Route::get("error404")->generate());
}