<?php

interface Model extends \Serializable {

    public function equals(Model $model);

    public function getPrimaryKeyColumn();
}