<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 27/10/15
 * Time: 11:53
 */

include_once "Model.php";

interface DBModel extends Model{

    public function save();

    public function load($pk);

    public function delete();

}