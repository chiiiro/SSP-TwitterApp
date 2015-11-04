<?php

include_once "../includes/config.php";

UserRepository::logout();

redirect("../index.php");