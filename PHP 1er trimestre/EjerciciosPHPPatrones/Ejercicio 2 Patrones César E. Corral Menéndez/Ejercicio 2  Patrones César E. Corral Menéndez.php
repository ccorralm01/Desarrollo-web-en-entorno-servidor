<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        $patron = "/^[A-Z]{3}[0-9]{4}$/";

        if(isset($_GET["matricula"])&& preg_match($patron,$_GET["matricula"])){
            echo "Matricula correcta";
        }
        else{
            echo "Matricula incorrecta";
        }
    ?>
</body>
</html>