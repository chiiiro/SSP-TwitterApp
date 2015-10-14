<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 14/10/15
 * Time: 14:27
 */

include_once "html_library.php";

create_doctype();

begin_html();

begin_head();
echo "<title>Online kviz</title>";
end_head();

begin_body(array());

function readQuestions($fileName) {
    $displayQuestions = array();

    if (file_exists($fileName) && is_readable($fileName)) {
        $questions = file($fileName);

        foreach ($questions as $key => $value) {
            if(substr(trim($value), 0, 1) === "#") {
                continue;
            }
            $displayQuestions[] = explode(":", $value);
        }
    } else {
        echo "Error reading questions file.";
    }

    return $displayQuestions;
}

function displayTheQuestions($questions) {
    foreach($questions as $key => $value) {
        echo "<b>$value[0]</b><br/><br/>";  #ispisuje pitanje

        $choices = explode(",", $value[1]);  #razdvaja odgovore po zarezima

        foreach($choices as $choice) {
            create_input(array("type" => "radio", "name" => $key));
        }
        echo "<br/>";
    }
}

$loadedQuestions = readQuestions("pitanja.txt");
displayTheQuestions($loadedQuestions);


end_body();

end_html();