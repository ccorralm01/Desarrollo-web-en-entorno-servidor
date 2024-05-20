<?php

    namespace misclases;

    class paghtml{
        private $doctype;
        private $head;
        private $body;

        public function __construct($doctype=null)
        {
            $this->doctype = $doctype??"<!DOCTYPE html>"; //Si es nulo
            $this->completarHead();
            $this->completarBody();
        }

        public function codigoPagina()
        {
            return $this->doctype."<html>".$this->head.$this->body."</html>";
        }

        public function completarHead($contenido=null)
        {
            $this->head="<head>$contenido</head>";
            return $this;
        }

        public function completarBody($contenido=null)
        {
            $this->body="<body>$contenido</body>";
            return $this;
        }
    }
    