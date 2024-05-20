<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio2</title>
</head>
<body>
    <?php
    $resultado = 5.5;
    $tipo = gettype($resultado);
    echo $resultado, " y es de tipo $tipo<br>";
    $resultado = (int)$resultado;
    $tipo = gettype($resultado);
    echo $resultado, " y es de tipo $tipo<br>";
    ?>
</body>
</html>