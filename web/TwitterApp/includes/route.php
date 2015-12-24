<?php

use route\DefaultRoute;
use route\Route;

Route::register("index", new DefaultRoute("index", array(
    "controller" => "index",
    "action" => "action")));