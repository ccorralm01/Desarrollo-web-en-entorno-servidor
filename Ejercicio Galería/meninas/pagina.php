<?php
    namespace meninas;

    class Pagina{
        private $head;
        private $body;
        
        public function generarHead($titulo, $css=""){
            $resultado = "";
            $resultado .= "<head>
                                <title>$titulo</title>
                                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet' />
                                <!-- JS -->
                                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js'></script>
                                <link rel='stylesheet' href='$css'>
                            </head>";
            return $resultado;
        }

        public function generarBody(...$contenido){
            $resultado = "";
            foreach ($contenido as $cont){
                $resultado.=$cont;
            }

            return "<body>$resultado</body>";
        }

        public function generarFormuarioLogin(){
            $resultado = "";
            $resultado .= "    <div class='container' style='color:green'>
                                    <h1>Galería de imagenes</h1>
                                </div>
                                <div class='container'>
                                    <br>
                                    <form class='form-inline formLogin' action='/action_page.php'>
                                        <label for='email'>Usuario:</label>
                                        <input type='email' class='form-control'
                                            id='email' placeholder='Enter Username'
                                            name='email'>
                                        <label for='pwd'>Contraseña:</label>
                                        <input type='password' class='form-control'
                                            id='pwd' placeholder='Enter password'
                                            name='pswd'>
                                        <button type='button' class='btn btn-danger botonLogin'>
                                            Login
                                        </button>
                                        <button type='button' class='btn btn-secondary botonRegister'>
                                            Register
                                        </button>
                                    </form>
                                </div>
                                <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'>";

            return $resultado;
            
        }

        public function generarFormuarioLoginOut(){
            $resultado = "";
            $resultado .= "<div class='container' style='color:green'>
                                <h1>Galería de imagenes</h1>
                            </div>
                            <div class='container'>
                                <br>
                                <form class='form-inline formLogin' action='/action_page.php'>
                                    <button type='button' class='btn btn-secondary botonRegister'>
                                        LOGOUT
                                    </button>
                                </form>
                            </div>";

            return $resultado;
            
        }

        public function generarFormularioRegister(){
            $resultado = "";
            $resultado .= "<div class='container' style='color:green'>
                                <h1>Galería de imagenes</h1>
                            </div>
                            <div class='container'>
                                <br>
                                <form class='form-inline formLogin' action='/action_page.php'>
                                    <label for='email'>Usuario:</label>
                                    <input type='email' class='form-control'
                                        id='email' placeholder='Enter Username'
                                        name='email'>
                                    <label for='pwd'>Contraseña:</label>
                                    <input type='password' class='form-control'
                                        id='pwd' placeholder='Enter password'
                                        name='pswd'>
                                    <label for='pwd'>Repita contraseña:</label>
                                    <input type='password' class='form-control'
                                        id='pwd' placeholder='Repeat password'
                                        name='pswd'>
                                    <button type='button' class='btn btn-secondary botonRegister'>
                                        Register
                                    </button>
                                </form>
                            </div>";

            return $resultado;
        }

        public function generarFormularioBusqueda(){
            $resultado = "";
            $resultado .= "<!-- BEGIN SEARCH RESULT -->
                            <div class='container'>
                            <div class='row'>
                            <div class='col-md-12'>
                                <div class='grid search'>
                                <div class='grid-body'>
                                    <div class='row'>
                                    <!-- BEGIN FILTERS -->
                                    <div class='col-md-3 nombre'>
                                        <h2 class='grid-title'><i class='fa fa-filter'></i>Filtros</h2>
                                        <hr>
                                        <div class='padding'></div>
                                        
                                        <!-- BEGIN SEARCH INPUT -->
                                        <div class='input-group'>
                                            <input type='text' class='form-control' value='Nombre'>
                                            <span class='input-group-btn'>
                                            <button class='btn btn-primary' type='button'><i class='fa fa-search'></i></button>
                                            </span>
                                        </div>
                                        <!-- END SEARCH INPUT --> 
                        
                                        <!-- BEGIN SEARCH INPUT -->
                                        <div class='input-group'>
                                            <input type='text' class='form-control' value='Autor'>
                                        </div>
                                        <!-- END SEARCH INPUT -->
                        
                                        <!-- BEGIN FILTER BY DATE -->
                                        Desde:
                                        <div class='input-group date form_date' data-date='2014-06-14T05:25:07Z' data-date-format='dd-mm-yyyy' data-link-field='dtp_input1'>
                                        <input type='date' class='form-control'>
                                        </div>
                                        <input type='hidden' id='dtp_input1' value=''>
                                        
                                        Hasta:
                                        <div class='input-group date form_date' data-date='2014-06-14T05:25:07Z' data-date-format='dd-mm-yyyy' data-link-field='dtp_input2'>
                                        <input type='date' class='form-control'>
                                        </div>
                                        <input type='hidden' id='dtp_input2' value=''>
                                        <!-- END FILTER BY DATE -->
                                        
                                        <div class='padding'></div>
                                    </div>
                                    <!-- END FILTERS -->";

            return $resultado;
        
        }
    }
?>