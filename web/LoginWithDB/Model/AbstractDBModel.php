<?php

include_once "../DB/connection.php";
include_once "DBModel.php";

abstract class AbstractDBModel implements DBModel
{

    private $pk;

    private $data;

    function __construct()
    {
        $this->data = new \stdClass();
    }


    public function save()
    {
        $columns = $this->getColumns();


        if (null === $this->pk) {
            $values = array();
            $placeHolders = array();


            foreach ($columns as $column) {
                $values[] = $this->data->$column;
                $placeHolders[] = "?";
            }

            $sql = "INSERT INTO " . $this->getTable() . " (" . implode(", ", $columns)
                . ") VALUES (" . implode(", ", $placeHolders) . ")";
            Database::getInstance()->getConnection()->prepare($sql)->execute($values);
            $this->pk = Database::getInstance()->getConnection()->lastInsertId();
        } else {
            $values = array();
            $placeHolders = array();
            foreach ($columns as $column) {
                $values[] = $this->data->$column;
                $placeHolders[] = $column . " = ?";
            }
            $values[] = $this->pk;
            $sql = "UPDATE " . $this->getTable() . " SET " . implode(", ", $placeHolders)
                . " WHERE " . $this->getPrimaryKeyColumn() . " = ?";
            Database::getInstance()->getConnection()->prepare($sql)->execute($values);
        }

    }

    public function load($pk)
    {
        $query = Database::getInstance()->getConnection()->prepare(
            "SELECT * FROM " . $this->getTable() . " WHERE " . $this->getPrimaryKeyColumn() . "= ?"
        );

        $query->execute(array($pk));
        if (1 !== $query->rowCount()) {
            throw new NotFoundException;
        }

        $this->data = $query->fetch();
        $pkCol = $this->getPrimaryKeyColumn();
        $this->pk = $this->data->$pkCol;

    }

    public function delete()
    {
        if (null === $this->pk) {
            return;
        }
        Database::getInstance()->getConnection()->prepare("DELETE FROM " . $this . $this->getTable() .
            " WHERE " . $this->getPrimaryKeyColumn() . " = ?")->execute(array($this->pk));
        $this->pk = null;
    }

    public function equals(Model $model)
    {
        if (get_class($this) !== get_class($model)) {
            return false;
        }

        return $this->pk === $model->getPrimaryKeyColumn();
    }

    public function serialize()
    {
        return serialize($this->data);
    }

    public function unserialize($string)
    {
        $this->data = unserialize($string);
    }

    public function __get($name)
    {
        return $this->data->$name; //[$name]
    }

    public function __set($name, $value)
    {
        return $this->data->$name = $value;
    }

    public abstract function getPrimaryKeyColumn();

    public abstract function getTable();

    public abstract function getColumns();

}