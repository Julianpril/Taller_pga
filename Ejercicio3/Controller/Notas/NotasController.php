<?php
   namespace Controller\Notas\NotasController;
class NotasController{
    
    public function numeroNotas() {
        if (empty($_POST['cantidad_notas'])) {
            return;
        }
        echo "<form method='post' action=''>";
        echo "Materia: " . $_POST['materia'] . "<br>";
        echo "Nota mínima: " . $_POST['min_califi'] . "<br>";
        echo "Nota máxima: " . $_POST['max_califi'] . "<br>";
        for ($i = 1; $i <= $_POST['cantidad_notas']; $i++) {
            echo "<label for='nota_$i'>Nota $i:</label>";
            echo "<input type='number' name='notas[]' required min='{$_POST['min_califi']}' max='{$_POST['max_califi']}' step='0.1' required><br><br>";
        }
        echo "<input type='submit' name='submit' value='Enviar'>";
        echo "</form>";
    }
    
    
    public function promedioNotas(){
        $listaNotas = isset($_POST['notas']) ? $_POST['notas'] : array();
        $sumatoria = 0;
        $aprobar = 0;
        $contador = count($listaNotas); 
        $promedio = 0;
    
        if ($contador > 0 && isset($_POST['min_califi']) && isset($_POST['max_califi'])) {
            $aprobar = (($_POST['min_califi'] + $_POST['max_califi']) / 2) + 0.5;
        }
    
        foreach ($listaNotas as $nota) {
            $sumatoria += $nota;
        }
    
        if ($contador > 0) {
            $promedio = $sumatoria / $contador;
    
            if ($promedio >= $aprobar) {
                echo $promedio . "<p> Aprobo la materia</p>";
            } else {
                echo $promedio . "<p> No aprobo la materia</p>";
            }
        }
    }
    
}
