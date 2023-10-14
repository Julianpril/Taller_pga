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
        return $docente;
    }
    function addItem($docente){
        $codigo= $docente->get('codigo');
        $nombre= $docente->get('nombre');
        $ocupacion= $docente->get('ocupacion');
        $registro = $this->getItem($codigo);
        if(isset($registro)){
            return "El codigo del docente ya existe";
        }
        $sql="insert into ".$this->dataTable. "(codigo , nombre, ocupacion) values ('$codigo','$nombre','$ocupacion')";
        $resulSQL =$this-> execSql($sql);
        if(!$resulSQL){
            return "Docente no agregado";
        }
        return "se guardo el docente con exito";
    }
    function upDateItem($docente)
    {
        $codigo= $docente->get('codigo');
        $nombre= $docente->get('nombre');
        $ocupacion= $docente->get('ocupacion');
        $registro =$this->getItem($codigo);
        if(!isset($registro)){
            return "El registro no existe";
        }
        $sql="update " .$this->dataTable."set ";
        $sql .= "nombre='$nombre',";
        $sql .= "ocupación='' ";
        $sql .= " where codigo=$codigo";
        $resultSQL = $this->execSql($sql);
        if(!$resultSQL){
            return "no se guardo";
        }
        return "se guardo con exito";
    }
    
    function deleteItem($codigo)
    {
        $sql = "delete from ".$this->dataTable;
        $sql.=" where codigo= $codigo";
        $resultSQL= $this->execSql($sql);
        if($resultSQL){
            return "Registro eliminado exitosamente";
        }
        return "No se pudo eliminar el registro ";
    }
}
?>