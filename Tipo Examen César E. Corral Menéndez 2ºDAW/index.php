<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Cesar E Corral Menéndez">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Index</title>
        <?php
            require_once("config.php");
            require_once("notas.php");
        ?>
        <style>
            .formulario {
                width: 500px;
                margin: auto;
                border: 1px solid black;
                padding: 20px;
                text-align: center;
            }

            .formulario input[type="text"],
            .formulario input[type="password"] {
                width: 100%;
                margin-top: 10px;
                padding: 10px;
                font-size: 18px;
            }

            .formulario input[type="submit"] {
                margin-top: 10px;
                padding: 10px 20px;
                font-size: 18px;
                background-color: #1e90ff;
                color: white;
                cursor: pointer;
            }
            .tablas {
                width: 500px;
                margin: auto;
                border: 1px solid black;
                text-align: center;
            }

            .tablas table {
                width: 100%;
                margin-top: 10px;
                padding: 10px;
                font-size: 18px;
                border-collapse: collapse;
            }

            .tablas td,
            .tablas th {
                border: 1px solid black;
                padding: 10px;
            }

            .tablas th {
                background-color: #1e90ff;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="formulario">
            <form action="" method="get">
                <div>TITULO: <input type="text" name="titulo" id="titulo" required="required" minlength="2" maxlength="128"></div>
                <div>TEXTO:  <input type="text" name="texto" id="texto" maxlength="4096"></div>
                <div>AUTOR:  <input type="text" name="autor" id="autor" required="required" minlength="4" maxlength="32"></div>
                <div>PIN:    <input type="password" name="pin" id="pin" required="required" minlength="4" maxlength="32"></div>
                <input class="boton" type="submit" name="insertar" value="Crear nota"/>
            </form>
        </div>
        <hr>
        <?php
            if(comprobarInsertar($_REQUEST)){
                if(insertarDatos($_REQUEST)){
                    echo "<div class='verde'>ELEMENTO INSERTADO</div><hr>";
                }
                else{
                    echo "<div class='rojo'>ERROR INSERTANDO ELEMENTO</div><hr>";
                }
            }

            if(comprobarBorrar($_GET)){
                if(borrarDatos($_GET)){
                    echo "<div class='verde'>ELEMENTO BORRADO</div><hr>";
                }
                else{
                   echo "<div class='rojo'>ERROR BORRANDO ELEMENTO</div><hr>";
                }
            }
            echo "<div class='tablas'>";
            $con=new mysqli(DIRECCION, USUARIO, CONTRASENIA, BD);
            if(!$con->connect_errno){
                $consulta="SELECT * FROM LIBRETA";
                $resulset=$con->query($consulta);
                if($resulset->num_rows){
                    while($fila=$resulset->fetch_assoc()){
                        echo pintarNota($fila);
                    }
                }
                $con->close();
            }

            echo "</div>"
        ?>
    </body>
</html>