<?php
        namespace meninas;

        class galeria{
        
            private $imagen;

            public function generargaleria(){

                $imagen =   "<tr>
                                <td class='number text-center'>1</td>
                                    <td class='imagen'><div class='botonXContainer'><button type='button' class='botonX'>X</button></div>
                                    <img src='https://www.bootdey.com/image/100x100/FF8C00' alt=''>
                                    <button type='button' class='btn btn-primary btn-lg-2'>DESPUBLICAR</button></td>
                            </tr>";

                $galeria = "";
                $galeria = "<!-- BEGIN RESULT -->
                <div class='col-md-9'>
                    <h2><i class='fa fa-file-o'></i>Resultados</h2>
                    <hr>           
                    <div class='padding'></div>
                    
                    <!-- BEGIN TABLE RESULT -->
                    <div class='table-responsive'>
                    <table class='table table-hover'>
                        <tbody>
                        $imagen
                    </tbody></table>
                    </div>
                    <!-- END TABLE RESULT -->
                </div>
                <!-- END RESULT -->";

                return $galeria;
            }

        
    }
?>