<?php
namespace meninas;

include_once "config.php";

class baseDatos{

    private string $direccion = DIRECCION;
    private string $usuario = USUARIO;
    private string $password = PASSWORD;
    private string $baseDatos = BD;

    

    function realizarConsulta($consulta){
        //Esto es para conectarse a la base de datos.
        @ $con = new \mysqli($this->direccion, $this->usuario, $this->password, $this->baseDatos); //usu contr base
    
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
}


?>