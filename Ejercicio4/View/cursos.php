<?php
include __DIR__ . '/../model/cursos.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../controller/curso/cursoController.php';
include __DIR__ . '/docentes.php';
use eje4\controllers\curso\cursoController;
$cursoController = new cursoController();
$lista = $cursoController->allData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
</head>
<body>
    <h1>Lista de Cursos</h1>
    <a href="">Registrar</a>
    <a href="docentes.php">Volver</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Docente</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($lista as $curso){
                echo '<tr>';
                echo '<td>' . $curso->get('cod') . '</td>';
                echo '<td>' . $curso->get('nombre') . '</td>';
                echo '<td>' . $curso->get('codDocente') . '</td>';
                echo '  <td>';
                echo '      <a href="views/formularioEstudiante.php?operacion=update&codigo=' . $curso->get('codigo') . '">Modificar</a>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="confirmarEliminacion.php?codigo=' . $curso->get('codigo') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
