<?php

include_once "../inc/global.php";
include_once "../Models/User.php";
include_once "../DB/connection.php";

$db = Database::getInstance();
$user = new User($db);

$user->logout();
redirect("../homepage.php");
