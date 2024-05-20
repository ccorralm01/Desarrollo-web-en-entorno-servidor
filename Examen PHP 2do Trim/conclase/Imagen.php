<?php

    namespace conclase;

    include_once "../config.php";

    spl_autoload_register();

    use conclase\BaseDatos;

    // $based = new BaseDatos(DIRECCION, USUARIO, PASSWORD, BD);

    class Imagen{
        public $based;

        public function __construct($based){
            $this->based = $based;
        }

        public function nuevoAvatar($file):string{
            $medidas = 256;
            $original = $file["imagen"];
            $correcto = true;
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
                $mini = imagecreatetruecolor($medidas, $medidas);
                imagesavealpha($mini, true);
                imagefill($mini, 0, 0, imagecolorallocatealpha($mini, 0, 0, 0, 127));
                imagecopyresampled($mini, $nuevo, 0, 0, 0, 0, $medidas, $medidas, imagesx($nuevo), imagesy($nuevo));
                imagepng($mini, "img/mini/".pathinfo($original)["filename"].".png");
                return $original;
            }
            else{
                return "";
            }
        }

    }