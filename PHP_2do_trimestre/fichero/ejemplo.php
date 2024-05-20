<?php
    // $fp=fopen("Leeme.txt", "r");
    // echo "<pre>";
    // for($cont=1;!feof($fp);$cont++){
    //     echo $cont."-".fgets($fp);
    // }

    // while(!feof($fp)){
    //     $car = fgetc($fp);
    //     if(!feof($fp)){
    //         echo $car;
    //     }
    // }
    // echo "</pre>";

    // fclose($fp);

    $fp=fopen("clientes", "r+");

    $bytes=fwrite($fp, "Hola");

    echo "Se escribieron $bytes en el fichero clientes";

    fclose($fp);
?>