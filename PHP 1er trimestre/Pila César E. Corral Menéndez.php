<?php
    function compilar($array,$debug=false):?string{
        $resultado="";
        $token="";
        $error=false;

        while($array && !$error){
            
            if($debug){echo "<p><pre>".print_r($array, true)."</pre><hr/>$resultado</p>";}

            $token=array_pop($array);

            if( $token==";"){
                
                $error=comienzoInstruccion($array,$resultado);

            }
            else{
                $error=true;
                $resultado = "Error: se esperaba un ;";
            }
        }

        if($error){
            echo $resultado;
            $resultado=null;
        }

        return $resultado;
    }

    function comienzoInstruccion(&$array,&$resultado):bool{
        $error=false;
        $token=array_pop($array);

        if(is_numeric($token)){
            
            $error=reglaNumero($array,$resultado,$token);
        }
        else{

            $error=true;
            $resultado="Error: se esperaba el primer operando de la instrucción.";

        }
        return $error;
    }

    function reglaNumero(&$array,&$resultado,$token):bool{
        $error=false;
        $operador=$token;
        $token=array_pop($array);

        if($token=="*"){

            $error=reglaMultiplicacion($array,$resultado,$operador);

        }
        elseif($token==null || $token==";"){

            $error=reglaFinalInstruccion($array,$resultado,$operador,$token);

        }
        else{
            $error=true;
            $resultado="Error: simbolo '$token' inesperado.";

        }
        return $error;
    }

    function reglaMultiplicacion(&$array,&$resultado,$operador):bool{
        $error=false;
        $token=array_pop($array);
        if(is_numeric($token)){

            $token=$token*$operador;
            array_push($array,$token);
            $error=comienzoInstruccion($array,$resultado);

        }
        else{

            $error=true;
            $resultado="Error: falta el segundo operador de la multiplicacion: $operador * ?";
        
        }
        return $error;
    }

    function reglaFinalInstruccion(&$array,&$resultado,$operador,$token){
        $error=false;

        $resultado=$token==null?"Resultado =>".$resultado.$operador:$resultado.$operador;

        if($token==";"){array_push($array,$token);}
        return $error;

    }
?>