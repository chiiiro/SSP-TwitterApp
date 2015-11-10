<?php

class Database {

    private $connection;
    private static $instance;

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        try {
            $this->connection = new \PDO("pgsql:dbname=learning;host=localhost;user=iciric;password=iciric12345");
            $this->connection->exec("SET NAMES utf8");
        } catch (PDOException $e) {
            echo "Greška kod spajanja: " . $e->getMessage();
        }

    }

    private function __clone() { }

    public function getConnection() {
        return $this->connection;
    }
}