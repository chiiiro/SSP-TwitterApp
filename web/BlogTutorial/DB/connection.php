<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 28/10/15
 * Time: 09:57
 */

class Database {

    private static $pdo;


    public static function getInstance() {

        if (null === self::$pdo) {
            try {
                self::$pdo = new \PDO("pgsql:dbname=learning;host=localhost;user=iciric;password=iciric12345");
                self::$pdo->exec("SET NAMES utf8");
            } catch (PDOException $e) {
                var_dump($e);
                die();
            }
        }

        return self::$pdo;
    }
}