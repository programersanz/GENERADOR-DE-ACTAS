<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/ficha.php";
require_once "modelo/aprendiz.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";

class AprendizController{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo= new aprendiz;

    }
    public function Inicio(){
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php";

        require_once "vista/admin/footer/footer.php";
    }

    

    function save()//aqui se insertan los datos del registro
    {
       
        $aprendiz = new aprendiz();

    
        $aprendiz->setFicha($_POST['ficha']);
        $aprendiz->setTipo($_POST['Tipo']);
        $aprendiz->setDocumento($_POST['Numero']);
        $aprendiz->setNombre($_POST['Nombre_aprendiz']);
        $aprendiz->setApellido($_POST['Apellido_aprendiz']);
        $aprendiz->setCorreo($_POST['Correo']);
        $aprendiz->setTelefono($_POST['Celular']);
        $aprendiz->setEstado_forma($_POST['Estado']);

    
      //  $acta->setId_Rol($_POST['Id_Area']);
         $aprendiz->insertar();
        //$this->envioMail();
       // $this->envioMail($Correo_Electronico,$Contrasena_acta$acta);
    
        header("location:?c=vistas&a=ConsultarAprendiz");
        die("registro exitoso");
    
       // require "Views/acta$acta/registro.php";
 
        
    
    }

    public function Guardar(){

      
     
        $aprendiz=new aprendiz();
  
        $aprendiz->setId_aprendiz($_POST['id_aprendiz']);
        $aprendiz->setFicha($_POST['ficha']);
        $aprendiz->setTipo($_POST['Tipo']);
        $aprendiz->setDocumento($_POST['Numero']);
        $aprendiz->setNombre($_POST['Nombre_aprendiz']);
        $aprendiz->setApellido($_POST['Apellido_aprendiz']);
        $aprendiz->setTelefono($_POST['Celular']);
        $aprendiz->setCorreo($_POST['Correo']);
        $aprendiz->setEstado_forma($_POST['Estado']);
  
    
    
        $aprendiz ->getId_aprendiz() > 0 ?
    
        $this ->modelo->Actualizar($aprendiz):
  
        
        header("location:?c=vistas&a=ConsultarAprendiz");
    
    
    }

    public function BorrarApre(){
        $this->modelo->EliminarApre($_GET["id_aprendiz"]);
        header("location:?c=vistas&a=ConsultarAprendiz");
    }
  

    public function FormCrear(){

            $ficha = new ficha();
            $fichas = $ficha->fichas();



            $p=new aprendiz();
            if(isset($_GET['id'])){

                $p=$this->modelo->Obtener($_GET['id']);
            }
            require_once "vista/admin/cabecera/cabecera.php";
            require_once "vista/admin/contenido/AprendizEdit.php";
            require_once "vista/admin/footer/footer.php";
        }

}