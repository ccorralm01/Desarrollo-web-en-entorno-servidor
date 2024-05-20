<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio4</title>
</head>
<body>
    <?php
    $numero1 = random_int(-100, 100);
    $numero2 = random_int(-100, 100);
    if($numero1>$numero2){
        echo $numero1, " > ", $numero2;
    }
    else{
        echo $numero2, " > ", $numero1;
    }
    ?>
</body>
</html>