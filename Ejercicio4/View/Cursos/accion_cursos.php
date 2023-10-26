<?php
include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../model/docentes.php';
include __DIR__ . '/../../model/cursos.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__ . '/../../controller/curso/cursoController.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';
use eje4\controllers\curso\cursoController;
use eje4\models\cursos\Cursos;

$operacion=$_POST['operacion'];
$resultado = '';
$cursoscontroller = new cursoController();
$curso = new Cursos();
if($operacion =='delete'){
    $resultado = $cursoscontroller->deleteItem($_POST['codigo']);
}else{
    $curso->set('codigo', $_POST['codDoc']);
    $curso->set('nombre', $_POST['nombre_curso']);
    $cursoscontroller->updateItem($curso,$_POST['codDocente']);
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