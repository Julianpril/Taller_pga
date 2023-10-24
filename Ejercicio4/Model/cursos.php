<?php
namespace eje4\models\cursos;

class Cursos{
    private $codigo;
    private $nombre;
    private $codDocente;

    function get($prop){
        return $this->$prop;
    }

    function set($prop, $value){
        $this->$prop = $value;
    }
}
?>