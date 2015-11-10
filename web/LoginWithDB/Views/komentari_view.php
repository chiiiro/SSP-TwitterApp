<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 09:47
 */

include_once "../lib/html_library.php";

set_title("Komentari");

function display_comments_form() {
    create_doctype();

    begin_html();

    begin_head();
    set_title("Komentari");
    set_charset("utf-8");
    end_head();

    begin_body(array());
    start_form("", "post");
    begin_paragraph();
    echo "Komentar: ";
    create_input(array("type" => "text", "name" => "comment", "id" => "comment", "size" => "80"));
    end_paragraph();
    begin_paragraph();
    create_input(array("type" => "submit", "name" => "submit", "value" => "Comment"));
    end_paragraph();
    end_form();
    end_body();

    end_html();
}