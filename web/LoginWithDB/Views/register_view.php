<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 23/10/15
 * Time: 11:03
 */

create_doctype();

begin_html();

begin_head();
set_title("Register");
set_charset("utf-8");
end_head();

begin_body(array());
start_form("", "post");
begin_paragraph();
echo "Username: ";
create_input(array("type" => "text", "name" => "username", "id" => "username"));
end_paragraph();
begin_paragraph();
echo "Password: ";
create_input(array("type" => "password", "name" => "password", "id" => "password"));
end_paragraph();
begin_paragraph();
create_input(array("type" => "submit", "name" => "register", "value" => "Register"));
create_input(array("type" => "submit", "name" => "index", "value" => "Home page"));
end_paragraph();
end_form();
end_body();

end_html();