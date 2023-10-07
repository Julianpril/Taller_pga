<?php

namespace Pga\Model;

class figurasgeom{
    private $radio;
    private $lado_c;
    private $base;
    private $altura;
    function get($prop){
        return $this->$prop;
    }
    function set ($prop, $value){
        $this->$prop= $value;
    }
}

?>