<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php
        $nombre = "César";
        $apellidos = "Corral Menéndez";
        $direccion = "Santiago Ferrer";
        $codigoPostal = 19200;
        $localidad = "Azuqueca de Henares";
        $provincia = "Guadalajara";
        echo "<table class='table' border = 1>";
        echo"<tr>";
        echo "<th>Variable</th>";
        echo "<th>Valor</th>";
        echo "<th>Tipo</th>";
        echo "</tr>";
        echo"<tr>";
        echo "<td>nombre</td>";
        echo "<td>$nombre</td>";
        echo "<td>".gettype($nombre)."</td>";
        echo "</tr>";
        echo"<tr>";
        echo "<td>apellidos</td>";
        echo "<td>$apellidos</td>";
        echo "<td>".gettype($apellidos)."</td>";
        echo "</tr>";
        echo"<tr>";
        echo "<td>direccion</td>";
        echo "<td>$direccion</td>";
        echo "<td>".gettype($direccion)."</td>";
        echo "</tr>";
        echo"<tr>";
        echo "<td>codigoPostal</td>";
        echo "<td>$codigoPostal</td>";
        echo "<td>".gettype($codigoPostal)."</td>";
        echo "</tr>";
        echo"<tr>";
        echo "<td>localidad</td>";
        echo "<td>$localidad</td>";
        echo "<td>".gettype($localidad)."</td>";
        echo "</tr>";
        echo"<tr>";
        echo "<td>provincia</td>";
        echo "<td>$provincia</td>";
        echo "<td>".gettype($provincia)."</td>";
        echo "</tr>";
        echo "</table>";
    ?>
</body>
</html>