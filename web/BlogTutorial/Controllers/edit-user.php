<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: Login.php'); }
include_once "../Views/EditUserHeader.html";
include('menu.php');?>
	<p><a href="users.php">User Admin Index</a></p>

	<h2>Edit User</h2>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){

		//collect form data
		extract($_POST);

		//very basic validation
		if($username ==''){
			$error[] = 'Please enter the username.';
		}

		if( strlen($password) > 0){

			if($password ==''){
				$error[] = 'Please enter the password.';
			}

			if($passwordConfirm ==''){
				$error[] = 'Please confirm the password.';
			}

			if($password != $passwordConfirm){
				$error[] = 'Passwords do not match.';
			}

		}
		

		if($email ==''){
			$error[] = 'Please enter the email address.';
		}

		if(!isset($error)){

			try {

				if(isset($password)){

					//update into database
					$stmt = $db->prepare('UPDATE blog_members SET username = ?, password = ?, email = ? WHERE memberid = ?') ;
					$stmt->execute([$username, $password, $email, $memberid]);

				} else {

					//update database
					$stmt = $db->prepare('UPDATE blog_members SET username = ?, email = ? WHERE memberID = ?') ;
					$stmt->execute([$username, $email, $memberid]);

				}
				

				//redirect to index page
				header('Location: users.php?action=updated');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$memberID = $_GET['id'];
			$stmt = $db->prepare('SELECT memberID, username, email FROM blog_members WHERE memberID = ?') ;
			$stmt->execute([$memberID]);
			$post = $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

include_once "../Views/EditUserFooter.html";