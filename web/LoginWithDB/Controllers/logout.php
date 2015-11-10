<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 09:22
 */

include_once "../inc/global.php";

//logout korisnika
unset($_SESSION['username']);
session_destroy();
header("Location: Login.php");
exit;