<?php 
    require_once("config.php");
    function comprobarInsertar($valoresFormulario){
        $fallos = 0;
        //Comprobacion de que los campos introducidos por el usuario existen
        if(isset($valoresFormulario['insertar']) && isset($valoresFormulario['titulo']) 
            && isset($valoresFormulario['autor']) && isset($valoresFormulario['pin'])){
            if(strlen(trim($valoresFormulario['titulo'])) > 1 && strlen(trim($valoresFormulario['autor'])) > 1 && strlen(trim($valoresFormulario['pin'])) > 1){
                //realizamos las comprobaciones de tamaño a los campos
                
                    //Titulo
                    $titulo = trim($valoresFormulario['titulo']);
                    if(strlen($titulo) < 2 || strlen($titulo) > 128){
                        echo "El campo ".$titulo." debe tener entre 2 y 128 caracteres";
                        $fallos += 1;
                    }

                    //Texto
                    $texto = trim($valoresFormulario['texto']);
                    if(strlen($texto)<1 || !isset($valoresFormulario[$texto])){
                        $texto = "";
                    }
                    elseif(strlen($texto)>4096){
                        echo "El campo ".$texto." no puede exceder los 4096 caracteres";
                        $fallos += 1;
                    }

                    //Autor
                    $patron = "/^[a-zA-Z]([a-zA-Z0-9\-_]{3,31})$/";
                    $autor = trim($valoresFormulario['autor']);
                    if(!preg_match($patron, $autor)){
                        echo $autor." ha de empezar por letra y estar compuesto unicamente por letras, números y/o guiónes medios y bajos además de tener entre 4 y 32 caracteres";
                        $fallos += 1;
                    }

                    //Pin
                    $pin = trim($valoresFormulario['pin']);
                    //encriptado
                    $pin = md5($pin);
                    if(strlen($pin) < 4 || strlen($pin) > 32){
                        echo "El campo ".$pin." debe tener entre 4 y 32 caracteres";
                        $fallos += 1;
                    }
                    
                    if($fallos>0){
                        $comprobaciones = false;
                    }
                    else{
                        $comprobaciones = true;
                    }

                    return $comprobaciones;
            }
        }
    }

    function insertarDatos($valoresFormulario){
        $resultado = false;
        $con = new mysqli(DIRECCION, USUARIO, CONTRASENIA, BD); //usu contr base
        $titulo = trim($valoresFormulario['titulo']);
        $texto = trim($valoresFormulario['texto']);
        $autor = trim($valoresFormulario['autor']);
        $pin = trim($valoresFormulario['pin']);
   
       
        if(!$con->connect_errno){
            $consulta = "INSERT INTO LIBRETA(TITULO, TEXTO, AUTOR, PIN) VALUES ('$titulo', '$texto', '$autor', '$pin')";
            // prealizamos la consulta:
            $resulset = $con->query($consulta);
            $resultado = true;         
            $con -> close();
        }
        
        else{
            die("Imposible Conectar.");
        }

        return $resultado;
    }

    function comprobarBorrar($valoresFormulario){
        $resultado = false;
        if(isset($valoresFormulario['borrar']) && isset($valoresFormulario["id"]) && strlen(trim($valoresFormulario['id']))){
            $resultado = true;
        }

        return $resultado;
    }


    function borrarDatos($valoresFormulario){
        $resultado = false;
        $con = new mysqli(DIRECCION, USUARIO, CONTRASENIA, BD); //usu contr base        
        if(!$con->connect_errno){
            $consulta = "SELECT * FROM LIBRETA WHERE ID=".$valoresFormulario['id'];
            // prealizamos la consulta:
            $resulset = $con->query($consulta);
            if($resulset->num_rows){
                $consulta = "DELETE FROM LIBRETA WHERE ID=".$valoresFormulario['id'];
                $resulset = $con->query($consulta);
                $resultado = true;
            }
            
            $con -> close();
        }

        return $resultado;
    }

    function pintarNota($fila){
        $resultado="";

        $resultado.="<table>";
        $resultado.="<tr>
                        <td>".$fila["TITULO"]."</td>
                        <td align='right'><a href='?id=".$fila['ID']."&borrar'>Borrar</a></td>
                    </tr>";
        $resultado.="<tr>
                        <td class='texto' colspan='2'>".$fila["TEXTO"]."</td>
                    </tr>";
        $resultado.="<tr>
                        <td colspan='2'>By ".$fila["AUTOR"]."</td>
                    </tr>";
        $resultado.="</table>";

        return $resultado;
    }
?>