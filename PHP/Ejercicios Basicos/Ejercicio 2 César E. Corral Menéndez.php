<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio2</title>
</head>
<body>
    <?php
    $numero = random_int(1, 10);
    if($numero%2 == 0){
        echo $numero, " es par";
    }
    else{
        echo $numero, " es impar";
    }
    ?>
</body>
</html>