<?php
namespace Ejercicio4\Model\ocupacion;
class Ocupacion{
    private $codigo;
    private $nombre;

    function get($prop){
        return $this->$prop;
    }
    function set($prop,$value){
        $this->$prop=$value;
    }
}
?>