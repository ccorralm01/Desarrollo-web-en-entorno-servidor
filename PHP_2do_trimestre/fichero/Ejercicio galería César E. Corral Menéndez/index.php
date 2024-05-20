<?php
    spl_autoload_register();
    use \misclases\paginahtmlgaleria;
    use \misclases\galeria;

    $pagina=new paginahtmlgaleria();
    $galeria=new galeria();


    $contenidoHEAD=$pagina->codigoTitulo("Galeria").$pagina->codigoBootstrap();
    $contenidoBODY=$pagina->codigoForumularioGaleria().$galeria->almacenarImagen($_FILES)->generarGaleriaHTML();

    echo $contenidoHEAD;
    echo $contenidoBODY;
?>