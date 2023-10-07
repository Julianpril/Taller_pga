<?php
namespace Pga\Controller\FigurasGeometricas;
use Pga\Model\figurasgeom;

class FigurasGeoController {
    
    function triangulo(){
        if (isset($_POST['base']) && isset($_POST['altura'])) {
            $base = floatval($_POST['base']);
            $altura = floatval($_POST['altura']);

            $figurasgeo = new FigurasGeom();
            $figurasgeo->set('base', $base);
            $figurasgeo->set('altura', $altura);
            $operacion = ($figurasgeo->get('base') * $figurasgeo->get('altura')) / 2;
            return $operacion;
        } else {
            return "Error: 'base' or 'altura' is not set in the POST data.";
        }
    }
}

?>