<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio2</title>
    </head>
    <body>
        <?php
            function nacimiento($fecha_usuario):int{
                $edad = 0;
                $date_usuario = strtotime($fecha_usuario);
                $anio_nac_usuario = date("Y", $date_usuario);
                $anio_actual = date("Y");
                $edad = $anio_actual-$anio_nac_usuario;
                return $edad;
            };

            $fecha_nacimiento = "24-06-2001";
            echo nacimiento($fecha_nacimiento);
        ?>
    </body>