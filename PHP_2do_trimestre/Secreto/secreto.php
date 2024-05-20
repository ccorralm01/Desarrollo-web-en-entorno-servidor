<?php

// Clase Secreto
class Secreto {
    public static $size = 4;

    public static function generarClave($tam = null) {
        if ($tam == null) {
            $tam = self::$size;
        }
        $clave = "";
        for ($i = 0; $i < $tam; $i++) {
            $clave .= mb_chr(rand(0, 255));
        }
        return $clave;
    }

    public abstract function cifrar($texto);

    public abstract function descifrar($texto);
}

// Clase Cesar
class Cesar extends Secreto {
    public function cifrar($texto) {
        $cifrado = "";
        for ($i = 0; $i < mb_strlen($texto); $i++) {
            $caracter = mb_substr($texto, $i, 1);
            $codigo = mb_ord($caracter);
            $codigoCifrado = ($codigo + 1) % 256;
            $caracterCifrado = mb_chr($codigoCifrado);
            $cifrado .= $caracterCifrado;
        }
        return $cifrado;
    }

    public function descifrar($texto) {
        $descifrado = "";
        for ($i = 0; $i < mb_strlen($texto); $i++) {
            $caracter = mb_substr($texto, $i, 1);
            $codigo = mb_ord($caracter);
            $codigoDescifrado = ($codigo - 1) % 256;
            $caracterDescifrado = mb_chr($codigoDescifrado);
            $descifrado .= $caracterDescifrado;
        }
        return $descifrado;
    }
}

// Clase CesarConDesplazamiento
final class CesarConDesplazamiento extends Cesar {
    private $clave = 5;

    public function cifrar($texto) {
        $cifrado = "";
        for ($i = 0; $i < mb_strlen($texto); $i++) {
            $caracter = mb_substr($texto, $i, 1);
            $codigo = mb_ord($caracter);
            $codigoCifrado = ($codigo + $this->clave) % 256;
            $caracterCifrado = mb_chr($codigoCifrado);
            $cifrado .= $caracterCifrado;
        }
        return $cifrado;
    }

    public function descifrar($texto) {
        $descifrado = "";
        for ($i = 0; $i < mb_strlen($texto); $i++) {
            $caracter = mb_substr($texto, $i, 1);
            $codigo = mb_ord($caracter);
            $codigoDescifrado = ($codigo - $this->clave) % 256;
            $caracterDescifrado = mb_chr($codigoDescifrado);
            $descifrado .= $caracterDescifrado;
        }
        return $descifrado;
    }

    public function setClave($claveAntigua, $claveNueva) {
        if ($this->clave == $claveAntigua && is_numeric($claveNueva) && $claveNueva > 0) {
            $this->clave = $claveNueva;
            return true;
        }
        return false;
    }

    public function getClave() {
        return md5($this->clave);
    }
}

class Vigenere extends Secreto {
    private $clave;
    
    public function __construct($clave) {
        parent::__construct();
        if (strlen($clave) < 2) {
            $this->clave = "Vigenere";
        } else {
            $this->clave = $clave;
        }
    }
    
    public function cifrar($texto) {
        $resultado = "";
        $longitud = mb_strlen($this->clave);
        $j = 0;
        for ($i = 0; $i < mb_strlen($texto); $i++) {
            $caracter = mb_substr($texto, $i, 1);
            $claveActual = mb_substr($this->clave, $j, 1);
            $claveAscii = mb_ord($claveActual, 'UTF-8');
            $nuevoAscii = mb_ord($caracter, 'UTF-8') + $claveAscii;
            if ($nuevoAscii > 255) {
                $nuevoAscii -= 256;
            }
            $resultado .= mb_chr($nuevoAscii, 'UTF-8');
            $j = ($j + 1) % $longitud;
        }
        return $resultado;
    }
    
    public function descifrar($texto) {
        $resultado = "";
        $longitud = mb_strlen($this->clave);
        $j = 0;
        for ($i = 0; $i < mb_strlen($texto); $i++) {
            $caracter = mb_substr($texto, $i, 1);
            $claveActual = mb_substr($this->clave, $j, 1);
            $claveAscii = mb_ord($claveActual, 'UTF-8');
            $nuevoAscii = mb_ord($caracter, 'UTF-8') - $claveAscii;
            if ($nuevoAscii < 0) {
                $nuevoAscii += 256;
            }
            $resultado .= mb_chr($nuevoAscii, 'UTF-8');
            $j = ($j + 1) % $longitud;
        }
        return $resultado;
    }
    
    final public function getClave() {
        return hash('md5', $this->clave);
    }
    
    public function setClave($claveAntigua, $claveNueva) {
        if ($claveAntigua == $this->clave && strlen($claveNueva) >= 2) {
            $this->clave = $claveNueva;
            return true;
        } else {
            return false;
        }
    }

    class Enigma extends Secreto{

        private $clave="Hoc non pereo habebo fortior me,dum spiro spero";
        private $matriz=[];
        private $dim=16;
        
        public function __construct(string $clave){
            if (mb_strlen($clave > 31)){
                $this->clave = $clave;
            }
            $this->generarMatriz();
        }
    

