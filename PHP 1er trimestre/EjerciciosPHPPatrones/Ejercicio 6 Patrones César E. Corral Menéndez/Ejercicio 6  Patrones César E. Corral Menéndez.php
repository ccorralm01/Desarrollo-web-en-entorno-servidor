<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
        $patronIp = "/^(((1?[0-9])|(2[0-4][0-9])|(25[0-5]))\.){3}((1?[0-9]?[0-9])|(2[0-4][0-9])|(25[0-5]))$/";
        $patronMac = "/^(([0-9A-F]{2}\.){5})|(([0-9A-F]{2}:){5})[0-9A-F]{2}$/";

        if(isset($_POST["ip"])&& preg_match($patron,$_POST["ip"]) && isset($_POST["mac"])&& preg_match($patron,$_POST["mac"])){
            echo "IP y MAC correctas";
        }
        else{
            if(isset($_POST["ip"])&& preg_match($patron,$_POST["ip"])){
                echo "IP correcta";
            }
            else{
                echo "IP incorrecta";
            }
            if(isset($_POST["mac"])&& preg_match($patron,$_POST["mac"])){
                echo "MAC correcta";
            }
            else{
                echo "MAC incorrecta";
            }
        }
    ?>
</body>
</html>