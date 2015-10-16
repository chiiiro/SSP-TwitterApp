<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 09:39
 */

include_once "../lib/html_library.php";
include_once "parser_pitanja.php";

create_doctype();

begin_html();

begin_head();
set_charset("utf-8");
create_element("title", true, array("contents" => "Odgovori"));
end_head();

begin_body(array());

if (isset($_POST['submitquiz'])) {
    $answers = readAnswers("answers.txt");
    $answerCount = count($answers);
    $correctCount = 0;

    foreach ($answers as $key => $value) {
        $odgovor = "";

        if(isset($_POST[$key])) {
            $odgovor = $_POST[$key];
        }

        if(is_array($odgovor)) {
            $odgovor = implode(',', $odgovor);
        }

        if (strtolower(trim($value)) == strtolower($odgovor)) {
            echo "Odgovor na " . ($key + 1) . ". pitanje je točan.";
            $correctCount++;
            break_line();
        } else {
            if(isset($_POST[$key])) {
                echo "Odgovor na " . ($key + 1) . ". pitanje nije točan. Unijeli ste: " . $odgovor . ", a točan odgovor je: " . trim($value) . ".";
            } else {
                echo "Odgovor na " . ($key + 1) . ". pitanje nije točan. Niste unijeli ništa, a točan odgovor je: " . trim($value) . ".";
            }

            break_line();
        }
    }

    break_line();
    echo "Ukupan broj pitanja: " . $answerCount;
    break_line();
    echo "Broj točnih odgovora: " . $correctCount;
    break_line();
    echo "Broj netočnih odgovora: " . ($answerCount - $correctCount);
    break_line();
    echo "Postotak rješenosti kviza: " . ($correctCount / $answerCount) * 100 . "%";
    break_line();

}

end_body();

end_html();