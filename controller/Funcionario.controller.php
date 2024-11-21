<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";
require_once "modelo/funcionario.php";



class FuncionarioController{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new funcionario;


    }

        function save()//aqui se insertan los datos del registro
    {
       
        $funcionario = new funcionario();

        $funcionario->setNombre($_POST['nombre']);
        $funcionario->setApellido($_POST['apellido']);
        $funcionario->setCargo($_POST['cargo']);
      

      
      //  $acta->setId_Rol($_POST['Id_Area']);
        $funcionario->insertarfuncionario();

        //$this->envioMail();
       // $this->envioMail($Correo_Electronico,$Contrasena_acta$acta);
    
        header("location:?c=vistas&a=ConsultaUsuExternos");
        die("registro exitoso");
    
       // require "Views/acta$acta/registro.php";
 
        
    
    }


        
    public function Borrar(){
        $this->modelo->Eliminarfuncionario($_GET["id"]);
        header("location:?c=vistas&a=ConsultaUsuExternos");
    }



    public function Guardarfuncionario(){

      
        $funcionario=new funcionario();
    
        $funcionario->setId_funcionario($_POST['id_funcionario']);
        $funcionario->setNombre($_POST['nombre']);
        $funcionario->setApellido($_POST['apellido']);
        $funcionario->setCargo($_POST['cargo']);

  
    
    
        $funcionario ->getId_funcionario() > 0 ?
    
        $this ->modelo->Actualizarfuncionario($funcionario):
  
        
        header("location:?c=vistas&a=ConsultaUsuExternos");
    
    
    }




    public function FormCrearfuncionario(){


        if(isset($_GET['id'])){
        
        
          $p=$this ->modelo ->Obtenerfuncionario ($_GET['id']);
         
          require_once "vista/admin/cabecera/cabecera.php";
          require_once "vista/admin/contenido/UsuariosExtEdit.php";
        
          require_once "vista/admin/footer/footer.php";
        
        }
    
    
        
        
        }
  

}