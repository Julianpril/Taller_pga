<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>
<?php
$listanum = [9,6,24,42,32,49];
$ord_may_men = $listanum;
sort($ord_may_men);
foreach($listanum as $item){
    echo $item ." ";
    
} 
echo '<br>';
echo "Lista ordenada de menor a menor";
echo '<br>';
foreach($ord_may_men as $item1){
   echo $item1." ";
}
echo '<br>';
echo "Lista ordenada de numeros Pares  de mayor a menor";
echo '<br>';
foreach($listanum as $item){
    $result = $item % 2;
    if($resul==0){
        $lista_Par =[$item];
    }
    rsort($lista_Par);
    echo $lista_Par." ";
}
?>
</body>
</html>
