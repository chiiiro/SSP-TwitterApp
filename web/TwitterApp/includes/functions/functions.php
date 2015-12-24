<?php

function redirect($url) {
    header("Location: " . $url);
    die();
}

function sanitize_output($string) {
    return htmlspecialchars($string);
}

/**
 * Hashira predanu lozinku.
 * @param $password
 */
function hash_password($password) {
    $salt = 'random string for better hashing';
    $hash = sha1($salt . $password);
    return $hash;
}

/**
 * Provjera prijavljenosti korisnika.
 * @return type true ako je korisnik prijavljen, false inače
 */
function isLoggedIn() {
    return isset($_SESSION['loggedin']);
}

/**
 * Vraca korisnicko ime ako je korisnik ulogiran.
 */
function getUsername() {
    if (isLoggedIn()) {
        return $_SESSION["username"];
    }

    return null;
}

/**
 * Iz tijela HTTP zahtjeva dohvaća parametar imena $v.
 * Ukoliko parametra nema, null vraćen.
 * @param string $v
 * @param type $d
 * @return type
 */
function post($v, $d = null) {
    return isset($_POST[$v]) ? $_POST[$v] : $d;
}

/**
 * Returns request method (get or post).
 * @return mixed
 */
function getRequestMethod() {
    return $_SERVER['REQUEST_METHOD'];
}

/**
 * Prints provided error message in desired field.
 * @param $elementId
 * @param $errorMessage
 */
function alert($elementId, $errorMessage) {
    echo "<script language='javascript'>
                     document.getElementById('$elementId').innerHTML = '$errorMessage';
                </script>";
}