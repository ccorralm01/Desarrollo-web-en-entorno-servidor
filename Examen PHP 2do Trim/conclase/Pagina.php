<?php

    namespace conclase;

    class Pagina{

        public function codigoFormLoginHTML():string{
            $codigo = "
                        Usuario <input type='text' name='user'/>
                        Password <input type='password' name='pass'/>
                        <input type='button' value='Login' name='login'/>
                        ";
            return $codigo;
        }

        public function codigoFormBajaHTML():string{
            $codigo = "
                        <input type='button' name='baja'/>
                        ";
            return $codigo;
        }

        public function codigoFormAvatarHTML(string $avatar):string{
            $codigo = "
                        <img src='Avatares/$avatar.png'/>
                        <input type='file' name='imagen'/>
                        <input type='button' value='Cargar' name='cargar'/>
                        ";
            return $codigo;
        }

        public function codigoFormCambioPassHTML():string{
            $codigo ="
                        Password <input type='password' name='newpass'/>
                        <input type='button' value='Actualizar' name='act'/>
                        ";
            return $codigo;
        }
    }
