<?php

namespace Repository;

use includes\libraries\Database;
use Models\User;

class UserRepository {

    public static function is_logged_in(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            return true;
        }
    }

    public static function login($username,$password){
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM blog_members WHERE username = ? AND password = ?");
        $query->execute([$username, $password]);
        $result = $query->fetchAll();
        if(count($result) == 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            return true;
        } else {
            return false;
        }
    }

    public static function logout(){
        session_destroy();
    }

    public static function register(User $user) {
        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO blog_members (username,password,email) VALUES (?, ?, ?)');
        $query->execute([$user->getUsername(), $user->getPassword(), $user->getEmail()]);
        $affected = $query->rowCount();
        if($affected == 1) {
            redirect(\route\Route::get("login")->generate());
        } else {
            echo "<script language='javascript'>
                alert('User already exists!');
            </script>";
        }
    }
}