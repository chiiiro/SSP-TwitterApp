<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 14/10/15
 * Time: 15:54
 */

include_once "../lib/html_library.php";
include_once "parser_pitanja.php";

create_doctype();

begin_html();

begin_head();
set_charset("utf-8");
create_element("title", true, array("contents" => "Online kviz"));
end_head();

begin_body(array());

start_form("prikazOdgovora.php", "POST");

$loadedQuestions = readQuestions("pitanja.txt");
displayTheQuestions($loadedQuestions);

begin_paragraph();
create_input(array("type" => "submit", "name" => "submitquiz", "value" => "Posalji odgovore"));
end_paragraph();

end_form();

end_body();

end_html();