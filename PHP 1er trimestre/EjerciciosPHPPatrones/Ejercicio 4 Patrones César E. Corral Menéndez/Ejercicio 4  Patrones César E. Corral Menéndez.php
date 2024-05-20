<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        $patron = "/^((http(s)? | (ftp) | (mailto) | (file) | (data)):\/\//";

        if(isset($_GET["url"])&& preg_match($patron,$_GET["url"])){
            echo "URL correcta";
        }
        else{
            echo "URL incorrecta";
        }
    ?>
</body>
</html>