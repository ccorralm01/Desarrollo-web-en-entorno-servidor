<?php
    namespace conclase;

    class Usuario{
        private $based;

        public function __construct($based){
            $this->based = $based;
        }

        public function comprobarLogin(string $user, string $pass):bool{

            $passCifrada = md5($pass);
            $consulta = "SELECT USER, PASSWORD FROM USERS WHERE USER = $user AND PASSWORD = $passCifrada";

            return $this->based->realizarConsulta($consulta);
        }

        public function recuperarAvatar(string $user):string{

            $consulta = "SELECT AVATAR FROM USERS WHERE USER = $user";

            return $this->based->realizarConsultaAvatar($consulta);
        }

        public function bajaUsuario(string $user):bool{

            $consulta = "DELETE FROM USERS WHERE USER = $user";

            return $this->based->realizarConsulta($consulta);
        }

        public function actualizarAvatar(string $user, string $avatar):bool{
            $consulta = "UPDATE AVATAR SET $avatar FROM USERS WHERE USER = $user";

            return $this->based->realizarConsulta($consulta);
        }

        public function comprobarPassword(string $pass):bool{
            $resultado = false;

            if(strlen($pass)>4 && strlen($pass)<64 && preg_match("/[A-Z]{1,}/", $pass) && preg_match("/[a-z]{1,}/", $pass) && preg_match("/[0-9]{1,}/", $pass)){
                $resultado = true;
            }
            
            return $resultado;
        }

        public function actualizarPassword(string $user, string $pass):bool{
            $passCifrada = md5($pass);

            $consulta = "UPDATE PASSWORD SET $passCifrada FROM USERS USER = $user AND PASSWORD = $passCifrada";

            return $this->based->realizarConsulta($consulta);
        }
    }