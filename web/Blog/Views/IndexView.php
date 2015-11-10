<?php

function displayPostsInTable($query) {
    create_table(array("style"=>"width:400px"));
    create_table_row(array("contents" => array("Title", "Date", "Action")));

    foreach ($query as $row) {
        echo '<tr>';
        echo '<td>'.$row['posttitle'].'</td>';
        echo '<td>'.date('jS M Y', strtotime($row['postdate'])).'</td>';
        echo '<td>';
        echo "<a href=edit-post.php?id=" . $row['postid'] . ">Edit</a>";
        echo "<a href=javascript:delpost('" . $row['postid'] . ',' . $row['posttitle'] . ")>Delete</a>";
        echo '</td>';

        echo '</tr>';
    }

    end_table();

    start_form("", "post");
    create_input(array("type" => "submit", "name" => "logout", "value" => "Logout"));
    create_input(array("type" => "submit", "name" => "back", "value" => "Back"));
    end_form();
}
