<?php
require_once "modelo/usuarios.php";
require_once "modelo/instructor.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";
require_once "modelo/instructor.php";



class InstructorController{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new instructor;


    }

        function save()//aqui se insertan los datos del registro
    {
       
        $instructor = new instructor();

        $instructor->setId_instructor(intval($_POST['id_instructor']));
        $instructor->setNombre($_POST['nombre']);
        $instructor->setApellido($_POST['apellido']);
        $instructor->setTelefono($_POST['telefono']);
        $instructor->setRol($_POST['rol']);
        $instructor->setCorreo($_POST['correo']);
        $instructor->setContraseña($_POST['contraseña']);

      

        $instructor->getId_instructor()> 0 ?
        $this->modelo->Actualizarinstructor($instructor):
      //  $instructor->setId_Rol($_POST['Id_Area']);
        $instructor->insertarinstructor();

        //$this->envioMail();
       // $this->envioMail($Correo_Electronico,$Contrasena_instructor$instructor$instructor);
    
        header("location:?c=vistas&a=ConsultarInstructor");
        die("registro exitoso");
    
       // require "Views/instructor$instructor$instructor/registro.php";
 
        
    
    }
  
    public function FormCrear(){
        $p=new instructor();
        if(isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
        }
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/admin/contenido/InstructorEdit.php";
        require_once "vista/admin/footer/footer.php";
    }

    
    public function Borrar(){
        $this->modelo->Eliminarinstructor  ($_GET["id"]);
        header("location:?c=vistas&a=ConsultarInstructor");
    }


}