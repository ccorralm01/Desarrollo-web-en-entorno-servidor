<?php
    namespace conclase;

    class BaseDatos{
        public $conexion;
        public $usuario;
        public $password;
        public $bd;

        public function __construct($conexion, $usuario, $password, $bd){
            $this->conexion = $conexion;
            $this->usuario = $usuario;
            $this->password = $password;
            $this->bd = $bd;
        }
        
        public function realizarConsulta($consulta){
            @ $con= new \mysqli($this->conexion, $this->usuario, $this->password, $this->bd);

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

        public function realizarConsultaAvatar($consulta){
            @ $con= new \mysqli($this->conexion, $this->usuario, $this->password, $this->bd);

            if(!$con->connect_errno){
                $resulset = $con->query($consulta);
                $con->close();
            }
            else{
                throw new \Exception("Fallo conexion BD, ".$con->connect_errno);
            }

            return $resulset;
        }
    }