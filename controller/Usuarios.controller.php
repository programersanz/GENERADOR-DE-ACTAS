<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/basededatos.php";

class UsuariosController{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new usuario;

    }
    public function Inicio(){
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php";

        require_once "vista/admin/footer/footer.php";
    }

    

    function save()//aqui se insertan los datos del registro
    {
       
        $usuario = new usuario();

        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellido($_POST['apellido']);
        $usuario->setCorreo($_POST['correo']);
        $usuario->setRol($_POST['rol']);
        $usuario->setTelefono($_POST['telefono']);
        $usuario->setContrasena($_POST['contrasena']);
        $usuario->setDocumento($_POST['documento']);

      
      //  $acta->setId_Rol($_POST['Id_Area']);
        $usuario->insertar();
        //$this->envioMail();
       // $this->envioMail($Correo_Electronico,$Contrasena_acta$acta);
    
        header("location:?c=vistas&a=usuario");
        die("registro exitoso");
    
       // require "Views/acta$acta/registro.php";
 
        
    
    }

    function validar()
    {
        $correo= $_POST['correo'];
        $contrasena= $_POST['contrasena'];
    
     
         if($this->modelo->login($correo,$contrasena))
        {
        
            $id_rol=$_SESSION['user']->getRol();
      
            if($id_rol == 1)
    
            
            {   
                header('location: ?c=Vistas&a=ConsultarFicha');
                
               
            }
            if($id_rol == 2)
            {
                 header('location: ?c=Vistas&a=UsuActas');
            }

    
        }else{ 
         //agregar alerta
         header('location: ?c=inicio&a=inicio');
            ?> 
    <script type="text/javascript">
      jsFunction();
    </script>
    <?php
    
           
    
        }
    }

    public function Guardarusu(){

      
        $usuario=new usuario();
    
        $usuario->setId($_POST['id']);
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellido($_POST['apellido']);
        $usuario->setCorreo($_POST['correo']);
       
        $usuario->setTelefono($_POST['telefono']);
        $usuario->setContrasena($_POST['contrasena']);
        $usuario->setDocumento($_POST['documento']);

    
    
        $usuario ->getId() > 0 ?
    
        $this ->modelo-> Actualizarusu($usuario):
  
        
        header("location:?c=vistas&a=Usuario");
    
    
    }

    public function GuardarContra(){

      
        $usuario=new usuario();
    

        $usuario->setId($_POST['id']);
        $usuario->setContrasena($_POST['contrasena']);
    

    
    
        $usuario ->getId() > 0 ?
    
        $this ->modelo->  ActualizarContraseña($usuario):
  
        
        header("location:?c=vistas&a=Usuario");
    
    
    }


    
    function logout()
    {
        session_destroy();
        header('location:?c=Vistas&a=Home');
      //  header('location:?c=home&a=index');  //header('location: index.php');
    
    }


    public function Borrarusu(){
        $this->modelo->Eliminarusu($_GET["id"]);
        header("location:?c=vistas&a=Usuario");
    }
  



    public function Editusu(){

        if(isset($_GET['id'])){
        
        
          $p=$this ->modelo ->Obtenerusu ($_GET['id']);
         
    
          
        
          require_once "vista/admin/cabecera/cabecera.php";
          require_once "vista/admin/contenido/usuariosedit.php";
          require_once "vista/admin/footer/footer.php";
        
        }
    
    
        
        
        }

        
    public function EditContra(){

        if(isset($_GET['id'])){
        
        
          $p=$this ->modelo ->ObtenerContra($_GET['id']);
         
    
          
        
          require_once "vista/admin/cabecera/cabecera.php";
          require_once "vista/admin/contenido/cambiarContraseña.php";
          require_once "vista/admin/footer/footer.php";
        
        }
    
    
        
        
        }

}
