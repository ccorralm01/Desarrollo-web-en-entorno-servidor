<?php
    namespace meninas;

    use meninas\baseDatos;
    spl_autoload_register();

    $baseDatos = new \meninas\baseDatos;

    class Usuario{
        public function comprobarUsuarioLogin(){
            if(isset($_REQUEST["user"]) && isset($_REQUEST["pass"]) && trim($_REQUEST["user"]) && trim($_REQUEST["user"])){
                $user = $_REQUEST["user"];
                $pass = $_REQUEST["pass"];
                $consulta = "SELECT * FROM usuarios WHERE user='$user' AND pass=MD5('$pass')";
                $ruta = "config.php";
                $resulset=realizarConsulta($consulta, $ruta);
                
                return $resulset;
            }
        }
    }
?>