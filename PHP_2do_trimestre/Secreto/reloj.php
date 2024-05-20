<?php
    abstract class Reloj{
        private $horas;
        private $minutos;
        private $segundos;
        public static $maxHoras=23;
        public static $maxMinSeg=59;
        const MIN=0;

        public static function generarHora(){
            $resultado=[];

            $resultado["horas"]=random_int(self::MIN,self::$maxHoras);
            $resultado["minutos"]=random_int(self::MIN,self::$maxMinSeg);
            $resultado["segundos"]=random_int(self::MIN,self::$maxMinSeg);

            return $resultado;
        }

        public function __construct(int $horas=0,int $minutos=0,int $segundos=0){
            if(($horas>=0 && $horas<24) && ($minutos>=0 && $minutos<60) && ($segundos>=0 && $segundos<60)){
                $this->horas=$horas;
                $this->minutos=$minutos;
                $this->segundos=$segundos;
            }
            else{
                $this->horas=0;
                $this->minutos=0;
                $this->segundos=0;

            }

        }

        abstract public function darHora():string;

        public function cambiarHora(int $horas, int $minutos, int $segundos):bool{
            $resultado=false;
            if(($horas>=0 && $horas<24) && ($minutos>=0 && $minutos<60) && ($segundos>=0 && $segundos<60)){
                $this->horas=$horas;
                $this->minutos=$minutos;
                $this->segundos=$segundos;
                $resultado=true;
            }
            return $resultado;
        }

        public function setHoras(int $horas):bool{
            $resultado=false;
            if($horas>=0 && $horas<24){
                $this->horas=$horas;
                $resultado=true;
            }
            return $resultado;
        }

        public function setMinutos(int $minutos):bool{
            $resultado=false;
            if($minutos>=0 && $minutos<60){
                $this->minutos=$minutos;
                $resultado=true;
            }
            return $resultado;
        }

        public function setSegundos(int $segundos):bool{
            $resultado=false;
            if($segundos>=0 && $segundos<24){
                $this->horas=$segundos;
                $resultado=true;
            }
            return $resultado;
        }

        public function getHoras():string{
            $resultado=$this->horas;
            if($this->horas<10){
                $resultado="0".$resultado;
            }
            return $resultado;
        }

        public function getMinutos():string{
            $resultado=$this->minutos;
            if($this->minutos<10){
                $resultado="0".$resultado;
            }
            return $resultado;
        }

        public function getSegundos():string{
            $resultado=$this->segundos;
            if($this->segundos<10){
                $resultado="0".$resultado;
            }
            return $resultado;
        }

       
    }
    class RelojCanarias extends Reloj{
        final public function darHora(): string
        {
            return $this->getHoras().".".$this->getMinutos().".".$this->getSegundos();
        }

        public function darHoraReducida(): string
        {
            return $this->getHoras().".".$this->getMinutos();
        }

        public function getHoras(): string
        {
            $resultado=$this->calcularHora(parent::getHoras());
            if($resultado<10){
                $resultado="0".$resultado;
            }
            return $resultado;
        }

        private function calcularHora(int $hora):int{
            $hora-=1;
            if($hora==-1){
                $hora=23;
            }
            return $hora;
        }
    }

    $r1=new RelojCanarias();

    var_dump(RelojCanarias::generarHora())
?>