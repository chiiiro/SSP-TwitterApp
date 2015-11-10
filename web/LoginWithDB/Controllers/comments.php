<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 15:53
 */

include_once "../lib/html_library.php";
include_once "../inc/global.php";
include_once "../Views/komentari_view.php";
include_once "../Model/Comment.php";

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
        if(empty($_POST['comment'])) {
            echo "Please enter your comment.";
        } else {
            $comment = new Comment();
            $comment->username = ($_SESSION['username']);
            $comment->comment = ($_POST['comment']);
            $comment->save();
        }
    }
}