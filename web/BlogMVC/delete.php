<?php

include_once "includes/config.php";

$deleteCtl = new \Controllers\Delete();
$deleteCtl->action();

redirect("index.php");