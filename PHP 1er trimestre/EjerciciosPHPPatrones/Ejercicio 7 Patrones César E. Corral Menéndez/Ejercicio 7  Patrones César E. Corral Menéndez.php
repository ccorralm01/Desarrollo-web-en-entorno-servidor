<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
</head>
<body>
    <form action="" method="get">
    <?php
        $patron = '/^[a-zA-Z0-9\-+:_[\]()]{8,}$/';
        if (preg_match($patron, $_GET["cadena"])){
            echo "Correcto";
        }
        else {
            echo "Incorrecto";
        }
    ?>
    </form>
</body>
</html>