<?php

use eje4\models\docentes\Docentes;
use ejer4\controllers\docente\DocentesController;

include __DIR__ . '/../model/docentes.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';

$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : '';
$docente = new Docentes();
if($operacion=='update'){
    $controlador = new DocentesController();
    $docente = $controlador->getItem($_GET['cod']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Styles/aggdocentestyle.css ">
</head>

<body>
    <form class="form" action="acciondocente.php" method="post">
        <input type="hidden" name="operacion" value="<?php echo $operacion; ?>">
        <h2 class="form_title">Agregar docente</h2>
        <p class="form_paragraph">Bienvenido<br>si no esta tu ocupacion <a href="#" class="form_link">Entra aqui</a></p>
        <div class="form_container">

            <div class="form_group">
                <input type="text" id="name" class="form_input" placeholder=" " value="<?php echo $docente->get('nombre'); ?>">
                <label for="name" class="form_label">Nombre:</label>
                <span class="form_line"></span>
            </div>
            <div class="from_group">
                Selecciona la opción deseada de ocupacion:
                <select>
                    <option disabled selected>-Elige una opción-</option>
                    <?php
                    use eje4\controllers\ocupaciones\ocupacionController;

                    $ocupaciocontroller = new ocupacionController();
                    $ocupacion = $ocupaciocontroller->allData();
                    foreach ($ocupacion as $ocupacion) {
                        echo "<option value='" . $ocupacion->get('id') . "'>" . $ocupacion->get('nombre') . "</option>";
                    }
                    ?>
                </select>
            </div>

            <input type="submit" class="form_submit" value="Enviar">
        </div>
    </form>
</body>

</html>