        private function generarMatriz(){
            $fila=0;
            $col=0;

            //añadimos la clave sin repeticion
            for($pos=0;$pos<mb_strlen($this->clave);$pos++){
                if($this->buscarMatriz(mb_substr($this->clave,$pos,1))==null){
                    $this->matriz[$fila][$col]=mb_substr($this->clave,$pos,1);
                    $fila+=intdiv(++$col,$this->dim);
                    $col=$col%$this->dim;
                }
            }


            //añadimos los primeros 256 caracteres de la tabla UTF sin repeticion
            for($pos=0;$pos<255;$pos++){
                if($this->buscarMatriz(mb_chr($pos))==null){
                    $this->matriz[$fila][$col]=mb_chr($pos);
                    $fila+=intdiv(++$col,$this->dim);
                    $col=$col%$this->dim;
                }
            }

        } 

        private function buscarMatriz(string $car):?array
        {
            $resultado=null;

            for($fila=0;$fila<count($this->matriz) && $resultado==null;$fila++){
                for($col=0;$col<count($this->matriz[$fila]) && $resultado==null;$col++){
                    if($car==$this->matriz[$fila][$col]){
                        $resultado["fila"]=$fila;
                        $resultado["columna"]=$col;
                    }

                }

            }
            return $resultado;
        }


        public function cifrar(string $texto):string{
            $resultado="";

            if(mb_strlen($texto)%2!=0){
                $texto.=" ";

            }
            for($pos=0;$pos<mb_strlen($texto);$pos=$pos+2){
                
                $car1=$this->buscarMatriz(mb_substr($texto,$pos,1));
                $car2=$this->buscarMatriz(mb_substr($texto,$pos+1,1));

                if($car1["columna"]==$car2["columna"]){
                        $car1=$this->matriz[($car1["fila"]+1)%$this->dim][$car1["columna"]];
                        $car2=$this->matriz[($car2["fila"]+1)%$this->dim][$car2["columna"]];
                }

                elseif($car1["fila"]==$car2["fila"]){
                    $car1=$this->matriz[$car1["fila"]][($car1["columna"]+1)%$this->dim];
                    $car2=$this->matriz[$car2["fila"]][($car2["columna"]+1)%$this->dim];
                } 
                else{
                    $colcar1=$car1["columna"];
                    $car1=$this->matriz[$car1["fila"]][$car2["columna"]];
                    $car2=$this->matriz[$car2["fila"]][$colcar1];
                    
                }  

                $resultado.=($car1.$car2);



                $ncar=mb_ord($car);
                $posClave=mb_substr($this->clave,$pos%mb_strlen($this->clave,1));
                $newncar=($ncar + $posClave)%256;
                $newcar=mb_chr($newncar);
                $resultado.=$newcar;
                */
                $resultado.=mb_chr((mb_ord(mb_substr($texto,$pos,1))+$this->clave)%256);

                }
            return $resultado;
        }

        public function descifrar(string $cifrado):string{
            $resultado="";

            if(mb_strlen($cifrado)%2!=0){
                $cifrado.="";

            }

            for($pos=0;$pos<mb_strlen($cifrado);$pos=$pos+2){
                
                $car1=$this->buscarMatriz(mb_substr($cifrado,$pos,1));
                $car2=$this->buscarMatriz(mb_substr($cifrado,$pos+1,1));

                if($car1["columna"]==$car2["columna"]){
                        $car1=$this->matriz[($car1["fila"]+($this->dim-1))%$this->dim][$car1["columna"]];
                        $car2=$this->matriz[($car2["fila"]+($this->dim-1))%$this->dim][$car2["columna"]];
                               
                }

                elseif($car1["fila"]==$car2["fila"]){
                    $car1=$this->matriz[$car1["fila"]][($car1["columna"]+($this->dim-1))%$this->dim];
                    $car2=$this->matriz[$car2["fila"]][($car2["columna"]+($this->dim-1))%$this->dim];
                    
                } 
                else{
                    $colcar1=$car1["columna"];
                    $car1=$this->matriz[$car1["fila"]][$car2["columna"]];
                    $car2=$this->matriz[$car2["fila"]][$colcar1];
                    
                } 
                $resultado.=($car1.$car2);

                for($pos=0;$pos<mb_strlen($cifrado);$pos++){
                
                $car=mb_substr($cifrado,$pos,1);
                $ncar=mb_ord($car);
                $posClave=mb_substr($this->clave,$pos%mb_strlen($this->clave,1));
                $newncar=($ncar+(256-$this->clave))%256;
                $newcar=mb_chr($newncar);
                $resultado.=$newcar;
                

                
                $resultado.=mb_chr((mb_ord(mb_substr($cifrado,$pos,1))+(256-$this->clave))%256);
                               

            }

                return $resultado;

         }
        

            final public function getClave(): string
            {

                return sha1($this->clave);
            }

            public function setClave(string $antigua, string $nueva): bool
            {

                $resultado=false;

                if($antigua==$this->clave && mb_strlen($nueva)>31){
                    $this->clave=$nueva;
                    $this->generarMatriz();
                    $resultado=true;
                    
                }

                return $resultado;
            }
        }    
    }
}
?>