<?php

namespace Controllers;

use Repository\UserRepository;
use templates\ChangePassword;
use templates\ChangeUsername;
use templates\Main;
use templates\UploadProfilePicture;

class Settings implements Controller {

    //uploads profile picture
    public function action()
    {

        $main = new Main();
        $main->setPageTitle("Change profile picture");
        $profilePic = new UploadProfilePicture();
        $main->setBody($profilePic);
        echo $main;

        $username = $_SESSION['username'];

        if(post('submit')) {
            move_uploaded_file($_FILES['file']['tmp_name'],"assets/images/profile/".$_FILES['file']['name']);
            UserRepository::setProfilePicture($username);
        }

    }

    public function changePassword() {
        $main = new Main();
        $main->setPageTitle("Password settings");
        $changePassword = new ChangePassword();
        $main->setBody($changePassword);
        echo $main;

        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $username = getUsername();

        if(post('change-pwd')) {
            $password = post('first');
            $confirmedPassword = post('second');
            $userSecurityNumber = post('security');

            $error = false;

            if(!ctype_alnum($password) || strlen($password) < 4 || strlen($password) > 25) {
                $error = true;
            }

            if(!ctype_alnum($confirmedPassword) || strlen($confirmedPassword) < 4 || strlen($confirmedPassword) > 25) {
                $error = true;
            }

            if($userSecurityNumber < 1113 || $userSecurityNumber > 1207) {
                $error = true;
            }

            if($password === $confirmedPassword && !$error) {
                $hashedPassword = hash_password($password);
                UserRepository::changePassword($username, $hashedPassword);
            }
        }
    }

    public function changeUsername() {
        $main = new Main();
        $main->setPageTitle("Username settings");
        $changeUsername = new ChangeUsername();
        $main->setBody($changeUsername);
        echo $main;

        if(!isLoggedIn()) {
            redirect(\route\Route::get("errorPage")->generate());
        }

        $oldUsername = getUsername();

        if(post('change-username')) {
            $newUsername = post('first');
            $confirmNewUsername = post('second');
            $userSecurityNumber = post('security');

            $error = false;

            if(!ctype_alnum($newUsername) || strlen($newUsername) < 4 || strlen($newUsername) > 25) {
                $error = true;
            }

            if(!ctype_alnum($confirmNewUsername) || strlen($confirmNewUsername) < 4 || strlen($confirmNewUsername) > 25) {
                $error = true;
            }

            if($userSecurityNumber < 1113 || $userSecurityNumber > 1207) {
                $error = true;
            }

            if($newUsername === $confirmNewUsername && !$error) {
                UserRepository::changeUsername($oldUsername, $newUsername);
                $_SESSION['username'] = $newUsername;
            }
        }
    }

}