<?php
include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../../controller/docentes/docentesController.php';
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../model/docentes.php';

use eje4\models\docentes\Docentes;
use ejer4\controllers\docente\DocentesController;

$operacion = $_GET['operacion'];
$docente = new Docentes();
if ($operacion == 'update') {
    $controlador = new DocentesController();
    $docente = $controlador->getItem($_GET['codigo']);
}
if (!isset($docente)) {
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
    <form class="form" action="accion_Docente.php" method="post">
        <input type="hidden" name="operacion" value="<?php echo $operacion; ?>">
        <h2 class="form_title">Agregar docente</h2>
        <p class="form_paragraph">Bienvenido</p>
        <div class="form_container">
            <div class="form_group">
                <input type="hidden" name="codDoc" value="<?php echo $docente->get('codigo'); ?>" <?php echo $operacion == 'update' ? 'readonly' : ''; ?>>
                <input type="text" id="name" name="nombre_docente" class="form_input" placeholder="" required value="<?php echo $docente->get('nombre'); ?>">
                <label for="name" class="form_label">Nombre:</label>
                <span class="form_line"></span>
            </div>
            <div class="from_group">
                Selecciona la opción deseada de ocupacion:
                <select name="idOcupacion" required>
                    <option disabled selected>-Elige una opción-</option>
                    <?php

                    use eje4\controllers\ocupaciones\ocupacionController;

                    $ocupacionController = new ocupacionController();
                    $ocupaciones = $ocupacionController->allData($docente);
                    foreach ($ocupaciones as $ocupacion) {
                        echo "<option value='" . $idocu = $ocupacion->get('codigo') . "'>" . $ocupacion->get('nombre') . "</option>";
                    }
                    ?>
                </select>
            </div>

            <input type="submit" class="form_submit" value="Enviar">
        </div>
    </form>
</body>

</html>