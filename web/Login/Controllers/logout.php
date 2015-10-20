<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 09:22
 */

include_once "../global.php";

//logout korisnika
unset($_SESSION['username']);
session_destroy();
header("Location: login.php");
exit;