<?php
require_once __DIR__.'/../Controller/Notas/NotasController.php';


use Controller\Notas\NotasController\NotasController;
$materia = new NotasController();


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio3</title>
</head>
<body>
    <form action="#" method="post" name="formulario">
        <h1>Calculador de promedio de una materia</h1>
        <div>
            <label>Nombre de la materia:</label>
            <input type="text" name="materia" required>
        </div>
        <div>
            <label>Rango máximo de Calificación:</label>
            <input type="number" name="max_califi" step="0.1" required>
        </div>
        <div>
            <label>Rango mínimo de Calificación:</label>
            <input type="number" name="min_califi" step="0.1" required>
        </div>
        <div>
            <label>Ingrese la cantidad de notas:</label>
            <input type="number" name="cantidad_notas" min="1" required>
        </div>
        <input type="submit" name="submit" value="Generar">
    </form>
    
    <?php
        $materia->numeroNotas();
        if(isset($_POST['submit'])) {
            $materia->promedioNotas();
        }
    ?> 
</body>
</html>