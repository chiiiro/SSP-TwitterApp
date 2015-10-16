<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 13:46
 */

//$im = imagecreatefromjpeg("Slike/rain.jpg");
//header("Content-Type: image/jpeg");
//readfile("Slike/rain.jpg");
////imagepng($im);
//imagejpeg($im);
//imagedestroy($im);

$name = $_GET['name'];
$mimes = array
(
    'jpg' => 'image/jpg',
    'jpeg' => 'image/jpg',
    'gif' => 'image/gif',
    'png' => 'image/png'
);

$ext = strtolower(end(explode('.', $name)));

$file = 'Slike/'.$name;
$percent = 0.2;

header('content-type: '. $mimes[$ext]);
header('content-disposition: inline; filename="'.$name.'";');

list($width, $height) = getimagesize($file);
//$newwidth = $width * $percent;
//$newheight = $height * $percent;
$newwidth = 180;
$newheight = 180;

$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($file);

imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg($thumb);
readfile($file);