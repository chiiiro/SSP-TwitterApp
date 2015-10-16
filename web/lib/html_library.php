<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 13/10/15
 * Time: 16:07
 */

/**
 * Uvijek ispisuje sadrzaj "<!doctype html>" i koristi se kao prva naredba
 * kod stvaranja dokumenta.
 */
function create_doctype(){
    echo "<!doctype html>";
}

/**
 * Ispisuje otvarajuci tag <html>
 */
function begin_html() {
    echo "<html>";
}
/**
 * Ispisuje zatvarajuci tag </html>
 */
function end_html() {
    echo "</html>";

}
/**
 * Ispisuje otvarajuci tag <head>
 */
function begin_head() {
    echo "<head>";

}
/**
 * Ispisuje zatvarajuci tag </head>
 */
function end_head() {
    echo "</head>";
}

/**
 * Postavlja željeni charset.
 * @param $charset
 */
function set_charset($charset) {
    $c = "<meta charset='" . $charset . "' />";
    echo $c;
}

/**
 * Ispisuje otvarajuci tag <p>
 */
function begin_paragraph() {
    echo "<p>";
}

/**
 * Ispisuje zatvarajuci tag </p>
 */
function end_paragraph() {
    echo"</p>";
}

/**
 * Ispisuje otvarajuci tag <body> te mu pridruzuje parove (atribut, vrijednost) na
 * temelju polja predanih parametara. Parove (atribut, vrijednost) potrebno je umetnuti u
1
 * tag na valjan nacin: nazivAtributa="vrijednostAtributa".
 *
 * @param {array} $params asocijativno polje parova atribut=>vrijednost
 */
function begin_body($params) {
    $body = "<body ";
    if(isset($params)) {
        $atributi = array_keys($params);
        foreach ($atributi as $atribut) {
            $body .= $atribut . "=\"" . $params[$atribut] . "\" ";
        }
    }
    $body .= ">";
    echo $body;
}
/**
 * Ispisuje zatvarajuci tag </body>
 */
function end_body() {
    echo "</body>";
}

/**
 * Ispisuje tag za odlazak u novi red.
 */
function break_line() {
    echo "<br/>";
}

/*
* Generira tag <form> i dodjeljuje mu atribute action i method s vrijednostima koje
* ovise o predanim parametrima
*
* @param {String} $action relativna ili apsolutna putanja do skrtipte za obradu obrasca
* @param {String} $method GET ili POST
*/
function start_form($action, $method) {
    $form = "<form ";
    $form .= "action=\"" . $action . "\" method=\"" . $method . "\">";
    echo $form;
}
/**
 * Ispisuje zatvarajuci tag </form>
 */
function end_form() {
    echo "</form>";
}

/**
 * Stvara polje za unos teksta.
 *
 * @param {array} $params asocijativno polje parova oblika atribut=>vrijednost
 * @return niz znakova koji predstavlja generirani input tag
 */
function create_input($params) {
    $inputTag = "<input ";
    foreach($params as $key=>$value) {
        $inputTag .= $key . "=\"" . $value . "\" ";
    }
    $inputTag .= ">";
    echo $inputTag;
}
/**
 * Generira padajuci izbornik odredjen elementom select. Predani parametri odredjuju atribute
 * izbornika (npr. name) te opcije koje izbornik treba sadrzavati, a one se predaju u preko
 * kljuca ’contents’.
 * ’contents’ => array(’option1’, ’option2’, ..., ’optionM’)
 *
 * @param {array} $params polje parametara koje odredjuje padajuci izbornik
 * @return niz znakova koji predstavlja generirani select tag
 */
function create_select($params) {
    $select = "<select ";
    foreach($params as $key=>$value) {
        if($key === 'contents') {
            continue;
        }
        $select .= $key . "=\"" . $value . "\" ";
    }
    $select .= ">";

    if(isset($params['contents'])) {
        $contents = $params['contents'];
        foreach($contents as $content) {
            $select .= "<option>" . $content . "</option>";
        }
    }

    $select .= "</select>";

    echo $select;
}
/**
 * Stvara element button pomocu predanih parametara i vraca generirani niz tag. Sadrzaj
 * gumba odredjuje parametar contents. Ako je njegova vrijednost jednaka praznom nizu znakova
 * ili uopce nije poslan, sadrzaj treba biti prazan.
 *
 * @params {array} $params polje parametara koje odredjuje dugme
 * @return niz znakova koji predstavlja generirani tag button
 */
