<?php
abstract class FormaGeometrica{
    const PI = 3.1416;

    abstract public function calcularPerimetro():float;
    abstract public function calcularArea():float;
}

class Eclipse extends FormaGeometrica{
    public static $a;
    public static $b;
    public function __construct($a=0, $b=0){
        $this->a=$a;
        $this->b=$b;
    }

    public function getA(){
        return $this->a;
    }

    public function getB(){
        return $this->b;
    }

    public function setA($a){
        $resultado = false;
        if(is_numeric($a)){
            $resultado = true;
            $this->a=$a;
        }
        return $resultado;
    }

    public function setB($b){
        $resultado = false;
        if(is_numeric($b)){
            $resultado = true;
            $this->b=$b;
        }
        return $resultado;
    }

    public function calcularPerimetro():float{
        $perimetro = 2*self::PI;
        $perimetro*=sqrt((($this->a**2)+($this->b**2))/2);
        return $perimetro;
    }

    public function calcularArea():float{
        $area = self::PI*$this->a*$this->b;
        return $area;
    }
}

final class Circulo extends Eclipse{
    private static $r;
    public function __construct($r){
        $this->r=$r;
    }

    public function getR(){
        return $this->r;
    }

    public function setR($r){
        $resultado = false;
        if(is_numeric($r)){
            $resultado = true;
            $this->r=$r;
        }
        return $resultado;
    }

    public function calcularPerimetro():float{
        return 2*self::PI*$this->r;
    }
    public function calcularArea():float{
        return self::PI*$this->r**2;
    }
}

class Triangulo{
    private static $b;
    private static $h;
    private static $lado1;
    private static $lado2;
    private static $lado3;
    
    public function __construct($b, $h, $lado1, $lado2, $lado3){
        $this->b=$b;
        $this->h=$h;
        $this->lado1=$lado1;
        $this->lado2=$lado2;
        $this->lado3=$lado3;
    }

    public function getB(){
        return $this->b;
    }

    public function setB($b){
        $resultado = false;
        if(is_numeric($b)){
            $resultado = true;
            $this->b=$b;
        }
        return $resultado;
    }

    public function getH(){
        return $this->h;
    }

    public function setH($h){
        $resultado = false;
        if(is_numeric($h)){
            $resultado = true;
            $this->h=$h;
        }
        return $resultado;
    }

    public function getLado1(){
        return $this->lado1;
    }

    public function setLado1($lado1){
        $resultado = false;
        if(is_numeric($lado1)){
            $resultado = true;
            $this->lado1=$lado1;
        }
        return $resultado;
    }

    public function getLado2(){
        return $this->lado2;
    }

    public function setLado2($lado2){
        $resultado = false;
        if(is_numeric($lado2)){
            $resultado = true;
            $this->lado2=$lado2;
        }
        return $resultado;
    }

    public function getLado3(){
        return $this->lado3;
    }

    public function setLado3($lado3){
        $resultado = false;
        if(is_numeric($lado3)){
            $resultado = true;
            $this->lado3=$lado3;
        }
        return $resultado;
    }

    public function calcularPerimetro():float{
        return $this->lado1 + $this->lado2 + $this->lado3;
    }
    public function calcularArea():float{
        return ($this->b*$this->h)/2;
    }
}

class Rectangulo extends FormaGeometrica{
    private static $lado1;
    private static $lado2;
    public function __construct($lado1, $lado2){
        $this->lado1=$lado1;
        $this->lado2=$lado2;
    }

    public function getLado1(){
        return $this->lado1;
    }

    public function setLado1($lado1){
        $resultado = false;
        if(is_numeric($lado1)){
            $resultado = true;
            $this->lado1=$lado1;
        }
        return $resultado;
    }

    public function getLado2(){
        return $this->lado2;
    }

    public function setLado2($lado2){
        $resultado = false;
        if(is_numeric($lado2)){
            $resultado = true;
            $this->lado2=$lado2;
        }
        return $resultado;
    }
    public function calcularPerimetro():float{
        return $this->lado1 * $this->lado2;
    }

    public function calcularArea():float{
        return 2*($this->lado1 + $this->lado2);
    }
}