<?php

use route\DefaultRoute;
use route\Route;

Route::register("index", new DefaultRoute("index", array(
    "controller" => "index",
    "action" => "action")));

Route::register("errorPage", new DefaultRoute("error/404", array(
    "controller" => "errorPage",
    "action" => "action")));

Route::register("register", new DefaultRoute("register", array(
    "controller" => "register",
    "action" => "action")));

Route::register("twitterWall", new DefaultRoute("wall", array(
    "controller" => "twitterWall",
    "action" => "action")));

Route::register("logout", new DefaultRoute("logout", array(
    "controller" => "index",
    "action" => "logout")));

Route::register("changePassword", new DefaultRoute("settings/password", array(
    "controller" => "settings",
    "action" => "changePassword")));

Route::register("changeUsername", new DefaultRoute("settings/username", array(
    "controller" => "settings",
    "action" => "changeUsername")));

Route::register("changeProfilePicture", new DefaultRoute("settings/picture", array(
    "controller" => "settings",
    "action" => "action")));

Route::register("addGallery", new DefaultRoute("gallery/add", array(
    "controller" => "addGallery",
    "action" => "action")));

Route::register("listGalleries", new DefaultRoute("galleries", array(
    "controller" => "listGalleries",
    "action" => "action")));

Route::register("viewGallery", new DefaultRoute("gallery/<id>", array(
        "controller" => "viewGallery",
        "action" => "action"
    ), array(
        "id" => "\\d+"
    ))
);

Route::register("addPhoto", new DefaultRoute("photo/add/<galleryID>", array(
    "controller" => "addPhoto",
    "action" => "action"
    ), array(
        "galleryID" => "\\d+"
    ))
);