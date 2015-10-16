<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 12:53
 */

include_once "Quiz/lib/html_library.php";

create_doctype();
begin_html();

begin_head();
create_element("title", true, array("contents" => "Prenosenje datoteka"));
end_head();

begin_body(array());

//echo "<form method='post' action='prikazdatoteke.php' enctype='multipart/form-data'>";
//create_input(array("type" => "file", "name" => "datoteka"));
//create_input(array("type" => "submit", "value" => "Šalji"));
//end_form();

$file_display = array('jpg', 'jpeg', 'png', 'gif');
$dir_contents = scandir('Slike/');
foreach ($dir_contents as $file) {
    $file_type = strtolower(end(explode('.', $file)));
    if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
        $name = basename($file);
        echo "<img src='slika.php?name={$name}'/>";
    }
}

end_body();

end_html();