<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 10:36
 */

include_once "../lib/html_library.php";

set_title("Home");
set_charset("utf-8");

function display_index_form() {
    start_form("", "post");
    begin_paragraph();
    create_input(array("type" => "submit", "name" => "login", "value" => "Login"));
    create_input(array("type" => "submit", "name" => "register", "value" => "Register"));
    end_paragraph();
}