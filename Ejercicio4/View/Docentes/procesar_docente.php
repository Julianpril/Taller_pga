<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__ . '/../../model/docentes.php';
use ejer4\controllers\docente\DocentesController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreDocente = $_POST['nombre_docente'];
    $idOcupacion = $_POST['idOcupacion'];
    if (empty($nombreDocente)) {
        echo "debe ingresar un dato.";
    } else {
        $docentesController = new DocentesController();
         $mensaje = $docentesController->addItem($nombreDocente,$idOcupacion);
        echo $mensaje;
    }
}

?>

</body>

</html>