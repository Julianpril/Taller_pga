<?php

namespace Controller\FigurasGeometricas\FigurasGeoController;

class TrianguloController
{
    public function mostrarFormulario()
    {
        echo '
            <form method="post">
                <label for="base">Base:</label>
                <input type="number" name="base" id="base">
                <label for="altura">Altura:</label>
                <input type="number" name="altura" id="altura">
                <input type="submit" value="Calcular Área">
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
                <input type="number" name="radio" id="radio">
                <input type="submit" value="Calcular Área">
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
            <input type="number" name="lado" id="lado">
            <input type="submit" value="Calcular Área">
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
            <input type="number" name="base_rect" id="base_rect">
            <label for="altura_rect">Altura:</label>
            <input type="number" name="altura_rect" id="altura_rect">
            <input type="submit" value="Calcular Área">            
            </form>
        ';
    }

    public function calcularArea($base, $altura)
    {
        return $base * $altura;
    }
}
