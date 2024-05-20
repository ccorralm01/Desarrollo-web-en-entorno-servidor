<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
        function arrayPrimo(int $numero, array $array):void{
            $array = array();
            for($i=1;$i<=$numero;$i++){
                if(primo($i)){
                    $array[]=$i;
                    }
                }
            }
        function primo(int $numero):bool{
            $primo = true;
            for($u=2;$u<=($numero/2) && $primo; $u++){
                if($numero%$u==0){
                    $primo=false;
                }
            }
            return $primo;
        }
        echo "Primo: <pre>";
        $primos=array();
        arrayPrimo(5, $primos);
        print_r($primos);
        echo "</pre>";
    ?>
</body>
</html>