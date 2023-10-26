<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../Styles/ConfirEli.css">
</head>

<body>
    <?php
    use ejer4\controllers\docente\DocentesController;

    include __DIR__ . '/../../controller/entityController.php';
    include __DIR__ . '/../../controller/database/databasecController.php';
    include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';
    include __DIR__ . '/../../controller/docentes/docentesController.php';
    include __DIR__ . '/../../model/docentes.php';
    $docentesController = new DocentesController();
    $docente_id = $_GET['codigo'];
    $hasCourses = $docentesController->cursoasociado($docente_id);
    ?>

    <form action="accion_Docente.php" method="post">
        <div class="container">
            <h1 class="form_title">Confirmar operación</h1>
            <?php
            if ($hasCourses) {
                echo '<p class="form_paragraph">No se puede eliminar, ya que tiene cursos asociados.</p>';
                echo '<a href="docentes.php" class="form_submitno">Volver</a>';
            } else {
                echo '<p class="form_paragraph">¿Desea eliminar el registro?</p>';
                echo '<input type="hidden" name="codigo" value="' . $docente_id . '">';
                echo '<input type="hidden" name="operacion" value="delete">';
                echo '<button type="submit" class="form_submit">Sí</button>';
                echo '<a href="docentes.php" class="form_submitno">No</a>';
            }
            ?>
        </div>
    </form>
</body>

</html>
