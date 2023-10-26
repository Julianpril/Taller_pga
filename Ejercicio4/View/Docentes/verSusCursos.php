<?php
include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__ . '/../../model/docentes.php';
include __DIR__ . '/../../model/cursos.php';
include __DIR__ . '/../../controller/curso/cursoController.php';

use eje4\controllers\curso\cursoController;
use eje4\models\cursos\Cursos;
$cursos = new Cursos();
$operacion = $_GET['operacion'];
if ($operacion == 'view') {
    $controlador = new cursoController();
    $cursos = $controlador->getCursosByDocenteId($_GET['codDocente']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/docentes.css">
    <title>Cursos del Docente</title>
</head>

<body>
    <h1 class="main-heading">Cursos del Docente</h1>
    <a class="action-link" href="docentes.php">Volver</a>
    <table class="data-table">
        <thead>
            <tr>
                <th class="table-header">Código</th>
                <th class="table-header">Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cursos as $curso) {
                echo '<tr>';
                echo '  <td class="table-cell">' . $curso->get('codigo') . '</td>'; // Use 'codigo' property
                echo '  <td class="table-cell">' . $curso->get('nombre') . '</td>'; // Use 'nombre' property
                echo '</tr>';
            }
            ?>
        </tbody>

    </table>
</body>

</html>