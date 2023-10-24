<?php
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../controller/database/databasecController.php';
use ejer4\controllers\docente\DocentesController;


$operacion=$_POST['operacion'];
$resultado = '';
$docentescontroller = new DocentesController();
if($operacion =='delete'){
    $resultado = $docentescontroller->deleteItem($_POST['codigo']);
}elseif( $resultado = $operacion=='update'){
    $estudianteController->updateItem($estudiante);
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