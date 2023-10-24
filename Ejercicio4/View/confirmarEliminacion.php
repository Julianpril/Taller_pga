<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="Styles/ConfirEli.css">
</head>

<body>
    <form action="accion_Docente.php" method="post">
        <div class="container">
            <h1 class="form_title">Confirmar operación</h1>
            <p class="form_paragraph">¿desea eliminar el registro ?</p>
            <input type="hidden" name="codigo" value="<?php echo $_GET['codigo'] ?>">
            <input type="hidden" name="operacion" value="delete">
            <button type="submit" class="form_submit">si</button>
            <a href="docentes.php" class="form_submitno">No</a>
        </div>
    </form>
</body>

</html>