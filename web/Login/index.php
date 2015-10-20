<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 15:53
 */

include_once "../lib/html_library.php";
session_name("test");
session_start();

set_title("Index");

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
} else {
    begin_paragraph();
    echo "You are logged in as " . $_SESSION['username'];
    end_paragraph();
    begin_paragraph();
    echo "<a href='logout.php'>Logout</a>";
    end_paragraph();
}