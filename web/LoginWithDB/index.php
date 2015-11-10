<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 28/10/15
 * Time: 09:36
 */


require_once 'inc/global.php';
try {
    \dispatcher\DefaultDispatcher::instance()->dispatch();
} catch (\oipa\model\NotFoundException $e) {
    redirect(\route\Route::get("e404")->generate());
}