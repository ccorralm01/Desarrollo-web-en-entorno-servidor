<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejecicio 9</title>
</head>
<body>
    <form action="Ejercicio 9" method="post">
        <textarea name="numero_telefono" id="numero_telefono" cols="30" rows="15" placeholder="Ingresa un número de tlf">
        <input type="submit" value="Enviar">
    </form>
    <?php
    
    function main($caja_texto){
        $patron = "/(\+34|0034)\s((6|7)|(8|9))(([0-9]){2}\s){3}[0-9][0-9]|([0-9]{2}\s([0-9]){3}\s[0-9]{3}))/";

        preg_match_all($patron, $caja_texto, $lista_telefonos);

        if($lista_telefonos){
            echo "<pre>";
            foreach($lista_telefonos[0] as $telefono){
                echo "Teléfono encontrado: &nbsp". $telefono."<br>";
            }
            echo "</pre>";
        }
    }

    if(count($_POST)>0 && isset($_POST["numero_telefono"])){
        main($_POST["numero_telefono"]);
    }

    ?>
</body>
</html>