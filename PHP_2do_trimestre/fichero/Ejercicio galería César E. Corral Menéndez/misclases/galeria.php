<?php
    namespace misclases;

    class galeria
    {
        private $ruta;

        public function __construct()
        {
            $this->ruta = __DIR__."/imagenes.txt";
        }

        public function almacenarImagen($files){
            if(isset($files['imagen'])){
                if(preg_match("/^image/",$files['imagen']['type'])){
                    if(!file_exists($this->ruta) || !in_array($files['imagen']['name'], file($this->ruta, FILE_IGNORE_NEW_LINES))){ //file devuelve un array con todas las filas
                        if(move_uploaded_file($files['imagen']['tmp_name'], "img/".$files['imagen']['name'])){
                            file_put_contents($this->ruta, $files['imagen']['name'].PHP_EOL, FILE_APPEND);
                            $this->generarMiniatura($files['imagen']['name'],100,100);
                        }
                    }
                }
            }
        return $this;
        }

        private function generarMiniatura($original, $ancho, $alto){
            $correcto=true;
            switch (exif_imagetype("img/".$original)){
                case IMAGETYPE_JPEG: {
                    $nuevo = imagecreatefromjpeg("img/".$original);
                    break;
                }
                case IMAGETYPE_PNG: {
                    $nuevo = imagecreatefrompng("img/".$original);
                    break;
                }
                case IMAGETYPE_GIF: {
                    $nuevo = imagecreatefrompng("img/".$original);
                    break;
                }
                default: {
                    $correcto = false;
                    break;
                }
            }

            if($correcto){
                $mini = imagecreatetruecolor($ancho, $alto);
                imagesavealpha($mini, true);
                imagefill($mini, 0, 0, imagecolorallocatealpha($mini, 0, 0, 0, 127));
                imagecopyresampled($mini, $nuevo, 0, 0, 0, 0, $ancho, $alto, imagesx($nuevo), imagesy($nuevo));
                imagepng($mini, "img/mini/".pathinfo($original)["filename"].".png");
            }
        }

        public function generarGaleriaHTML(){
            $resultado = "";
            if(is_file($this->ruta)){
                $imagenes=file($this->ruta, FILE_IGNORE_NEW_LINES);
                $resultado.="<hr />";
                foreach ($imagenes as $imagen){
                    $resultado.="<a href='img/$imagen' target='_blank'>
                                    <img src='img/mini/".pathinfo($imagen)["filename"].".png' alt='$imagen' class='img-thumbnail'/>
                                </a>";
                }
                $resultado.="<hr />";
            }
            return $resultado;
        }
    }
?>