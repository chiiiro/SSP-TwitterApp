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

    public static function getUsernameById($id) {
        $db = Database::getInstance();
        $query = $db->prepare('SELECT username FROM blog_members WHERE memberid = ?');
        $query->execute([$id]);
        return $query->fetch()['username'];
    }

    public static function getIdByUsername($username) {
        $db = Database::getInstance();
        $query = $db->prepare('SELECT memberid FROM blog_members WHERE username = ?');
        $query->execute([$username]);
        return $query->fetch()['memberid'];
    }

    public static function changePassword(User $user) {
        $db = Database::getInstance();
        $query = $db->prepare('UPDATE blog_members SET password = ? WHERE username = ?');
        $query->execute([$user->getPassword(), $user->getUsername()]);
    }

    public static function changeUsername(User $user)
    {
        $db = Database::getInstance();
        $query = $db->prepare('UPDATE blog_members SET username = ? WHERE memberid = ?');
        $query->execute([$user->getUsername(), $user->getId()]);
    }

}