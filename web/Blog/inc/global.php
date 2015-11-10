<?php

include_once "func.php";

session_name("test");
session_start();

function __autoload($class) {

    $class = strtolower($class);

    $classpath = 'Models.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../Models.'.$class . '.php';
    if ( file_exists($classpath)) {
        require_once $classpath;
    }

}