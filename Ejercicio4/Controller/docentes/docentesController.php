<?php

namespace ejer4\controllers\docente;

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
        $sql = "select * from " . $this->dataTable . " where cod=" . $codigo;
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

    function addItem($docente, $idOcupacion)
    {
        $sql = "SELECT MAX(cod) AS ultimo_id FROM " .$this->dataTable;
        $result = $this->execSql($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $ultimoID = $row["ultimo_id"];
            $nuevoCodigo= $ultimoID + 1;
        }   
        $sql = "INSERT INTO docentes (cod,nombre, idOcupacion) VALUES ('$nuevoCodigo','$docente', $idOcupacion)";
        echo '<a href="docentes.php">Volver</a><br>';
        $resultSQL = $this->execSql($sql);
        if ($resultSQL) {
            return "Docente agregado con éxito <br>bienvenido profe: " . $docente;
        } else {
            return "Error al agregar docente";
        }
    }

    function updateItem($docente)
    {
    }

    function deleteItem($codigo)
    {
        $sql = "DELETE FROM docentes WHERE cod = $codigo";
        $resultSQL = $this->execSql($sql);
        if ($resultSQL) {
            return "Docente eliminado con éxito";
        } else {
            return "Error al eliminar docente";
        }
    }
}
