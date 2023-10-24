<?php
include __DIR__ . '/../Model/cursos.php';
include __DIR__ . '/../Controller/entityController.php';
include __DIR__ . '/../Controller/database/databasecController.php';
include __DIR__ . '/../Controller/curso/cursoController.php';

use eje4\controllers\curso\cursoController;
$cursoController = new cursoController();
$lista = $cursoController->allData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>os 
<body>
    <h1>Lista Cursos</h1>
    <table>
        <thead>
            <tr>
                <th>codigo</th>
                <th>Nombre</th>
                <th>Docente</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($lista as $cursos){
                echo'<tr>';
                echo'<td>' . $cursos->get('codigo') . '</td>';
                echo'<td>' . $cursos->get('nombre') . '</td>';
                echo'<td>' . $cursos->get('nombreDocente') . '</td>';

            } ?>
        </tbody>
    </table>
</body>
</html>