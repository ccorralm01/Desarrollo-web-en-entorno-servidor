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
                define("MAX",100);
                $num1 = random_int(0,MAX);
                $numeros = array();
                $contador = 0;

                $numeros[]=$num1;
                do{
                    $num1 = random_int(0,MAX);
                    for($pos=0;$pos<count($numeros) && !$encontrado;$pos++){
                        if($numeros[$pos]==$num1){
                            $encontrado=true;
                        }
                        else{
                            $encontrado=false;
                        }
                    }
                    $numeros[]=$num1;

                }while(!$encontrado);
                
                echo '<table class="table">';
                echo "<tr>";
                foreach($numeros as $key => $valor){
                    if($key%5==0 && $key!=0){
                        echo "</tr>";
                        echo "<tr>";
                    }
                    echo "<td>$valor</td>";
                }
                echo"</tr>";
                echo "</table>";
            ?>
        <div>
    </body>
</html>