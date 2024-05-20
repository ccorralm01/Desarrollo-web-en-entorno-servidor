<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        $patron = "(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?(\.)){4}";
        $ip_para_comprobar = "192.168.30.255";
        if(preg_match($patron,$ip_para_comprobar)){
            echo "valido";
        }
        else{
            echo "no valido";
        }
    ?>
</body>
</html>