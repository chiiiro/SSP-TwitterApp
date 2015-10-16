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

//create_doctype();
//begin_html();
//
//begin_head();
//create_element("title", true, array("contents" => "Dohvat slike preko URL-a"));
//end_head();
//
//begin_body(array());
//
//$imgName = $_GET['image'];
//
//$ext = end(explode(".", $imgName));
//$file = "Slike/" . $imgName;
//$img = file_get_contents($file);
//$img = base64_encode($img);
//
//echo sprintf('<img src="data:image/jpg;base64,%s" />', $img);



//end_body();

//end_html();