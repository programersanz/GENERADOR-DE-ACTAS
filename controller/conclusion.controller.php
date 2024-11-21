<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";
require_once "modelo/conclusiones.php";


class ActaController{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new acta;

    }

    
    public function Inicio(){
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php"; //cambiar redireccion

        require_once "vista/admin/footer/footer.php";
    }

    function save()//aqui se insertan los datos del registro
    {

  

        $prueba2 = new conclusion();
       /* $prueba2 = new acta();*/
        $prueba2->prueba2();

      /*  $prueba2->prueba2();*/
        


        //$this->envioMail();
       // $this->envioMail($Correo_Electronico,$Contrasena_acta$acta);
    
        header("location:?c=vistas&a=ConsultarFicha");
        die("registro exitoso");
    
       // require "Views/acta$acta/registro.php";
 

    
    }

    }
