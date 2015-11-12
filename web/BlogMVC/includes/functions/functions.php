<?php

function redirect($url) {
    header("Location: " . $url);
    die();
}

function sanitize_output($string) {
    return htmlspecialchars($string);
}

function hash_password($password) {
    $salt = 'random string for better hashing';
    $hash = sha1($salt . $password);
    return $hash;
}