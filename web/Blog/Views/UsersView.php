<?php

create_table(array("style"=>"width:400px"));
create_table_row(array("contents" => array("Username", "E-mail")));

foreach($stmt as $row) {
    echo '<tr>';
    echo '<td>'.$row['username'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '</tr>';
}

end_table();

start_form("", "post");
create_input(array("type" => "submit", "name" => "back", "value" => "Back"));