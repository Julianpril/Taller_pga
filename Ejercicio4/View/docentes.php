<?php
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__. '/../model/docentes.php';
use ejer4\controllers\docente\DocentesController;
$docentesController = new DocentesController();
$lista = $docentesController->allData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de docentes</h1>
    <a href="aggElemento.php">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Ocupación</th>
                <th>Cursos</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista as $docentes) {
                echo '<tr>';
                echo '  <td>' . $docentes->get('codigo') . '</td>';
                echo '  <td>' . $docentes->get('nombre') . '</td>';
                echo '  <td>' . $docentes->get('nombreOcupacion') . '</td>';
                echo '  <td>';
                echo '      <a href="views/formularioEstudiante.php?operacion=update&codigo=' . $docentes->get('codigo') . '">Modificar</a>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="confirmarEliminacion.php?codigo=' . $docentes->get('codigo') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>

</body>

</html>