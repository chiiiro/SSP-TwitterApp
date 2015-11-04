<?php

class Database
{

    private static $db;

    public static function getInstance()
    {
        if (null === self::$db) {
            try {
                self::$db = new \PDO("pgsql:dbname=learning;host=localhost;user=iciric;password=iciric12345");
                self::$db->exec("SET NAMES utf8");
            } catch (PDOException $e) {
                var_dump($e);
                die();
            }
        }
        return self::$db;
    }
}