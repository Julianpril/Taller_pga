<?php
include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/curso/cursoController.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__ . '/../../controller/database/databasecController.php';

use eje4\controllers\curso\cursoController;


$operacion=$_POST['operacion'];
$resultado = '';
$cursoscontroller = new cursoController();
if($operacion =='delete'){
    $resultado = $cursoscontroller->deleteItem($_POST['codigo']);
}elseif( $resultado = $operacion=='update'){
    $cursoscontroller->updateItem($cursos);
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
    <a href="cursos.php">Ir al inicio</a>
</body>
</html>