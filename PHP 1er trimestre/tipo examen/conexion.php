<?php 
    function realizarConsulta($consulta){
        @ $con = new mysqli("localhost", "notas", "bloc", "notas"); //usu contr base

                if(!$con->connect_errno){

                    // prealizamos la consulta:
                    $resulset = $con->query($consulta);
                    
                    $con -> close();
                }
                
                else{
                    die("Imposible Conectar.");
                }

                return $resulset;
    }
?>