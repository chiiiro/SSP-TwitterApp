<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 09:33
 */

include_once "../lib/html_library.php";

function display_login_form() {

    create_doctype();

    begin_html();

    begin_head();
    //echo "<link rel='stylesheet' href='/LoginWithDb/Views/login.css'>";

    set_title("Login");
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
    create_input(array("type" => "submit", "name" => "login", "value" => "Login"));
    create_input(array("type" => "submit", "name" => "register", "value" => "Register"));
    end_paragraph();
    end_form();
    end_body();

    end_html();
}