<?php
include __DIR__ . '/../Model/curso.php';
include __DIR__ . '/../Controller/entityController.php';
include __DIR__ . '/../Controller/database/databaseController.php';
include __DIR__ . '/../Controller/curso/cursoController.php';


use Ejercicio4\Controller\curso\CursoController;
use Ejercicio4\Model\curso\Curso;

$operacion = $_POST['operacion'];
$resultado = '';
$cursosController= new CursoController();

// if($operacion=='delete'){
//     $resultado = $estudianteController->deleteItem($_POST['codigo']);
// }else{
    $cursos = new Curso();
    $cursos->set('codigo', $_POST['codigo']);
    $cursos->set('nombre', $_POST['nombre']);
    $cursos->set('codDocente', $_POST['codDocente']);
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