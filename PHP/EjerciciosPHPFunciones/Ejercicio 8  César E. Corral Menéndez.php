<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
        function codigoTablaMatriz(array $matriz, bool $hf=false, bool $hc=false):string{
            $resultado = "";
            $resultado.="<table border='1'>";

            foreach($matriz as $nf => $fila){
                $resultado.="<tr>";

                foreach($fila as $nc => $col){
                    if(($nf==0 && $hf)||($nc == 0 && $hc)){
                        $resultado.="<th>$col</th>";
                    }
                    else{
                        $resultado.="<td>$col</td>";
                    }
                }

                $resultado.="</tr>";
            }

            $resultado.="</table>";

            return $resultado;
        }

        echo codigoTablaMatriz(array(array("1-1", "1-2"),array("2-1","2-2")), true, false);
    ?>
</body>
</html>