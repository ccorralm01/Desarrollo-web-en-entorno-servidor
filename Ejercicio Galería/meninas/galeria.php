<?php
    
    namespace meninas;

    class Galeria{
        public $img;

        public function generarGaleria($imagenes){
            $resultado = "";
            $resultado .= "<!-- BEGIN RESULT -->
                            <div class='col-md-9'>
                                <h2><i class='fa fa-file-o'></i>Resultados</h2>
                                <hr>           
                                <div class='padding'></div>
                                
                                <!-- BEGIN TABLE RESULT -->
                                <div class='table-responsive'>
                                <table class='table table-hover'>
                                    <tbody>"
                                    .$imagenes.
                                "</tbody></table>
                                </div>
                                <!-- END TABLE RESULT -->
                            </div>
                            <!-- END RESULT -->";

            return $resultado;
            
        }

        public function generarImagen(){
           return $imagen = "<tr>
                                <td class='number text-center'>1</td>
                                    <td class='imagen'><div class='botonXContainer'><button type='button' class='botonX'>X</button></div>
                                    <img src='https://www.bootdey.com/image/100x100/FF8C00' alt=''>
                                    <button type='button' class='btn btn-primary btn-lg-2'>DESPUBLICAR</button></td>
                            </tr>";
        }
    }
?>