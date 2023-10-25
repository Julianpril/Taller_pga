<?php

include __DIR__ . '/../../controller/entityController.php';
include __DIR__ . '/../../controller/database/databasecController.php';
include __DIR__ . '/../../model/docentes.php';
include __DIR__ . '/../../controller/ocupacion/ocupacionController.php';

use eje4\models\docentes\Docentes;
use ejer4\controllers\docente\DocentesController;


$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : '';
$docente = new Docentes();
if ($operacion == 'update') {
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
    <link rel="stylesheet" href="../Styles/aggdocentestyle.css ">
</head>

<body>
    <form class="form" action="procesar_docente.php" method="post">
        <h2 class="form_title">Agregar docente</h2>
        <p class="form_paragraph">Bienvenido</p>
        <div class="form_container">

            <div class="form_group">
                <input type="text" id="name" name="nombre_docente" class="form_input" placeholder="" required>
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
                    $ocupaciones = $ocupacionController->allData();
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