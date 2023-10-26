<?php
include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__. '/../../model/docentes.php';
use ejer4\controllers\docente\DocentesController;
$docentesController = new DocentesController();
$lista = $docentesController->allData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/docentes.css">
    <title>Document</title>
</head>
<body>
    <h1 class="main-heading">Lista de docentes</h1>
    <a class="action-link" href="aggElemento.php">Registrar</a>
    <a class="action-link" href="../Cursos/cursos.php">Todos los cursos</a>
    <table class="data-table">
        <thead>
            <tr>
                <th class="table-header">Código</th>
                <th class="table-header">Nombre</th>
                <th class="table-header">Ocupación</th>
                <th class="table-header">Cursos</th>
                <th class="table-header"></th>
                <th class="table-header"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista as $docente) {
                echo '<tr>';
                echo '  <td class="table-cell">' . $docente->get('codigo') . '</td>';
                echo '  <td class="table-cell">' . $docente->get('nombre') . '</td>';
                echo '  <td class="table-cell">' . $docente->get('nombreOcupacion') . '</td>';
                echo '  <td class="table-cell">';
                echo '      <a class="action-links" href="verSusCursos.php?operacion=view&codDocente=' . $docente->get('codigo') . '">ver</a>';
                echo '  </td>';
                echo '  <td class="table-cell">';
                echo '      <a class="action-links" href="updateDocente.php?operacion=update&codigo=' . $docente->get('codigo') . '">Modificar</a>';
                echo '  </td>';
                echo '  <td class="table-cell">';
                echo '      <a class="action-links" href="confirmarEliminacion.php?codigo=' . $docente->get('codigo') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>
</body>
</html>
