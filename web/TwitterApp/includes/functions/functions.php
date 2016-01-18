<?php

function redirect($url) {
    header("Location: " . $url);
    die();
}

function sanitize_output($string) {
    return htmlspecialchars($string);
}

/**
 * Hashira predanu lozinku.
 * @param $password
 */
function hash_password($password) {
    $salt = 'random string for better hashing';
    $hash = sha1($salt . $password);
    return $hash;
}

/**
 * Provjera prijavljenosti korisnika.
 * @return type true ako je korisnik prijavljen, false inače
 */
function isLoggedIn() {
    return isset($_SESSION['loggedin']);
}

/**
 * Vraca korisnicko ime ako je korisnik ulogiran.
 */
function getUsername() {
    if (isLoggedIn()) {
        return $_SESSION["username"];
    }

    return null;
}

/**
 * Iz tijela HTTP zahtjeva dohvaća parametar imena $v.
 * Ukoliko parametra nema, null vraćen.
 * @param string $v
 * @param type $d
 * @return type
 */
function post($v, $d = null) {
    return isset($_POST[$v]) ? $_POST[$v] : $d;
}

/**
 * Returns request method (get or post).
 * @return mixed
 */
function getRequestMethod() {
    return $_SERVER['REQUEST_METHOD'];
}

/**
 * Getts id from URL link.
 * @return mixed
 */
function getIdFromURL() {
    return \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("id");
}

function getSortingOrderFromURL() {
    return \dispatcher\DefaultDispatcher::instance()->getMatched()->getParam("order");
}

/**
 * Checks if id in URL is not null or not integer.
 * If it is, then redirects to error page.
 * @param $id
 */
function checkIntValueOfId($id) {
    if(null === $id) {
        redirect(\route\Route::get("errorPage")->generate());
    }

    if(intval($id) < 1) {
        redirect(\route\Route::get("errorPage")->generate());
    }
}

/**
 * Checks if id is numerical and if user with provided id exists.
 * @param $id
 * @param $user
 */
function checkRequestURL($id, $user) {
    checkUnauthorizedAccess();
    checkIntValueOfId($id);

    if($user == null) {
        redirect(\route\Route::get("errorPage")->generate());
    }

}

function checkUnauthorizedAccess() {
    if(!isLoggedIn()) {
        redirect(\route\Route::get("unauthorizedAccess")->generate());
    }
}

function newMessageNotification() {
    $userid = \Repository\UserRepository::getIdByUsername($_SESSION['username']);
    $messages = \Repository\MessageRepository::getMessages($userid);
    $unread = false;
    foreach($messages as $message) {
        if($message['readflag'] == 0) {
            $unread = true;
        }
    }

    $color = "default";

    if($unread) {
        $color = "red";
    }
    return $color;
}

function newRequestNotification() {
    $myID = \Repository\UserRepository::getIdByUsername($_SESSION['username']);
    $requests = \Repository\RequestRepository::checksNewRequests($myID);
    $counter = 0;
    foreach ($requests as $r) {
        $counter++;
    }

    $color = "default";
    if($counter > 0) {
        $color = "red";
    }
    return $color;
}

function checkPostTweet() {
    $toid = getIdFromURL();
    $currentID = \Repository\UserRepository::getIdByUsername($_SESSION['username']);

    checkIntValueOfId($toid);

    if($toid != $currentID) {
        $friends = \Repository\FriendRepository::isFriend($toid, $currentID);

        if($friends == null) {
            redirect(\route\Route::get("notFriends")->generate());
        }
    }


}

function checkPermissionToTweet() {
    $toid = getIdFromURL();
    $currentID = \Repository\UserRepository::getIdByUsername($_SESSION['username']);

    checkIntValueOfId($toid);

    if($toid != $currentID) {
        $friends = \Repository\FriendRepository::isFriend($toid, $currentID);

        if($friends == null) {
            return false;
        }
    }

    return true;
}

function checkPermissionToCommentTweet() {
    $tweetid = getIdFromURL();
    $tweet = \Repository\TweetRepository::getTweetById($tweetid);
    $fromID = $tweet['fromid'];
    $toid = $tweet['toid'];
    $currentID = \Repository\UserRepository::getIdByUsername($_SESSION['username']);

    checkIntValueOfId($tweetid);

    if($toid != $currentID) {
        if(\Repository\FriendRepository::isFriend($currentID, $tweet['toid']) == null) {
            return false;
        }
    }


    return true;
}