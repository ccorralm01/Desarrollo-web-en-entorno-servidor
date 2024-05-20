<?php
    abstract class Mamifero{
        private $edad;

        public function getEdad(){
            return $this->edad;
        }

        public function setEdad($edad){
            $this->edad = $edad;
        }

        abstract public function velocidadDesplazamiento();

    }

    class Murcielago extends Mamifero {
        public $velocidad = 10;

        public function __construct(int $velocidad, int $edad){
            parent::__construct($edad);
            $this->$velocidad = $velocidad;
        }

        public function velocidadDesplazamiento():string{
            return "el murcielago vuela a ".($this->velocidad/$this->getEdad()." Km/h");
        }
    }

    $murcielago = new Murcielago(15, 2);