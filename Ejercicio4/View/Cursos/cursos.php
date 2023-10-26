<?php
include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__. '/../../model/docentes.php';
include __DIR__ . '/../../controller/curso/cursoController.php';
include __DIR__. '/../../model/cursos.php';
use eje4\controllers\curso\cursoController;
$cursoController = new cursoController();
$lista = $cursoController->allData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/docentes.css">
    <title>Lista de Cursos</title>
</head>
<body>
    <h1 class="main-heading">Lista de Cursos</h1>
    <a class="action-link" href="../Docentes/docentes.php">Volver</a>
    <table class="data-table">
        <thead>
            <tr>
                <th class="table-header">Código</th>
                <th class="table-header">Nombre</th>
                <th class="table-header">Docente</th>
                <th class="table-header"></th>
                <th class="table-header"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($lista as $curso){
                echo '<tr>';
                echo '  <td class="table-cell">' . $curso->get('codigo') . '</td>';
                echo '  <td class="table-cell">' . $curso->get('nombre') . '</td>';
                echo '  <td class="table-cell">' . $curso->get('codDocente') . '</td>';
                echo '  <td class="table-cell">';
                echo '      <a class="action-links" href="updateCursos.php?operacion=update&codigo=' . $curso->get('codigo') . '">Modificar</a>';
                echo '  </td>';
                echo '  <td class="table-cell">';
                echo '      <a class="action-links" href="confirmarEliminacioncursos.php?codigo=' . $curso->get('codigo') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
