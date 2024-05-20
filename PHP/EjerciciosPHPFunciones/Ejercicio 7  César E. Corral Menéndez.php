<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
</head>
<body>
    <?php
        function pintarTabla($columnas, $array){
            for($i=0;$i<=count($array)-1;$i++){
                if($i%$columnas == 0){
                    if($i==0){
                        echo "<table border='1'>";
                        echo "<tr><td>".$array[$i]."</td>";     
                    }
                    else{
                        echo "</tr>";
                        echo "<tr><td>".$array[$i]."</td>";
                    }
                }
                else{
                    echo "<td>".$array[$i]."</td>";
                }

            }
            echo "</tr></table>";
        }
        $array = array(1,2,3,4,5,6,7,8,9,10);
        $cols = 5;
        pintarTabla($cols, $array);
    ?>
</body>
</html>