<?php
    $htmllogin = 
    '<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
    <style>
        .container{
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        form{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            row-gap: 20px;
            border: 5px solid black;
            border-radius: 20px;
            padding: 30px;
        }
        .boton{
            width: 30%;
        }
    </style>
    </head>
    <body>
    <div class="container">
        <form method="$_POST">
            <div>Usuario: <input type="text" name="user"></div> 
            <div>Contraseña: <input type="password" name="pass"></div>
            <input type="submit" value="Enviar" class="boton" name="boton">
        </form>
    </div>
    </body>
    </html>';
    
    $htmllogout = 
    '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cerrar Sesion</title>
        <style>
            form{
                width: 100vw;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            button{
                width: 50%;
                height: 15%;
                font-size: 300%;
            }
        </style>
    </head>
    <body>
        <form>
            <button name="logout">CERRAR SESIÓN</button>
        </form>
    </body>
    </html>';
    
    session_start();
    include_once 'libreriaBD.php';

    if(isset($_SESSION['login'])){
        if(isset($_REQUEST['logout'])){
            session_destroy();
            echo $htmllogin;
        }
        else{
            echo $htmllogout;
        }
    }
    else{
        if(isset($_REQUEST["user"]) && isset($_REQUEST["pass"]) && trim($_REQUEST["user"]) && trim($_REQUEST["user"])){
            $user = $_REQUEST["user"];
            $pass = $_REQUEST["pass"];
            $consulta = "SELECT * FROM usuarios WHERE user='$user' AND pass=MD5('$pass')";
            $ruta = "config.php";
            $resulset=realizarConsulta($consulta, $ruta);
            if($resulset->num_rows){
                $_SESSION["login"]=$user;
                echo $htmllogout;
            }
            else{
                echo $htmllogin;
            }
        }
        else{
            echo $htmllogin;
        }
    }
?>