<?php

namespace eje4\controllers\curso;
use eje4\controllers\EntityController as ControllersEntityController;
use eje4\models\cursos\Cursos;
use ejer4\controllers\docente\DocentesController;

class cursoController extends ControllersEntityController
{

    private $dataTable = 'Cursos';
    function allData()
    {
        $sql = "select * from " . $this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista = [];

        if ($resultSQL->num_rows > 0) {
            while ($item = $resultSQL->fetch_assoc()) {
                $curso = new Cursos();
                $curso->set('codigo', $item['cod']);
                $curso->set('nombre', $item['nombre']);
                $codDoc = $item['codDocente'];
                $docentecontroller = new DocentesController();
                $docentes = $docentecontroller->getItem($codDoc);

                if ($docentes !== null) {
                    $nombredelDocente = $docentes->get('nombre');
                    $curso->set('codDocente', $nombredelDocente);
                } else {
                    echo "no existe";
                }

                array_push($lista, $curso);
            }
        }
        return $lista;
    }


    function getItem($codigo)
    {
        $sql = "select * from " . $this->dataTable . " where cod = '. $codigo .'";
        $resultSQL = $this->execSql($sql);
        $curso = null;

        if ($resultSQL->num_rows > 0) {
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
                    echo "Docente no encontrado.";
                }
                break;
            }
        }
        return $curso;
    }


    function addItem($curso, $pk)
    {
    }
    function  updateItem($curso)
    {
    }
    function deleteItem($codigo)
    {
    }
}
