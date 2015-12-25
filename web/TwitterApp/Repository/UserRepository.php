<?php

namespace Repository;

use includes\libraries\Database;
use Models\User;

class UserRepository {

    public static function isLoggedIn() {
        return(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true);
    }

    public static function login($username, $password) {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
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

    public static function registerUser(User $user) {
        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO users (firstname, lastname, username, password, email) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$user->getFirstName(), $user->getLastName(), $user->getUsername(), $user->getPassword(), $user->getEmail()]);
        $affected = $query->rowCount();
        if($affected == 1) {
            redirect(\route\Route::get("index")->generate());
        } else {

            var_dump($user->getFirstName());
            var_dump($user->getLastName());
            var_dump($user->getUsername());
            var_dump($user->getPassword());
            var_dump($user->getEmail());
            ?>

            <script>
                document.getElementById("failedRegister").innerHTML =
                    "User already exists.";
            </script>

            <?php
        }
    }

    public static function getAllUsers()
    {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM blog_members");
        $query->execute();
        return $query;
    }

//    public static function getUsernameById($id) {
//        $db = Database::getInstance();
//        $query = $db->prepare('SELECT username FROM blog_members WHERE memberid = ?');
//        $query->execute([$id]);
//        return $query->fetch()['username'];
//    }

//    public static function getIdByUsername($username) {
//        $db = Database::getInstance();
//        $query = $db->prepare('SELECT userid FROM users WHERE username = ?');
//        $query->execute([$username]);
//        return $query->fetch()['userid'];
//    }

    public static function changePassword($username, $password) {
        $db = Database::getInstance();
        $query = $db->prepare('UPDATE users SET password = ? WHERE username = ?');
        $query->execute([$password, $username]);
    }

    public static function changeUsername($oldUsername, $newUsername)
    {
        $db = Database::getInstance();
        $query = $db->prepare('UPDATE users SET username = ? WHERE username = ?');
        $query->execute([$newUsername, $oldUsername]);
    }

}