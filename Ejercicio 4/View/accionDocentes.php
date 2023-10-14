<?php

use Ejercicio4\Controller\docente\DocenteController;
use Ejercicio4\Model\docente\Docente;

include __DIR__ . '/../Model/docente.php';
include __DIR__ . '/../Controller/entityController.php';
include __DIR__ . '/../Controller/database/databaseController.php';
include __DIR__ . '/../Controller/docente/docenteController.php';


$operacion = $_POST['operacion'];
$resultado = '';
$profesoresController= new DocenteController();

// if($operacion=='delete'){
//     $resultado = $estudianteController->deleteItem($_POST['codigo']);
// }else{
    $profes = new Docente();
    $profes->set('codigo', $_POST['codigo']);
    $profes->set('nombre', $_POST['nombre']);
    $profes->set('Ocupacion', $_POST['idOcupacion']);
    $resultado = $operacion=='update'
        ? $estudianteController->updateItem($estudiante)
        : $estudianteController->addItem($estudiante);
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $resultado;
    ?>
    <a href="../index.php">Ir al inicio</a>
</body>
</html>