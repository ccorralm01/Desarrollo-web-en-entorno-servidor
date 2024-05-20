<?php

    class Magica{
        public function __get($nombre)
        {
            $resultado = null;
            if(isset($this->datos[$nombre])){
                $resultado=$this->datos[$nombre];
            }
            return $resultado;
        }

        public function __set($nombre, $valor)
        {
            $this->datos[$nombre]=$valor;
        }

        public function __call($nombre, $argumentos)
        {
            echo "<p>Funcion $nombre: ";
            foreach ($argumentos as $argumento){
                echo "argumento;";
            }
        }

        public function __toString(){
            $resultado=print_r($this->datos, true);
            return $resultado;
        }

        public function __clone()
        {
            foreach($this->datos as $nombre => $valor){
                if(is_a($this->datos[$nombre],"Magica")){
                    $this->datos[$nombre]=new Magica();
                    $this->datos[$nombre]->copia=true;
                }
            }
        }
    }

    $c=new Magica();

    $c->id=12;
    $copia = clone $c;
    $c->siguiente= new Magica();

    echo "<pre>$c</pre>";
    echo "</hr>";
    echo "<pre>$copia</pre>";
?>