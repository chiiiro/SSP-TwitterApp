<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 14/10/15
 * Time: 15:54
 */

include_once "lib/html_library.php";
include_once "parser_pitanja.php";

create_doctype();

begin_html();

begin_head();
echo "<title>Online kviz</title>";
end_head();

begin_body(array());



$loadedQuestions = readQuestions("pitanja.txt");
displayTheQuestions($loadedQuestions);


end_body();

end_html();