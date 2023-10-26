<?php

namespace Controller\FigurasGeometricas\FigurasGeoController;

class TrianguloController
{
    public function mostrarFormulario()
    {
        echo '
            <form method="post">
                <label for="base">Base:</label>
                <input type="number" name="base" id="base" class="texto1" required>
                <br>
                <label for="altura">Altura:</label>
                <input type="number" name="altura" id="altura" class="texto1" required>
                <br>
                <input type="submit" value="Calcular Área" class="btn1">
            </form>
        ';
    }

    public function calcularArea($base, $altura)
    {
        return ($base * $altura) / 2;
    }
}

class CirculoController
{
    public function mostrarFormulario()
    {
        echo '
            <form method="post">
                <label for="radio">Radio:</label>
                <input type="number" name="radio" id="radio" class="texto2" required>
                <input type="submit" value="Calcular Área" class="btn2">
            </form>
        ';
    }

    public function calcularArea($radio)
    {
        return M_PI * $radio * $radio;
    }
}

class CuadradoController
{
    public function mostrarFormulario()
    {
        echo '
        <form method="post">
            <label for="lado">Lado:</label>
            <input type="number" name="lado" id="lado" class="texto3" required>
            <input type="submit" value="Calcular Área"class="btn3" required>
        </form>
        ';
    }

    public function calcularArea($lado)
    {
        return $lado * $lado;
    }
}

class RectanguloController
{
    public function mostrarFormulario()
    {
        echo '
            <form method="post">
            <label for="base_rect">Base:</label>
            <input type="number" name="base_rect" id="base_rect" class="texto4" required>
            <br>
            <label for="altura_rect">Altura:</label>
            <input type="number" name="altura_rect" id="altura_rect" class="texto4" required>
            <br>
            <input type="submit" value="Calcular Área" class="btn4">            
            </form>
        ';
    }

    public function calcularArea($base, $altura)
    {
        return $base * $altura;
    }
}
