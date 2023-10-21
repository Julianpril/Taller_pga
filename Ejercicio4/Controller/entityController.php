<?php
namespace Ejercicio4\Controllers;
use Ejercicio4\Controller\database\DatabaseController;

abstract class EntityController{
    public abstract function allData();
    public abstract function getItem($pk);
    public abstract function addItem($model);
    public abstract function upDateItem($model);
    public abstract function deleteItem($item);

    protected function execSql($sql){
        $dbController = new DatabaseController();
        return $dbController->execSql($sql);
    }

}
?>