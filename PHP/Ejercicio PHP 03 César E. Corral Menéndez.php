<!DOCTYPE html>
<html lang="es-es">
    <head>
        <meta charset="UTF-8">
        <title>Primer PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="continer">
            <table class="table">
                    <?php
                        $matriz = array(array());
                        define("MAX",10);

                        for($i=0;$i<MAX;$i++)
                        {
                            $matriz[0][$i] = $i;
                        }

                        for($i=1;$i<MAX;$i++)
                        {
                            for($u=0;$u<MAX;$u++)
                            {
                                if($u==0){
                                    $matriz[$i][$u] = $u;
                                }
                                else{
                                    $matriz[$i][$u] = $u*$i;
                                }
                            }
                        }
                        
                        foreach($matriz as $indice)  
                        {
                            echo "<tr>";
                            foreach($indice as $indice2)
                            {
                                echo "<td>".$indice2."</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
            </table>
        <div>
    </body>
</html>