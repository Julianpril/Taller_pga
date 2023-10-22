<?php
namespace eje4\controllers;

use eje4\controllers\database\DatabaseController;

abstract class EntityController{
   public abstract function allData();
   public abstract function getItem($pk);
   public abstract function addItem($model);
   public abstract function updateItem($model);
   public abstract function deleteItem($pk);

   protected function execSql($sql){
       $dbController = new DatabaseController();
       return $dbController->execSql($sql);
   }
}

?>