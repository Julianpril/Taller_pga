<?php
include __DIR__ . '/../Model/Figurasgeo.php';
include __DIR__ . '/../Controller/FigurasGeometricas/FigurasGeoController.php';
use Pga\Controller\FigurasGeometricas\FigurasGeoController;

$figurascontroller = new FigurasGeoController();
$operacion = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['triangulo'])) {
        $operacion = $figurascontroller->triangulo();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>

<body>
<form class="main" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="container">
            <div class="main_img"></div>
            <section class="main_preview">
                <div class="main_content">
                    <h2 class="tittle">Triangulo</h2>
                    <label for="base">Base (m):</label>
                    <input type="number" name="base" step="0.1" required>
                    <label for="altura">Altura (m):</label>
                    <input type="number" name="altura" step="0.1" required>
                    <input type="submit" name="triangulo" value="Operar">
                    <p><?php echo $operacion; ?></p>
                </div>
            </section>
        </div>
        <div class="container">
            <div class="main_img"></div>
            <section class="main_preview">
                <div class="main_content">
                    <h2 class="tittle">circulo</h2>
                    <label for="lado">radio(m):</label>
                    <input type="number" name="lado" step="0.1" require>
                    <button type="submit">operar</button>
                </div>
            </section>
        </div>
        <div class="container">
            <div class="main_img"></div>
            <section class="main_preview">
                <div class="main_content">
                    <h2 class="tittle">cuadrado</h2>
                    <label for="lado">lado(m):</label>
                    <input type="number" name="lado" step="0.1" require>
                    <button type="submit">operar</button>
                </div>
            </section>
        </div>
        <div class="container">
            <div class="main_img"></div>
            <section class="main_preview">
                <div class="main_content">
                    <h2 class="tittle">rectangulo</h2>
                    <label for="lado">altura(m):</label>
                    <input type="number" name="lado" step="0.1" require>
                    <label for="base">base(m):</label>
                    <input type="number" name="base"step="0.1" require>
                    <button type="submit">operar</button>
                </div>
            </section>
        </div>
    </form>
</body>

</html>