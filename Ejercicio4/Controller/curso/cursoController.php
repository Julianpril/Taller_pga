<?php
namespace eje4\controllers\curso;
    
include __DIR__ . ('/../docentes/docentesController.php');

  use eje4\controllers\EntityController as ControllersEntityController;
  use ejer4\controllers\docente\DocentesController;
  use eje4\models\cursos\Cursos;

  class cursoController extends ControllersEntityController{
     
    private $dataTable = 'Cursos';
    function allData()
    {
        $sql ="select *from " . $this->dataTable;
        $resultSQL = $this->execSql($sql);
        $lista =[];
        if($resultSQL->num_rows >0){
            while ($item=$resultSQL->fetch_assoc()) {
                $curso = new Cursos();
                $curso->set('codigoC',$item['cod']);
                $curso-> set ('nombreC',$item['nombre']);
                $codDocente = $item['codDocente'];
                $docenteController = new DocentesController();
                $docente = $docenteController -> getItem($codDocente);
                if($docente !== null){
                    $nombreDocente = $docente->get('nombre');
                    $docente->set('nombreDocente',$nombreDocente);
                }else{
                    echo "no existe docente";
                }

                array_push($lista,$curso);
            }
        }
        return $lista;
    }

    function getItem($codigo)
    {
        $sql = "select * from " . $this->dataTable . " where codigo=" . $codigo;
        $resultSQL = $this->execSql($sql);
        $curso = null;
        if($resultSQL->num_rows >0){
            while ($item = $resultSQL->fetch_assoc()){
                $curso=new Cursos();
                $curso->set('codigoC',$item['cod']);
                $curso->set('nombreC',$item['nombre']);
                $codDocente =$item['codDocente'];
                $docenteController = new DocentesController();
                $docente = $docenteController->getItem($codDocente);
                if($docente !==null){
                    $nombreDocente = $docente->get('nombre');
                    $docente->set('nombreDocente',$nombreDocente);
                }else{
                    echo"No hay docente";
                }
                break;
            }
        }
        return $curso;
    }
    function addItem($curso)
    {
     $nombreCurso = $curso->get('nombre');
     $ultimoCurso =$this->allData()[count($this->allData()) - 1];
     $ultimoCodigo =(int)$ultimoCurso->get('cod');
     $nuevoCodigo = $ultimoCodigo + 1 ;
     $curso->set('codigoC',$nuevoCodigo);
     $curso->set('nombre',$nombreCurso);
        return "Curso agregado con existo, ID: $nuevoCodigo";
    }
    function  updateItem($curso)
    {
        
    }
    function deleteItem($codigo){

    }

  }


?>