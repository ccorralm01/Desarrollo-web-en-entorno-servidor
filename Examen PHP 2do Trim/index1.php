<?php
    session_start();
    include_once "../config.php";

    spl_autoload_register();

    use conclase\BaseDatos;
    use conclase\Imagen;
    use conclase\Pagina;
    use conclase\Usuario;


    $based = new BaseDatos(DIRECCION, USUARIO, PASSWORD, BD);
    $pag = new Pagina();
    $img = new Imagen($based);
    $usr = new Usuario($based);

    

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
    