<?php

class User {

    private $db;
	
	function __construct($db){
		$this->db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}		
	}

	public function login($username,$password){

		$query = $this->db->prepare("SELECT * FROM blog_members WHERE username='$username' AND password='$password'");
		$query->execute();
		$result = $query->fetchAll();
		if(count($result) == 1) {
			$_SESSION['loggedin'] = true;
			return true;
		} else {
			return false;
		}
	}

	public function logout(){
		session_destroy();
	}
	
}