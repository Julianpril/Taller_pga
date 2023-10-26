<?php
include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../model/docentes.php';
use eje4\controllers\ocupaciones\ocupacionController;
use eje4\models\docentes\Docentes;
use ejer4\controllers\docente\DocentesController;

$operacion = $_POST['operacion'];
$resultado = '';
$docentescontroller = new DocentesController();
if ($operacion == 'delete') {
    $resultado = $docentescontroller->deleteItem($_POST['codigo']);
} else {
    $docente = new Docentes();
    $docente->set('codigo', $_POST['codDoc']);
    $docente->set('nombre', $_POST['nombre_docente']);
    $docente->set('idOcupacion', $_POST['idOcupacion']);
    $ocupacionController = new ocupacionController();
    $ocupacion = $ocupacionController->getItem($_POST['idOcupacion']);
    $resultado = $operacion == 'update'
        ? $docentescontroller->updateItem($docente, $_POST['idOcupacion'])
        : $docentescontroller->addItem($docente, $_POST['idOcupacion']);
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