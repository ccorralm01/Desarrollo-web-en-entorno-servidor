<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8</title>
</head>
<body>
    <?php
        define("PI", 3.1415);
        $radio = rand(1,10);
        $longitud = 0;
        $area = 0;

        $longitud = 2* PI*$radio;
        $area = PI * $radio**2;

        echo "La longitud de la circunferencia de radio $radio es $longitud </br>";
        echo "El área de la circunferencia de radio $radio es $area";
    ?>
</body>
</html>