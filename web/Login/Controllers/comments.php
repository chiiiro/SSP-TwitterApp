<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 15:53
 */

include_once "../lib/html_library.php";
include_once "../global.php";
include_once "../Views/komentari_view.php";

set_title("Komentari");

if(!isset($_SESSION['username'])) {
    header("Location: Login.php");
    exit;
} else {
    begin_paragraph();
    echo "You are logged in as " . $_SESSION['username'];
    end_paragraph();
    begin_paragraph();

    display_comments_form();
    end_paragraph();

    begin_paragraph();
    echo "<a href='logout.php'>Logout</a>";
    end_paragraph();

    write_comment();
}

function write_comment() {
    if(isset($_POST['submit'])) {
        $comment = $_POST['comment'];
        file_put_contents("../comments.txt", $_SESSION['username'] . ": " . $comment . "\n", FILE_APPEND);
    }
}