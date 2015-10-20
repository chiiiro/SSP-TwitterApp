<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 10:13
 */

include_once "../global.php";
include_once "../lib/html_library.php";
include_once "../Views/index_view.php";

set_title("Prikaz komentara");
set_charset("utf-8");

foreach (glob("../comments.txt") as $filename) {
    $file = fopen($filename, "r");
    while(!feof($file)) {
        echo fgets($file) . "<br>";
    }
    fclose($file);
}

display_index_form();

if(isset($_POST['login'])) {
    header("Location: login.php");
    exit;
}