<?php
namespace Ejercicio4\Model\docente;
class Docente {
    private $codigo;
    private $nombre;
    private $ocupacion;

    function get($prop){
        return $this->$prop;
    }
    function set($prop,$value){
        $this->$prop=$value;
    }
}
?>