<?php

namespace eje4\controllers\curso;

use eje4\controllers\EntityController as ControllersEntityController;
use eje4\models\cursos\Cursos;
use ejer4\controllers\docente\DocentesController;

class cursoController extends ControllersEntityController
{

    private $dataTable = 'cursos';
    function allData()
    {
        $sql = "select * from " . $this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if ($resultSQL !== false && $resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $curso = new Cursos();
                $curso->set('codigo', $item['cod']);
                $curso->set('nombre', $item['nombre']);
                $codDoc = $item['codDocente'];
                $docenteController = new DocentesController();
                $docentes = $docenteController->getItem($codDoc);

                if ($docentes !== null) {
                    $nombredelDocente = $docentes->get('nombre');
                    $curso->set('codDocente', $nombredelDocente);
                } else {
                }

                array_push($lista, $curso);
            }
        }
        return $lista;
    }

    function getItem($codigo)
    {
        $sql = "select * from " . $this->dataTable . " where cod = $codigo";
        $resultSQL = $this->execSql($sql);
        $curso = null;

        if ($resultSQL !== false && $resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $curso = new Cursos();
                $curso->set('codigo', $item['cod']);
                $curso->set('nombre', $item['nombre']);
                $codDoc = $item['codDocente'];
                $docenteController = new DocentesController();
                $docente = $docenteController->getItem($codDoc);

                if ($docente !== null) {
                    $nombreDelDocente = $docente->get('nombre');
                    $curso->set('codDocente', $nombreDelDocente);
                } else {
                }
                break;
            }
        }
        return $curso;
    }



    function addItem($nombrecurso,$codDocente)
    {
        $sql = "SELECT MAX(cod) AS ultimo_id FROM " .$this->dataTable;
        $result = $this->execSql($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $ultimoID = $row["ultimo_id"];
            $nuevoCodigo= $ultimoID + 1;
        }   
        $sql = "INSERT INTO " .$this->dataTable ." (cod,nombre, codDocente) VALUES ('$nuevoCodigo','$nombrecurso','$codDocente')";
        echo '<a href="../../View/Cursos/cursos.php">Volver</a><br>';
        echo $sql;
        $resultSQL = $this->execSql($sql);
        if ($resultSQL) {
            return "curso agregado: " . $nombrecurso;
        } else {
            return "Error al agregar";
        }
    }
    function  updateItem($curso)
    {
    }
    function deleteItem($codigo)
    {
        $sql = "DELETE FROM cursos WHERE `cursos`.`cod` = '$codigo'";
        $resultSQL = $this->execSql($sql);
        if ($resultSQL) {
            return "curso eliminado con éxito";
        } else {
            return "Error al eliminar el curso";
        }
    }
}
