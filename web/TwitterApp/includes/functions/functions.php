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
 * Getts id from URL link.
 * @return mixed
 */
function getIdFromURL() {
    return \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");
}

/**
 * Checks if id is numerical and if user with provided id exists.
 * @param $id
 * @param $user
 */
function checkRequestURL($id, $user) {
    checkUnauthorizedAccess();

    if(null === $id) {
        redirect(\route\Route::get("errorPage")->generate());
    }

    if(intval($id) < 1) {
        redirect(\route\Route::get("errorPage")->generate());
    }

    if($user == null) {
        redirect(\route\Route::get("errorPage")->generate());
    }

}

function checkUnauthorizedAccess() {
    if(!isLoggedIn()) {
        redirect(\route\Route::get("unauthorizedAccess")->generate());
    }
}