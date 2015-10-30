<?php require('includes/config.php'); 

$postID = $_GET['id'];

$row = selectPostById($postID);

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

include_once "Views/ViewpostView.php";

