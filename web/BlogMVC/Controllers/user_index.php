<?php

include_once "../includes/config.php";

$pageTitle = 'Blog';
$username = $_SESSION['username'];

$posts = PostRepository::getAllByUsername($username);

require_once (VIEW_PATH.'user_index.view.php');