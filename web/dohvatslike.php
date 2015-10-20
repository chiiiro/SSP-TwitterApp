<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 14:43
 */

include_once "Quiz/lib/html_library.php";

$imgName = $_GET['image'];

$ext = end(explode(".", $imgName));
$file = "Slike/" . $imgName;


header("Content-Type: image/jpg");
header('Content-Length: ' . filesize($file));
$img = file_get_contents($file);
echo $img;