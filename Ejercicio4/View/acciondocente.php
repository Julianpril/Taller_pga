<?php
include __DIR__ . '/../model/Docentes.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
use eje4\models\docentes\Docentes;
use ejer4\controllers\docente\DocentesController;

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : '';
$resultado = '';
$docentecontroller = new DocentesController();

if($operacion=='delete'){
    $resultado = $docentecontroller-> deleteItem($_POST['codigo']);
}else{
    $docente = new Docentes();
    $docente->set('codigo',$_POST['cod']);
    $docente->set('nombre', $_POST['nombre']);
    $docente->set('ocupacion', $_POST['idOcupacion']);
    $resultado = $operacion=='update'
        ? $docentecontroller->updateItem($docente)
        : $docentecontroller->addItem($docente);
}
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
    <a href="docentes.php">Ir al inicio</a>
</body>
</html>