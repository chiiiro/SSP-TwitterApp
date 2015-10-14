<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 14/10/15
 * Time: 14:27
 */

include_once "lib/html_library.php";

function readQuestions($fileName) {
    $displayQuestions = array();

    if (file_exists($fileName) && is_readable($fileName)) {
        $questions = file($fileName);

        //za svaku liniju provjeri da li pocinje s # ili je prazna (njih preskace)
        //inace razdvaja pitanja i odgovore
        foreach ($questions as $key => $value) {
            if(substr(trim($value), 0, 1) === "#") {
                continue;
            }
            if(trim($value) == '') {
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

    //za sva učitana pitanja..
    foreach($questions as $key => $value) {
        $pitanje = $value[0];
        $tmp = explode("{", $pitanje);
        $pitanje = $tmp[0];
        $tipPitanja = substr($tmp[1], 0, 1);  #govori nam da li je pitanje 1, 2 ili 3
        $odgovori = $value[1];
        $tmp = explode("=", $odgovori);
        $tocanOdgovor = $tmp[1];  #tocan odgovor
        $odgovori = $tmp[0]; #samo odgovori bez tocnog

        echo "<b>$pitanje</b><br/><br/>";  #ispisuje pitanje

        $choices = explode(",", $odgovori);  #razdvaja odgovore po zarezima

        //kreira radio button za svaki odgovor
        foreach($choices as $choice) {
            if($tipPitanja === "3") {
                create_input(array("type" => "text", "name" => $key));
                continue;
            }
            create_input(array("type" => "radio", "name" => $key, "value" => $tocanOdgovor));
            echo $choice . "<br/>";
        }
        echo "<br/>";
    }
}


####################
#parsirati pitanje da se ne prikazuje {1} i da na temelju toga možemo odabrati tip pitanja
####################