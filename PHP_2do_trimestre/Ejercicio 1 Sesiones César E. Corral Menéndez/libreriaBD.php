<?php
function realizarConsulta($consulta,$ficheroConfig){
    require_once $ficheroConfig;

    //Esto es para conectarse a la base de datos.
    @ $con = new mysqli(DIRECCION, USUARIO, PASSWORD, BD); //usu contr base

            //$connect_errno almacena el error en caso de haberlo al conectarse.
            if(!$con->connect_errno){

                //query sirve para lanzar las consultas a la bbdd a las que nos conectamos
                $resulset = $con->query($consulta);
                
                // IMPORTANTE cerrar la conexión
                $con -> close();
                
                // la -> sirve para acceder a la propiedad del objeto como el . en js y py
                //num_rows (mirar)
                //data_seek (mirar)
                //fetch_fields (mirar)
            }
            else{
                die("Imposible Conectar.");
            }

            return $resulset;
}


function pintarResulset($resulset){
                $resultado="";
                $resultado.="<table>";
                if($resulset->num_rows){
                    // fetch_assoc recupera fila por fila
                    $fila=$resulset->fetch_assoc();

                    $resultado.="<tr>";
                    foreach($fila as $campo => $valor){
                        $resultado.="<th>$campo</th>";
                    }
                    
                    $resultado.="</tr>";
                    do{
                    $resultado.="<tr>";
                        foreach($fila as $valor){
                            $resultado.="<td>$valor</td>";
                        }
                    $resultado.="</tr>";
                }while($fila=$resulset->fetch_assoc());
                }

                $resultado.="</table>";
                return $resultado;
            }
?>