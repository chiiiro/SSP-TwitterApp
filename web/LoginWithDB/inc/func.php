<?php
/**
 * Returns HTML sanitized string
 *
 * @param string $v
 *
 * @return string
 */
function __($v) {
    return htmlentities($v, ENT_QUOTES, "utf-8");
}
function get($v, $d = null) {
    return isset($_GET[$v]) ? $_GET[$v] : $d;
}
function post($v, $d = null) {
    return isset($_POST[$v]) ? $_POST[$v] : $d;
}
/**
 * Checks if request is POST. If key is provided, then it checks
 * also if that key exists. It can be used to determine which button was pressed
 *
 * @param string|null $key
 *
 * @return bool
 */
function isPost($key = null) {
    if (null === $key) {
        return count($_POST) > 0;
    }
    return null !== post($key);
}
function redirect($url) {
    header("Location: " . $url);
    die();
}