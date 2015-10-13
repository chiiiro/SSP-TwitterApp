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
    $atributi = array_keys($params);
    echo "<body ";
    foreach($atributi as $atribut) {
        echo $atribut . "=\"" . $params[$atribut] . " ";
    }
    echo ">";
}
/**
 * Ispisuje zatvarajuci tag </body>
 */
function end_body() {
    echo "</body>";
}