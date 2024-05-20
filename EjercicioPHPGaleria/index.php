<?php
    session_start();
    spl_autoload_register();
    define("CSS","style.css");
    define("doctype", "<!DOCTYPE html>");

    $pagina=new \meninas\pagina();
    $galeria=new \meninas\galeria();

    echo "<html>".$pagina->generarHead("Galeria","César E. Corral Menéndez","pagina galeria","VSC", "style.css").$pagina->generarBody($galeria->generargaleria())."</html>";
    
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