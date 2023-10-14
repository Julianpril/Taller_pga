<?php
namespace Ejercicio4\Controller\docente;
use Ejercicio4\Model\docente\Docente;
use Ejercicio4\Controllers\EntityController;


class DocenteController extends EntityController{
    private $dataTable = 'docentes';

    function allData()
    {
        $sql = "select * from " . $this->dataTable;
      $resulSQL = $this->execSql($sql);
        $listadocente = [];
        if($resulSQL->num_rows>0){
            while($item =$resulSQL->fetch_assoc()){
                $docente = new Docente();
                $docente-> set('codigo',$item['codigo']);
                $docente->set('nombre', $item['nombre']);
                $docente->set('ocupacion', $item['ocupacion']);
                array_push($listadocente, $docente);
            }
        }
        return $listadocente;
    }
    function getItem($codigo){
        $sql = "select * from " .$this->dataTable." where codigo=".$codigo;
        $resulSQL = $this->execSql($sql);
        $docente =null;
        if($resulSQL->num_rows>0){
            while ($item = $resulSQL->fetch_assoc()){
                $docente=new Docente();
                $docente-> set('codigo',$item['codigo']);
                $docente->set('nombre', $item['nombre']);
                $docente->set('ocupacion', $item['ocupacion']);
                break;
            }
        }

    }
}
?>