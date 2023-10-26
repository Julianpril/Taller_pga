<?php

include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../model/docentes.php';
include __DIR__ . '/../../model/cursos.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__ . '/../../controller/curso/cursoController.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';

use eje4\controllers\curso\cursoController;
use eje4\models\cursos\Cursos;


$operacion = $_GET['operacion'];
$curso = new Cursos();
if ($operacion == 'update') {
    $controlador = new cursoController();
    $curso = $controlador->getItem($_GET['codigo']);
}
if (!isset($curso)) {
    echo '<p>El registro no existe</p>';
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Styles/aggdocentestyle.css ">
</head>

<body>
    <form class="form" action="accion_cursos.php" method="post">
    <input type="hidden" name="operacion" value="<?php echo $operacion; ?>">
        <h2 class="form_title">Agregar curso</h2>
        <p class="form_paragraph">Bienvenido</p>
        <div class="form_container">

            <div class="form_group">
                <input type="hidden" name="codDoc" value="<?php echo $curso->get('codigo'); ?>" <?php echo $operacion == 'update' ? 'readonly' : ''; ?>>
                <input type="text" id="name" name="nombre_curso" class="form_input" placeholder="" required value="<?php echo $curso->get('nombre'); ?>">
                <label for="name" class="form_label">Nombre:</label>
                <span class="form_line"></span>
            </div>
            <div class="from_group">
                Selecciona quien dictará este curso:
                <select name="codDocente" required>
                    <option disabled selected>-Elige una opción-</option>
                    <?php

                    use ejer4\controllers\docente\DocentesController;

                    $docentecontroller = new DocentesController();
                    $docente = $docentecontroller->allData();
                    foreach ($docente as $docentes) {
                        echo "<option value='" . $codDocen = $docentes->get('codigo') . "'>" . $docentes->get('nombre') . "</option>";
                    }
                    ?>
                </select>
            </div>

            <input type="submit" class="form_submit" value="Enviar">
        </div>
    </form>
</body>

</html>