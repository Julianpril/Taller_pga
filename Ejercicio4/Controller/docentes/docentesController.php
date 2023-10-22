<?php

namespace ejer4\controllers\docente;

include __DIR__ . ('/../ocupacion/ocupacionController.php');

use eje4\controllers\EntityController as ControllersEntityController;
use eje4\controllers\ocupaciones\ocupacionController;
use eje4\models\docentes\Docentes;

class DocentesController extends ControllersEntityController
{

    private $dataTable = 'Docentes';
    function allData()
    {
        $sql = "select * from " . $this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $docente = new Docentes();
                $docente->set('codigo', $item['cod']);
                $docente->set('nombre', $item['nombre']);
                $codOcu = $item['idOcupacion'];
                $ocupacionController = new ocupacionController();
                $ocupacion = $ocupacionController->getItem($codOcu);

                if ($ocupacion !== null) {
                    $nombreDeLaOcupacion = $ocupacion->get('nombre');
                    $docente->set('nombreOcupacion', $nombreDeLaOcupacion);
                } else {
                    echo "no existe";
                }

                array_push($lista, $docente);
            }
        }
        return $lista;
    }

    function getItem($codigo)
    {
        $sql = "select * from " . $this->dataTable . " where codigo=" . $codigo;
        $resultSQL = $this->execSql($sql);
        $docente = null;
        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $docente = new Docentes();
                $docente->set('codigo', $item['cod']);
                $docente->set('nombre', $item['nombre']);
                $codOcu = $item['idOcupacion'];
                $ocupacionController = new ocupacionController();
                $ocupacion = $ocupacionController->getItem($codOcu);

                if ($ocupacion !== null) {
                    $nombreDeLaOcupacion = $ocupacion->get('nombre');
                    $docente->set('nombreOcupacion', $nombreDeLaOcupacion);
                } else {
                    echo "no existe";
                }
                break;
            }
        }
        return $docente;
    }


    function addItem($docente)
    {
        $nombreDocente = $docente->get('nombre');
        $ultimoDocente = $this->allData()[count($this->allData()) - 1];
        $ultimoCodigo = (int)$ultimoDocente->get('cod');
        $nuevoCodigo = $ultimoCodigo + 1;
        $docente = new Docentes();
        $docente->set('cod', $nuevoCodigo);
        $docente->set('nombre', $nombreDocente);
        return "Docente agregado con éxito, ID: $nuevoCodigo";
    }

    function updateItem($docente)
    {
    }

    function deleteItem($codigo)
    {
        $sql = "DELETE FROM " . $this->dataTable . " WHERE cod = $codigo";
        $resultSQL =$this-> execSql($sql);
        if($resultSQL){
            return"Registro eliminado ";
        }
        return"No se pudo eliminar el registro";

    }
}
