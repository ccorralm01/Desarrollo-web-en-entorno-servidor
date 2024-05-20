<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Ejercicio 10</title>
    
</head>
<body>
    
    <?php
        $patron_texto = '/^[a-zA-Z ]*$/';
        $patron_edad = '/^([0-9]{4})\-((1[0-2])|(0?[0-9]))\-((3[0-1])|([0-2]?[0-9]))$/';
        $patron_contrasenia = '/^(([A-Z][a-z][a-zA-Z])|([a-z][A-Z][a-zA-Z])|([a-zA-Z][a-z][A-Z])|([a-zA-Z][A-Z][a-z]))[0-9]{4}$/';

        echo "<table class='table'>";
        echo "<tr>";
        echo "<th> CAMPOS</th>";
        echo "<th> DATOS</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> Nombre</td>";
        if (isset($_REQUEST["nombre"]) && preg_match($patron_texto,$_REQUEST["nombre"])){
            echo "<td>".$_REQUEST["nombre"]."</td>";
        } else{
            echo "<td>No encontrado</td>";

        }
        echo "</tr>";
        echo "<tr>";
        echo "<td> Teléfono</td>";
        if(isset($_REQUEST["telefono"])){
            echo "<td>".$_REQUEST["telefono"]."</td>";

        }else{
            echo "<td>No encontrado</td>";

        }
        
        echo "</tr>";
        echo "<tr>";
        echo "<td> Fecha de nacimiento</td>";
        if (isset($_REQUEST["fecha"]) &&preg_match($patron_edad,$_REQUEST["fecha"])){
            echo "<td>".$_REQUEST["fecha"]."</td>";
        } else{
            echo "<td>No encontrado</td>";

        }
        echo "</tr>";
        echo "<tr>";
        echo "<td> Correo</td>";
        if(isset($_REQUEST["email"])){
            echo "<td>".$_REQUEST["email"]."</td>";

        }else{
            echo "<td>No encontrado</td>";

        }
      
        echo "</tr>";
        echo "<tr>";
        echo "<td> Contraseña</td>";
        if (isset($_REQUEST["contrasenia"]) && preg_match($patron_contrasenia,$_REQUEST["contrasenia"])){
            echo "<td>".$_REQUEST["contrasenia"]."</td>";
        }else{
            echo "<td>No encontrado</td>";

        }
        echo "</tr>";
        echo "</table>"




    ?>
</body>
</html>