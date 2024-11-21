<?php

require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";

require_once "modelo/ficha.php";
require_once "modelo/basededatos.php";

class InicioController{

    private $modelo;


        public function __CONSTRUCT(){
        // $this->modelo+ new Acta
        }

    



            public function inicio(){
                require_once "login.php";

            }

}