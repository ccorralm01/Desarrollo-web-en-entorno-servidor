<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
</head>
<body>
    <?php
        $patron = "/\.[a-zA-Z]{2,}$/";

        if(isset($_POST["web"])&& preg_match($patron,$_POST["web"])){
            echo "Web correcta";
        }
        else{
            echo "Web incorrecta";
        }
    ?>
</body>
</html>