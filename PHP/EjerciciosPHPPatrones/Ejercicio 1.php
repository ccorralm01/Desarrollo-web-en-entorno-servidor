<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $patron = "/[0-1][0-9]||2[0-3]/";
        $hora_comprobar = $_REQUEST("24");

        if(isset($_REQUEST["hora"])&& preg_match($patron,$_REQUEST["hora"])){
            echo "Hora correcta";
        }
        else{
            echo "Hora no correcta";
        }
    ?>
</body>
</html>