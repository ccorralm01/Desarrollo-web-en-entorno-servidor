<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
        $patron = "/^[0-9]{8}[ABCDEFGHJKLMNPQRSTVWXYZ]$/";

        if(isset($_GET["dni"])&& preg_match($patron,$_GET["dni"])){
            echo "DNI correcta";
        }
        else{
            echo "DNI incorrecta";
        }
    ?>
</body>
</html>