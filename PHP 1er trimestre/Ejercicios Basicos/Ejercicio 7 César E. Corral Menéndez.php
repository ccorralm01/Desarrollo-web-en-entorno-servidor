<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
    $numero_aleatorio = 0;
    $numero_aleatorio = rand(0,1000);
    $limite = $numero_aleatorio/2;
    $validador = true;

    if ($numero_aleatorio % 2 != 0){
        for($i=3; $i< round($limite); $i+= 2){
            if ($numero_aleatorio % $i == 0){
                $validador = false;
            }
        }
    } else{
        $validador = true;
    }

    if ($validador){
        echo "El número $numero_aleatorio es primo :)";
    } else {
        echo "El número $numero_aleatorio no es primo :(";
    }


    ?>
</body>
</html>