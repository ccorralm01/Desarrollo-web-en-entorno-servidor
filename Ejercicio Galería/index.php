<?php

use meninas\Pagina;
use meninas\Galeria;

    session_start();
    spl_autoload_register();
    define("CSS","style.css");
    define("DOCTYPE", "<!DOCTYPE html>");

    $pagina=new \meninas\Pagina;
    $galeria=new \meninas\Galeria;
    $usuario = new \meninas\Usuario;

    echo DOCTYPE.$pagina->generarHead("Galeria", "style.css");

    if(isset($_SESSION['login'])){
        if(isset($_REQUEST['logout'])){
            echo $pagina->generarBody($pagina->generarFormuarioLogin(), $pagina->generarFormularioBusqueda()); //login
            session_destroy();
        }
        else{
            echo $pagina->generarBody($pagina->generarFormuarioLoginOut(), $pagina->generarFormularioBusqueda()); //logout
        }
    }

    else{
        if($usuario->comprobarUsuarioLogin()->num_rows){
                $_SESSION["login"]=$user;
                echo $pagina->generarBody($pagina->generarFormuarioLoginOut(), $pagina->generarFormularioBusqueda()); //logout
        }
        else{
            echo $pagina->generarBody($pagina->generarFormuarioLogin(), $pagina->generarFormularioBusqueda()); //login
        }
    }
?>