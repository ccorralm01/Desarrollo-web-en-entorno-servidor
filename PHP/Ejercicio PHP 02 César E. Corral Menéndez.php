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
                        define("MAX",10);
                        echo "<tr>";
                        for($i=0;$i<MAX;$i++)
                        {
                            echo "<th>$i</th>";
                        }
                        echo "</tr>";

                        for($i=1;$i<MAX;$i++)
                        {
                            echo "<tr>";
                            for($u=0;$u<MAX;$u++)
                            {
                                if($u==0){
                                    echo "<th>$i</th>";
                                }
                                else{
                                    echo "<td>".($i*$u)."</td>";
                                }
                            }
                            echo "</tr>";
                        }
                    ?>
            </table>
        <div>
    </body>
</html>