<?php

include_once "../lib/html_library.php";

set_title("Index");
set_charset("utf-8");

function displayPosts($query) {
    foreach ($query as $row) {
        echo '<div>';
        echo '<h1><a href="viewpost.php?id=' . $row['postID'] . '">' . $row['postTitle'] . '</a></h1>';
        echo '<p>Posted on ' . date('jS M Y', strtotime($row['postDate'])) . '</p>';
        echo '<p>' . $row['postDesc'] . '</p>';
        echo '<p><a href="viewpost.php?id=' . $row['postID'] . '">Read More</a></p>';
        echo '</div>';
    }
}

function displayIndexForm() {
    start_form("", "post");
    begin_paragraph();
    create_input(array("type" => "submit", "name" => "login", "value" => "Login"));
    create_input(array("type" => "submit", "name" => "register", "value" => "Register"));
    end_paragraph();
}