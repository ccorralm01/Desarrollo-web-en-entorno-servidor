<?php
    namespace misclases;

    class paginahtmlgaleria extends paghtml
    {
        public function codigoTitulo($title){
            $resultado="<meta charset='UTF-8' />
                        <title>$title</title>";
            return $resultado;
        }

        public function codigoBootstrap(){
            $resultado = "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet' />
            <!-- JS -->
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js'></script>";
            return $resultado;
        }

        public function codigoForumularioGaleria(){
            $resultado = "<div class='d-flex justify-content-center style='padding:1em;'>
                            <form action='' method='post' enctype='multipart/form-data' class='row g-3'>
                                <div class='col-auto'>
                                    <label for='imagen' class='form-control-plaintext'>Imagen</label>
                                </div>
                                <div class='col-auto'>
                                    <script>function previsualizar(ruta){
                                        document.getElementById('pre').src=URL.createObjectURL(ruta);
                                        document.getElementById('pre').style.visibility='visible';
                                    }
                                    </script>
                                    <input type='file' name='imagen' id='imagen' accept='image/*' class='form-control' onchange='previsualizar(this.files[0])'>
                                </div>
                                <div class='col-auto'>
                                    <input type='submit' name='cargar' id='cargar' value='Cargar Imagen' class='btn btn-primary form-control'>
                                </div>
                                <hr/>
                                <img id='pre' src='' alt='preview' style='visibility:hidden; max-width:256px;' class='img-thumbnail'>
                                </form>
                            </div>";
            return $resultado;
        }
    }    

?>