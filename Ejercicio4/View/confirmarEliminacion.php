<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="accionDocente.php" method="post">
        <h1>Confirmar operación</h1>
        <p>¿desea eliminar el registro ?</p>
        <input type="hidden" name="codigo" value="<?php echo $_GET['codigo'] ?>">
        <input  type="hidden" name="operacion" value="delete"> 
        <button type="submit">si</button>
        <a href="docentes.php">No</a>
    </form>
</body>
</html>