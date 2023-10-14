<?php
require_once '/xampp/htdocs/Taller_pga/Controller/FigurasGeometricas/FigurasGeoController.php';

use Controller\FigurasGeometricas\FigurasGeoController\TrianguloController;
use Controller\FigurasGeometricas\FigurasGeoController\CirculoController;
use Controller\FigurasGeometricas\FigurasGeoController\CuadradoController;
use Controller\FigurasGeometricas\FigurasGeoController\RectanguloController;

$trianguloController = new TrianguloController();
$circuloController = new CirculoController();
$cuadradoController = new CuadradoController();
$rectanguloController = new RectanguloController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['base']) && isset($_POST['altura'])) {
        $base = floatval($_POST['base']);
        $altura = floatval($_POST['altura']);
        $resultado = $trianguloController->calcularArea($base, $altura);
    } elseif (isset($_POST['radio'])) {
        $radio = floatval($_POST['radio']);
        $resultado = $circuloController->calcularArea($radio);
    } elseif (isset($_POST['lado'])) {
        $lado = floatval($_POST['lado']);
        $resultado = $cuadradoController->calcularArea($lado);
    } elseif (isset($_POST['base_rect']) && isset($_POST['altura_rect'])) {
        $base = floatval($_POST['base_rect']);
        $altura = floatval($_POST['altura_rect']);
        $resultado = $rectanguloController->calcularArea($base, $altura);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ejercicio2.css">
</head>

<body>
    <h1 class="titulo">Calcular el area de las figuras geometricas.</h1>
    <a href="../index.php" class="eje">Volver</a>
    <main class="main">
        <div class="container">
            <h2 class="title">Triángulo</h2>
            <div class="triangulo-bottom"></div>
            <div class="container-figu">
                <?php
                $trianguloController->mostrarFormulario();
                if (isset($resultado) && isset($_POST['base']) && isset($_POST['altura'])) {
                    echo "Área del triángulo: $resultado";
                }
                ?>
            </div>
        </div>
        <div class="container">
            <h2 class="title">Circulo</h2>
            <div class="circulo-bottom"></div>
            <div class="container-figu">
                <?php
                $circuloController->mostrarFormulario();
                if (isset($resultado) && isset($_POST['radio'])) {
                    echo "Área del círculo: $resultado";
                }
                ?>
            </div>
        </div>
        <div class="container">
            <h2 class="title">Cuadrado</h2>
            <div class="cuadrado-bottom"></div>
            <div class="container-figu">
                <?php
                $cuadradoController->mostrarFormulario();

                if (isset($resultado) && isset($_POST['lado'])) {
                    echo "Área del Cuadrado: $resultado";
                }
                ?>
            </div>
        </div>
        <div class="container">
            <h2 class="title">Rectángulo</h2>
            <div class="rectangulo-bottom"></div>
            <div class="container-figu">
                <?php
                $rectanguloController->mostrarFormulario();

                if (isset($resultado) && isset($_POST['base_rect']) && isset($_POST['altura_rect'])) {
                    echo "Área del Rectángulo: $resultado";
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>