<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 15:18
 */

session_start();
if (!empty($_GET)) {
    $_SESSION = array_merge($_SESSION, $_GET);
}
var_dump($_SESSION);