<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/aprendiz.php";
require_once "modelo/programa.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";

class ProgramaController{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo= new programa;

    }
    public function Inicio(){
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php";

        require_once "vista/admin/footer/footer.php";
    }

    

    function save()//aqui se insertan los datos del registro
    {
       
        $programa = new programa();

        $programa->setPrograma($_POST['programa']);
       

    
      //  $acta->setId_Rol($_POST['Id_Area']);
         $programa->insertar();
        //$this->envioMail();
       // $this->envioMail($Correo_Electronico,$Contrasena_acta$acta);
    
        header("location:?c=vistas&a=ConsultarPrograma");
        die("registro exitoso");
    
       // require "Views/acta$acta/registro.php";
 
        
    
    }

    public function GuardarPrograma(){

      
        $programa=new programa();
    
       $programa->setId_programa($_POST['id_programa']);
        $programa->setPrograma($_POST['programa']);
       
  
    
    
        $programa ->getId_programa() > 0 ?
    
        $this ->modelo->ActualizarPrograma($programa):
  
        
        header("location:?c=vistas&a=ConsultarPrograma");
    
    
    }

    public function BorrarPro(){
        $this->modelo->EliminarPro($_GET["id_programa"]);
        header("location:?c=vistas&a=ConsultarPrograma");
    }
  

    public function EditPrograma(){

        if(isset($_GET['id_programa'])){
        
        
          $p=$this ->modelo ->ObtenerPrograma($_GET['id_programa']);
         
    
          
        
          require_once "vista/admin/cabecera/cabecera.php";
          require_once "vista/admin/contenido/ProgramaEdit.php";
          require_once "vista/admin/footer/footer.php";
        
        }
    
    
        
        
        }

}
