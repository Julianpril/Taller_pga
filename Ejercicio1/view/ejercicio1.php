<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="ejercicio1.css">
</head>

<body class="hola">
    <h1 class="titulo">Lista de numeros</h1>
    <div class="container">
        <h2>Lista</h2>
        <a href="../../index.php" class="eje">Volver</a>
        <br>
        <div class="lista">
            <?php
            $listanum = [9, 6, 24, 42, 32, 49];
            $ord_may_men = $listanum;
            sort($ord_may_men);
            foreach ($listanum as $item) {
                echo $item . " ";
            }
            ?>
        </div>
        <?php
        echo '<br>';
        echo "Lista ordenada de menor a menor:";
        echo '<br>';
        foreach ($ord_may_men as $item1) {
            echo $item1 . " ";
        }
        echo '<br>';
        echo "Lista ordenada de numeros Pares  de mayor a menor:";
        echo '<br>';
        $lista_Par = [];
        $lista_impar = [];
        foreach ($listanum as $item) {
            if ($item % 2 == 0) {
                $lista_Par[] = $item;
            } else {
                $lista_impar[] = $item;
            }
        }
        rsort($lista_Par);
        foreach ($lista_Par as $item2) {
            echo $item2 . " ";
        }
        sort($lista_impar);
        echo '<br>';
        echo "lista ordenada de numeros impar de menor a mayor:";
        echo '<br>';
        foreach ($lista_impar as $item3) {
            echo $item3 . " ";
        }
        ?>
    </div>
</body>

</html>