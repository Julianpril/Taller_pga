<?php

namespace eje4\models;

class Ocupacion{
    private $id;
    private $nombre;
    
    function get($prop){
        return $this->$prop;
    }

    function set($prop, $value){
        $this->$prop = $value;
    }
}
?>