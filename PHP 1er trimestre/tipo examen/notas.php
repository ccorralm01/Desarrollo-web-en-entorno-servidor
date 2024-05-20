<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>gestión base de datos</title>
    <?php 
    include_once("insertar.php");
    ?>
</head>
    <body>
        <div>
            <form method="get">
                Título: <input type="text" name="titulo"/></br></br>
                Texto: <input type="text" name="texto"/></br></br>
                Autor: <input type="text" name="autor"/></br></br>
                Pin: <input type="text" name="pin"/></br></br>
                <!-- <input type="submit" name="crear" value="Crear fila"/></br></br> -->
            </form>
        </div>
    </body>
</html>