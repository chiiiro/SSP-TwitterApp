<?php

/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 23/10/15
 * Time: 13:27
 */

include_once "AbstractDBModel.php";

class Person extends AbstractDBModel {

    public function getPrimaryKeyColumn()
    {
        return "username";
    }

    public function getTable()
    {
        return "korisnici";
    }

    public function getColumns()
    {
        return ["username", "password"];
    }

}