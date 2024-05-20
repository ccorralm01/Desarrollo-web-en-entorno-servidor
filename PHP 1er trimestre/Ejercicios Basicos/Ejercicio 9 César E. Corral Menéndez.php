<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 9</title>
</head>
<body>
    <?php
    
    $cambio =  rand(1,1000);
    $dinero = 0;

    echo "Se le devolverán $cambio euros de cambio de la siguiente forma: </br>";
    echo "<hr>";
    $dinero = floor($cambio /50);
    $cambio %= 50;
    echo "*$dinero billete/s de 50 euros.</br>";
    $dinero = floor($cambio /20);
    $cambio %= 20;
    echo "*$dinero billete/s de 20 euros.</br>";
    $dinero = floor($cambio /10);
    $cambio %= 10;
    echo "*$dinero billete/s de 10 euros.</br>";
    $dinero = floor($cambio /2);
    $cambio %= 2;
    echo "*$dinero moneda/s de 2 euros.</br>";
    echo "*$cambio moneda/s de 1 euros.</br>";
        
    ?>
</body>
</html>