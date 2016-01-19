<?php

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

/**
 * Checks if user tried to enter page for which he has not access.
 * It redirects to unauthorized access page.
 */
function checkUnauthorizedAccess() {
    if(!isLoggedIn()) {
        redirect(\route\Route::get("unauthorizedAccess")->generate());
    }
}

/**
 * Checks if user has permission to post tweet.
 * User has permission to post tweet on his own wall or his friend's wall.
 * @return bool
 */
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

/**
 * Checks if user has permission to comment on tweet.
 * User can comment tweet only if he is friend with user that posted tweet.
 * @return bool
 */
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