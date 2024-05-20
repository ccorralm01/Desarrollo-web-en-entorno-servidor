<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio4</title>
    </head>
    <body>
        <?php
            function arrayAleatorios(int $posiciones, int $max=1, int $min=0):array{
                $array=[];
                if ($posiciones > 0){
                    for ($pos=0;$pos < $posiciones;$pos++){
                        $array[]=rand($min,$max);
                    }
                }
                return $array;
            }
            print_r(arrayAleatorios(5,10))
        ?>
    </body>
</html>