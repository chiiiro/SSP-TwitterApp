<?php

ob_start();
session_start();

defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

// Define absolute path to server root
define('SITE_ROOT', dirname(dirname(__FILE__)).DS);

// Define absolute path to includes
defined('INCLUDE_PATH') ? NULL : define('INCLUDE_PATH', SITE_ROOT.'includes'.DS);
defined('FUNCTION_PATH') ? NULL : define('FUNCTION_PATH', INCLUDE_PATH.'functions'.DS);
defined('LIB_PATH') ? NULL : define('LIB_PATH', INCLUDE_PATH.'libraries'.DS);
//defined('TEMPLATE_PATH') ? NULL : define('TEMPLATE_PATH', SITE_ROOT.'templates'.DS);
//defined('MODEL_PATH') ? NULL : define('MODEL_PATH', SITE_ROOT.'Models'.DS);
//defined('VIEW_PATH') ? NULL : define('VIEW_PATH', SITE_ROOT.'Views'.DS);
defined('REP_PATH') ? NULL : define('REP_PATH', SITE_ROOT.'Repository'.DS);

////////////////////////////////////////////////////////////////////////////////a
// Include library, helpers, functions
////////////////////////////////////////////////////////////////////////////////
require_once(FUNCTION_PATH.'functions.php');
require_once(LIB_PATH.'database.php');
//require_once(TEMPLATE_PATH.'Main.php');
//require_once(MODEL_PATH.'Post.php');
//require_once(MODEL_PATH.'User.php');
//require_once(REP_PATH.'PostRepository.php');
//require_once(REP_PATH.'UserRepository.php');

spl_autoload_register(function($className) {
    $fileName = "./" . str_replace("\\", "/", $className) . ".php";
    if(!is_readable($fileName)) {
        return false;
    }
    require_once $fileName;
    return true;
});

require_once "route.php";