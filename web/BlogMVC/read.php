<?php

include_once "includes/config.php";

use Controllers\ReadPost;

$readCtl = new ReadPost();
$readCtl->action();
