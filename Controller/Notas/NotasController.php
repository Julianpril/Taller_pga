<?php
   namespace Controller\Notas\NotasController;
class NotasController{
    
    public function numeroNotas() {
        if(empty($_POST['cantidad_notas'])) {
            return;
        }
        echo "<form method='post' action=''>";
        echo "Materia: ".$_POST['materia']."<br>";
        echo "Nota mínima: ".$_POST['min_califi']."<br>";
        echo "Nota máxima: ".$_POST['max_califi']."<br>";
        for ($i = 1; $i <= $_POST['cantidad_notas']; $i++) {
            echo "<label for='nota_$i'>Nota $i:</label>";
            echo "<input type='number' id='notas' name='notas$i' required min='{$_POST['min_califi']}' max='{$_POST['max_califi']}'step='0.1'><br><br>";
        }
        echo "<input type='submit' name='submit' value='Enviar'>";
        echo "</form>";
        
    }
    
    public function promedioNotas(){
        $listaNotas=[$_POST['cantidad_notas']];
        $sumatoria=0;
        $aprobar=0;
        $contador=0;
        $promedio=0;
        if (isset($_POST['min_califi']) && isset($_POST['max_califi'])) {
            $aprobar = (($_POST['min_califi'] + $_POST['max_califi']) / 2) + 0.5;
        }
        for ($a = 1; $a <= $_POST['cantidad_notas']; $a++) {
            $notaKey = "notas$a";
            if (isset($_POST[$notaKey])) {
                $listaNotas[] = $_POST[$notaKey];
            }
        }
        foreach($listaNotas as $item){
            $sumatoria += $item;
            $contador ++;
        }
        $promedio = $sumatoria / $contador;
        if($promedio>=$aprobar){
            echo $promedio."<p> Aprobo la materia</p>";
        }else{
            echo $promedio. "<p> No aprobo la materia</p>";

        }
    }
}
?>