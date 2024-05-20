<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio1</title>
    </head>
    <body>
        <?php
        function factorial(int $numero_final):int{
            $contador = 0;
            $resultado = 1;
            
            while ($contador < $numero_final){
                $contador++;
                $resultado *= $contador;
                
            };
            return $resultado;
        };
        echo " ", factorial(10);
        ?>
    </body>
</html>