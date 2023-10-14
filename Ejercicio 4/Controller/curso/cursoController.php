<?php
namespace Ejercicio4\Controller\curso;
use Ejercicio4\Model\curso\Curso;
use Ejercicio4\Controllers\EntityController;

class CursoController extends EntityController{
    private $dataTable='cursos';
    function allData(){
        $sql = "select * from ".$this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista = [];
        if($resultSQL->num_rows >0){
            while($item = $resultSQL->fetch_assoc()){
                $cursos = new Curso();
                $cursos->set('codigo', $item['cod']);
                $cursos->set('nombre', $item['nombre']);
                $cursos->set('codDocente', $item['codDocente']);
                array_push($lista, $cursos);
            }
        }
        return $lista;
    }

    function getItem($codigo){
    }

    function addItem($curso){
    }

    function updateItem($curso){
    }

    function deleteItem($codigo){
    }
}

?>