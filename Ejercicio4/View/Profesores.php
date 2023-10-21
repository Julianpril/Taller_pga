<?php

use Ejercicio4\Controller\docente\DocenteController;

include __DIR__ . '/../Model/docente.php';
include __DIR__ . '/../Controller/entityController.php';
include __DIR__ . '/../Controller/database/databaseController.php';
include __DIR__ . '/../Controller/docente/docenteController.php';


$profeController = new DocenteController();
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
<h1>Lista de Profesores</h1>
    <a href="">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>codigo</th>
                <th>nombre</th>
                <th>Ocupacion</th>
                <th>Cursos</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
        foreach ($lista as $profesores) {
                echo '<tr>';
                echo '  <td>' . $profesores->get('codigo') . '</td>';
                echo '  <td>' . $profesores->get('nombre') . '</td>';
                echo '  <td>' . $profesores->get('ocupacion') . '</td>';
                echo '  <td>'; 
                echo '      <a href="">Ver</a>';
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