<?php
    include("conexion.php");
    if(isset($_REQUEST['crear']) && isset($_REQUEST['titulo']) && 
        isset($_REQUEST['texto']) && isset($_REQUEST['autor']) && isset($_REQUEST['pin'])){
            if(strlen(trim($_REQUEST['titulo'])) > 1 && strlen(trim($_REQUEST['texto'])) > 1 && 
            strlen(trim($_REQUEST['autor'])) > 1 && strlen(trim($_REQUEST['pin'])) > 1){

                $titulo = trim($_REQUEST['titulo']);
                $texto = trim($_REQUEST['texto']);
                $autor = trim($_REQUEST['autor']);
                $pin = trim($_REQUEST['pin']);

                $consulta = "INSERT INTO LIBRETA(TITULO, TEXTO, AUTOR, PIN) VALUES ('$titulo', '$texto', '$autor', '$pin')";

                $resultado = realizarConsulta($consulta);
            }
    }
?>