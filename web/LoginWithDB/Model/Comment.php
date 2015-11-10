<?php

include_once "AbstractDBModel.php";

class Comment extends AbstractDBModel
{

    public function getPrimaryKeyColumn()
    {
       return "username";
    }

    public function getTable()
    {
        return "komentari";
    }

    public function getColumns()
    {
        return ["username", "comment"];
    }

}