function create_button($params) {
    $button = "<button";
    foreach($params as $key=>$value) {
        if($key === "contents") {
            continue;
        }
        $button .= " " . $key . "=\"" . $value . "\"";
    }
    $button .= ">";

    if(isset($params["contents"])) {
        $button .= $params["contents"];
    }

    $button .= "</button>";

    echo $button;
}

/**
 * Ispisuje otvarajuci tag <table>. Polje parametara odredjuje atribute tablice i
 * vrijednosti atributa.
 *
 * @param {array} $params polje parametara spremljenih po principu ’atribut’ => ’vrijednost’
 */
function create_table($params){
    $table = "<table";
    foreach($params as $key=>$value) {
        $table .= " " . $key . "=\"" . $value . "\"";
    }
    $table .= ">";
    echo $table;
}
/**
 * Ispisuje zatvarajuci tag </table>
 */
function end_table() {
    echo "</table>";
}
/**
 * Generira HTML potreban za stvaranje jednog retka tablice. U polju parametara koje
 * prima moraju biti definirane i celije tablice i to parametrom ’contents’.
 *
 * @param {array} $params polje parametara koje odredjuje jedan redak tablice
 * @return niz znakova koji predstavlja HTML kod retka tablice
 */
function create_table_row($params) {
    $row = "<tr";
    foreach($params as $key=>$value) {
        if($key === "contents") {
            continue;
        }
        $row .= " " . $key . "=\"" . $value . "\"";
    }
    $row .= ">";

    if(isset($params["contents"])) {
        $contents = $params["contents"];
        foreach($contents as $content) {
            $row .= "<td>" . $content . "</td>";
        }
    }

    $row .= "</tr>";

    echo $row;
}


/**
 * Na temelju predanih parametara koji odredjuju atribute i vrijednosti generira HTML kod
 * celije.
 * Sadrzaj celije odredjen je parametrom ’contents’. Ako tog parametra nema ili je jednak praznom
 * nizu znakova, potrebno je generirati praznu celiju:
 *
 * @param {array} $params polje parametara koje odredjuje celiju
 * @return niz znakova koji odredjuje HTML kod celije
 */
function create_table_cell($params) {
    $cell = "<td";
    foreach($params as $key=>$value) {
        if($key === "contents") {
            continue;
        }
        $cell .= " " . $key . "=\"" . $value . "\"";
    }
    $cell .= ">";

    if(isset($params["contents"])) {
        $cell .= $params["contents"];
    }

    $cell .= "</td>";

    echo $cell;
}
/**
 * Na temelju predanih parametara koji odredjuju atribute, naziv elementa i zastavice koja
 * odredjuje ima li otvarajuci tag pripadajuci zatvarajuci tag generira HTML kod proizvoljnog
 * elementa.
 * Ako sadrzaj elementa treba biti prazan ili element uopce nije definirat tako da treba
 * imati sadrzja, potrebno je ili postaviti parametar ’contents’ na prazan niz znakova ili
 * ga uopce ne poslati.
 *
 * @param {String} $name naziv elementa
 * @param {boolean} true ako ima zatvarajuci tag, false inace
 * @param {array} $params polje parametara koje odredjuje celiju
 * @return niz znakova jednak HTML kodu elementa
 */
function create_element($name, $closed = true, $params) {
    $element = "<" . $name;

    foreach($params as $key=>$value) {
        if($key === "contents") {
            continue;
        }
        $element .= " " . $key . "=\"" . $value . "\"";
    }

    $element .= ">";

    if(isset($params["contents"])) {
        $element .= $params["contents"];
    }

    if($closed === true) {
        $element .= "</" . $name . ">";
    }

    echo $element;

}