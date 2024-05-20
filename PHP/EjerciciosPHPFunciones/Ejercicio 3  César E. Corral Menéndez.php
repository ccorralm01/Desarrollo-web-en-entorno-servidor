<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio3</title>
    </head>
    <body>
        <?php
        function media(...$decimales):float{
            $suma = 0;
            $media = 0;
            for($i=0;$i<count($decimales);$i++){
                $suma += $decimales[$i];
            }
            $media = $suma/count($decimales);
            return $media;
        };
        echo media(8.23, 3.41, 3.141516)
        ?>
    </body>
</html>