<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php

use eje4\controllers\docente\DocentesController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreDocente = $_POST['nombre_docente'];
    if (empty($nombreDocente)) {
        echo "El nombre del docente no puede estar vacío.";
    } else {
        $docentesController = new DocentesController();
         $mensaje = $docentesController->addItem($nombreDocente);
        echo $mensaje;
    }
}

?>

</body>

</html>