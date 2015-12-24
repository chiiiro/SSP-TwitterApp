<?php

use route\DefaultRoute;
use route\Route;

Route::register("index", new DefaultRoute("index", array(
    "controller" => "index",
    "action" => "action")));

Route::register("errorPage", new DefaultRoute("error/404", array(
    "controller" => "errorPage",
    "action" => "action")));