<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 23/10/15
 * Time: 10:46
 */

include_once "../DB/connection.php";

/**
 * Funkcija provjerava da li se korisnik nalazi u bazi podataka.
 * @param $username korisnicko ime
 * @param $password lozinka
 * @return bool true ako korisnik postoji, inace false
 */
function checkUser($username, $password) {
    $db = Database::getInstance()->getConnection();
    $query = $db->prepare("SELECT * FROM korisnici WHERE username='$username' AND password='$password'");
    $query->execute();
    $result = $query->fetchAll();
    if(count($result) == 1) {
        return true;
    } else {
        return false;
    }
}

/**
 * Funkcija ispisuje pohranjene komentare.
 */
function writeComments() {
    $db = Database::getInstance()->getConnection();
    $query = $db->prepare("SELECT * FROM komentari");
    $query->execute();
    foreach ($query as $row) {
        echo $row['username'] . ": " . $row['comment'] . "<br>";
    }
}

/**
 * Funkcija sprema korisnicke komentare u bazu podataka.
 * @param $username korisnik
 * @param $comment komentar
 */
function insertComment($username, $comment) {
    $db = Database::getInstance()->getConnection();
    $query = $db->prepare("INSERT INTO komentari (username, comment) VALUES (:username, :comment)");
    $query->execute(array(":username" => $username, ":comment" => $comment));
}

/**
 * Funkcija registrira korisnika i ubacuje ga u bazu.
 * @param $username korisnicko ime
 * @param $password lozinka
 */
function insertUser($username, $password) {
    $db = Database::getInstance()->getConnection();
    $query = $db->prepare("INSERT INTO korisnici (username, password) VALUES (:username, :password)");
    $query->execute(array(":username" => $username, ":password" => $password));
}