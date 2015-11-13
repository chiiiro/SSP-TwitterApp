<?php

use route\DefaultRoute;
use route\Route;

Route::register("index", new DefaultRoute("index", array(
    "controller" => "index",
    "action" => "action")));

Route::register("userIndex", new DefaultRoute("user-index", array(
    "controller" => "userIndex",
    "action" => "action")));

Route::register("login", new DefaultRoute("login", array(
        "controller" => "login",
        "action" => "action"
    ))
);

Route::register("logout", new DefaultRoute("logout", array(
        "controller" => "logout",
        "action" => "action"
    ))
);
Route::register("register", new DefaultRoute("register", array(
        "controller" => "register",
        "action" => "action"
    ))
);

Route::register("addPost", new DefaultRoute("post/add", array(
        "controller" => "addPost",
        "action" => "action"
    ))
);
Route::register("editPost", new DefaultRoute("post/<id>/edit", array(
        "controller" => "editPost",
        "action" => "action"
    ), array(
        "id" => "\\d+"
    ))
);

Route::register("readPost", new DefaultRoute("post/<id>/read", array(
        "controller" => "readPost",
        "action" => "action"
    ), array(
        "id" => "\\d+"
    ))
);

Route::register("addComment", new DefaultRoute("post/<id>/comment", array(
        "controller" => "readPost",
        "action" => "postCommentAction"
    ), array(
        "id" => "\\d+"
    ))
);


Route::register("delete", new DefaultRoute("post/<id>/delete", array(
        "controller" => "delete",
        "action" => "action"
    ), array(
        "id" => "\\d+"
    ))
);

Route::register("changePwd", new DefaultRoute("change/pwd", array(
        "controller" => "changePwd",
        "action" => "action"
    ))
);

Route::register("changeUser", new DefaultRoute("change/user", array(
        "controller" => "changeUser",
        "action" => "action"
    ))
);

Route::register("error404", new DefaultRoute("error/404", array(
        "controller" => "error404",
        "action" => "action"
    ))
);