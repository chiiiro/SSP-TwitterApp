<?php

class User {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function isLoggedIn() {
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            return true;
        }
    }

    public function login($username,$password){

        $query = $this->db->prepare("SELECT * FROM korisnici WHERE username='$username' AND password='$password'");
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