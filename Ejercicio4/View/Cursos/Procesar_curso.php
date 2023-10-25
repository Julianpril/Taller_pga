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
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__ . '/../../controller/curso/cursoController.php';
include __DIR__ . '/../../model/cursos.php';

use eje4\controllers\curso\cursoController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombrecurso = $_POST['nombre_curso'];
    $codDocente = $_POST['codDocente'];
    if (empty($nombrecurso)) {
        echo "debe ingresar un dato.";
    } else {
        $cursoController = new cursoController();
         $mensaje = $cursoController->addItem($nombrecurso,$codDocente);
        echo $mensaje;
    }
}

?>

</body>

</html>