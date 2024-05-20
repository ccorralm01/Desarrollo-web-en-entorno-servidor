<!DOCTYPE html>
<html lang="es-es">
    <head>
        <meta charset="UTF-8">
        <title>Primer PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="continer">
        <hr />
            <?php
                $num1 = random_int(0,100);
                $contador = 1;
                printf("<h3> %05d. Número = %d </h3>",$contador, $num1);
                do{
                    $otro = random_int(0,100);
                    $contador += 1;
                    printf("<h3> %05d. Número = %d </h3>",$contador, $otro);

                }while($num1!=$otro);

                echo "<h3>Cantidad de numeros generados: $contador.</h3>";
            ?>
        <div>
    </body>
</html>