<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 8</title>
</head>
<body>
    <?php
        function main($fecha){

            $dia29 = "(0[1-9]|1[0-9]|2[0-9])";
            $mes29 = "(02)";

            $dia30 = "(0[1-9]|[1-2][0-9]|30)";
            $mes30 = "(0[469]|11)";

            $dia31 = "(0[1-9]|[1-2][0-9]|3[0-1])";
            $mes31 = "(0[13578])|10|12";

            $anio = "([0-9]{4})";

            $patron = "/($dia30\/$mes30)|($dia31\/$mes31)|($dia29\/$mes29)\/$anio/";

            if(preg_match($patron, $fecha)){
                echo "Fecha correcta: ".$fecha;
            }
            else{
                echo "Fecha incorrecta: ".$fecha;
            }
        }

        main("11/11/2022")
    ?>
</body>
</html>