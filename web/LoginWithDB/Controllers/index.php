<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 10:13
 */

include_once "../inc/global.php";
include_once "../lib/html_library.php";
include_once "../Views/index_view.php";

writeComments();

display_index_form();

if(isset($_POST['login'])) {
    header("Location: Login.php");
    exit;
}

if(isset($_POST['register'])) {
    redirect("register.php");
}