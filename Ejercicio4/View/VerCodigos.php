<?php

use Ejercicio4\Controller\curso\CursoController;

include __DIR__ . '/../Model/curso.php';
include __DIR__ . '/../Controller/entityController.php';
include __DIR__ . '/../Controller/database/databaseController.php';
include __DIR__ . '/../Controller/curso/cursoController.php';


$profeController = new CursoController();
$lista = $profeController->allData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>
<body>
<h1>Lista de Cursos</h1>
    <a href="">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>codigo</th>
                <th>nombre</th>
                <th>cod Docente</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
        foreach ($lista as $curso) {
                echo '<tr>';
                echo '  <td>' . $curso->get('codigo') . '</td>';
                echo '  <td>' . $curso->get('nombre') . '</td>';
                echo '  <td>' . $curso->get('docente') . '</td>';
                echo '  <td>'; 
                // echo '      <a href="views/formularioEstudiante.php?operacion=update&codigo=' . $estudiante->get('codigo') . '">Modificar</a>';
                echo '  </td>';
                echo '  <td>'; 
                // echo '      <a href="views/confirmarEliminacion.php?codigo=' . $estudiante->get('codigo') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>