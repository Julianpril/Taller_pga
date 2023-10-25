<?php

namespace eje4\controllers\ocupaciones;

include __DIR__ . ('/../../model/ocupacion.php');

use eje4\controllers\EntityController;
use eje4\models\Ocupacion;

class ocupacionController extends EntityController
{

    private $dataTable = 'ocupaciones';
    function allData()
    {
        $sql = "select * from " . $this->dataTable;
        $resultSQL = $this->execSql($sql);
        $ocupaciones = [];

        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $ocupacion = new Ocupacion();
                $ocupacion->set('codigo', $item['id']);
                $ocupacion->set('nombre', $item['nombre']);
                $ocupaciones[] = $ocupacion;
            }
        }   

        return $ocupaciones;
    }

    function getItem($codigo)
    {
        $sql = "select * from " . $this->dataTable . " where id=" . $codigo;
        $resultSQL = $this->execSql($sql);
        $ocupacion = null;
        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $ocupacion = new Ocupacion();
                $ocupacion->set('codigo', $item['id']);
                $ocupacion->set('nombre', $item['nombre']);
                break;
            }
        }
        return $ocupacion;
    }

    function addItem($ocupacion,$pk)
    {
    }

    function updateItem($ocupacion,$pk)
    {
    }

    function deleteItem($codigo)
    {
    }
}
