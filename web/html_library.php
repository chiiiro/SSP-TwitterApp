<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 13/10/15
 * Time: 16:07
 */

/**
 * Uvijek ispisuje sadrzzaj "<!doctype html>" i koristi se kao prva naredba
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
 * Ispisuje otvarajuci tag <body> te mu pridruzuje parove (atribut, vrijednost) na
 * temelju polja predanih parametara. Parove (atribut, vrijednost) potrebno je umetnuti u
1
 * tag na valjan nacin: nazivAtributa="vrijednostAtributa".
 *
 * @param {array} $params asocijativno polje parova atribut=>vrijednost
 */
function begin_body($params) {
    $body = "<body ";
    $atributi = array_keys($params);
    foreach($atributi as $atribut) {
        $body .= $atribut . "=\"" . $params[$atribut] . "\" ";
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
 * Stvara polje za unos teksta pri cemu su atributi i njihove vrijednosti odredjene predanim 2D
 * poljem parametara.
 * Struktura polja parametara:
 * array(’atribut’ => ’vrijednost1’, ’atribut2’ => ’vrijednost2’, ..., ’atributN’ => ’vrijednostN’).
 *
 * @param {array} $params asocijativno polje parova oblika atribut=>vrijednost
 * @return niz znakova koji predstavlja generirani input tag
 */
create_input($params);
/**
 * Generira padajuci izbornik odredjen elementom select. Predani parametri odredjuju atribute
 * izbornika (npr. name) te opcije koje izbornik treba sadrzavati, a one se predaju u preko
 * kljuca ’contents’.
 * Polje ima sljedeci format:
 * array(
 * ’kljuc1’ => ’vrijednost1’,
 * ...
 * ’kljucN’ => ’vrijednostN’
 * ’contents’ => array(’option1’, ’option2’, ..., ’optionM’)
 * )
 * Parametar contents odredjuje 1D polje i da je svaki element niz znakova. No, elementi
 * nisu vrijednosti koje treba ispisati kao opcije, nego <b>HTML k^od</b> koji definira svaku od
 * opcija, npr. ’<option>1</option>’
 *
 * @param {array} $params polje parametara koje odredjuje padajuci izbornik
 * @return niz znakova koji predstavlja generirani select tag
 */
create_select($params);
/**
 * Stvara element button pomocu predanih parametara i vraca generirani niz tag. Sadrzaj
 * gumba odredjuje parametar contents. Ako je njegova vrijednost jednaka praznom nizu znakova
 * ili uopce nije poslan, sadrzaj treba biti prazan.
 *
2
 * @params {array} $params polje parametara koje odredjuje dugme
 * @return niz znakova koji predstavlja generirani tag button
 */
create_button($params);