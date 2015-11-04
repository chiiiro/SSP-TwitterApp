<?php

include_once "../includes/config.php";

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
	
	// Get id from querystring
	$id = $_GET['id'];

	PostRepository::delete($id);
}

// Redirect to site root
redirect("../index.php");