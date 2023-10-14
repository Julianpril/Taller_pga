<?php
namespace Ejercicio4\Model\curso;
class Curso{
    private $codigo;
    private $nombre;
    private $docente;
    function get($prop){
        return $this->$prop;
    }
    function set($prop,$value){
        $this->$prop=$value;
    }
}
?>