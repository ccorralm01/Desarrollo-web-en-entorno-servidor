<?php
    include_once "../config.php";

    function comprobarLogin(string $user, string $pass):bool{

        $passCifrada = md5($pass);
        $consulta = "SELECT USER, PASSWORD FROM USERS WHERE USER = '$user' AND PASSWORD = '$passCifrada'";
        echo realizarConsulta($consulta);
        return true;
    }

    function realizarConsulta($consulta){
        $conexion = DIRECCION;
        $usuario = USUARIO;
        $password = PASSWORD;
        $bd = BD;
        @ $con= new \mysqli($conexion, $usuario, $password, $bd);

        if(!$con->connect_errno){
            $resulset = $con->query($consulta);
            $con->close();
        }
        else{
            throw new \Exception("Fallo conexion BD, ".$con->connect_errno);
        }

        if($resulset){
            return true;
        }
        else{
            return false;
        }
    }

    function recuperarAvatar(string $user):string{

        $consulta = "SELECT AVATAR FROM USERS WHERE USER = '$user'";

        return realizarConsultaAvatar($consulta);
    }

    function realizarConsultaAvatar($consulta){
        $conexion = DIRECCION;
        $usuario = USUARIO;
        $password = PASSWORD;
        $bd = BD;
        @ $con= new \mysqli($conexion, $usuario, $password, $bd);

        if(!$con->connect_errno){
            $resulset = $con->query($consulta);
            $con->close();
        }
        else{
            throw new \Exception("Fallo conexion BD, ".$con->connect_errno);
        }

        var_dump($resulset);
        return "";
    }
    
    // comprobarLogin("cesar", "cesar");
    recuperarAvatar("cesar");

    // INSERT INTO `users` (`USER`, `PASSWORD`, `AVATAR`, `FECHA`) VALUES ('cesar', '6f597c1ddab467f7bf5498aad1b41899', 'avatarCesar', '2023-03-01');