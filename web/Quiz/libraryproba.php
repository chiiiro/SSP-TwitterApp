<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 13/10/15
 * Time: 16:29
 */

include_once "../lib/html_library.php";

create_doctype();
begin_html();

begin_head();
echo "<title>Proba</title>";
end_head();

begin_body(array());

start_form('posalji.php', 'post');
begin_paragraph();
echo "First name: ";
create_input(array("type"=>"text", "name" => "fname"));
end_paragraph();

begin_paragraph();
echo "Last name: ";
create_input(array("type"=>"text", "name" => "lname"));
end_paragraph();
end_form();

begin_paragraph();
create_button(array("type"=>"button", "contents"=>"Gumbic"));
end_paragraph();

begin_paragraph();
create_table(array("border" => "1", "style" => "width:20%"));
create_table_row(array("contents" => array("ivan", "ciric", "22")));
create_table_cell(array("colspan" => "3", "contents" => "marko"));
end_table();
end_paragraph();

end_body();

end_html();