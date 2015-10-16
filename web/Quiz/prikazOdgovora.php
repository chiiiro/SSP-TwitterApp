<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 16/10/15
 * Time: 09:39
 */

include_once "lib/html_library.php";
include_once "parser_pitanja.php";

create_doctype();

begin_html();

begin_head();
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

        if (strtolower(trim($value)) == strtolower($odgovor)) {
            echo "Odgovor na " . ($key + 1) . ". pitanje je tocan.";
            $correctCount++;
            create_element("br/", false, array());
        } else {
            if(isset($_POST[$key])) {
                echo "Odgovor na " . ($key + 1) . ". pitanje nije tocan. Unijeli ste: " . $odgovor . ", a tocan odgovor je: " . trim($value) . ".";
            } else {
                echo "Odgovor na " . ($key + 1) . ". pitanje nije tocan. Niste unijeli nista, a tocan odgovor je: " . trim($value) . ".";
            }

            create_element("br/", false, array());
        }
    }

    create_element("br/", false, array());
    echo "Ukupan broj pitanja: " . $answerCount;
    create_element("br", false, array());
    echo "Broj tocnih odgovora: " . $correctCount;
    create_element("br", false, array());
    echo "Broj netocnih odgovora: " . ($answerCount - $correctCount);
    create_element("br", false, array());
    echo "Postotak rjesenosti kviza: " . ($correctCount / $answerCount) . "%";
    create_element("br", false, array());

}

end_body();

end_html();