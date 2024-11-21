

<?php
require_once "modelo/ficha.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/ficha.php";
require_once "modelo/basededatos.php";


class FichaController{



    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new ficha;

    }

    


    public function Guardarficha(){

      
      $ficha=new ficha();
  
      $ficha->setId_ficha($_POST['id_ficha']);
      $ficha->setN_ficha($_POST['N_ficha']);
      $ficha->setCantidad_apre($_POST['cantidad_apre']);
      $ficha->setPrograma($_POST['programa']);
      $ficha->setJornada($_POST['jornada']);
      $ficha->setTipo_forma($_POST['tipo_forma']);
      $ficha->setFecha_inicio($_POST['fecha_inicio']);
      $ficha->setFecha_fin($_POST['fecha_fin']);

  
  
      $ficha ->getId_ficha() > 0 ?
  
      $this ->modelo->Actualizarficha($ficha):

      
      header("location:?c=vistas&a=Consultarficha");
  
  
  }
  public function GuardarFichaContador(){

      
    $ficha=new ficha();

    $ficha->setId_ficha($_POST['id_ficha']);
    $ficha->setFicha_contador($_POST['ficha_contador']);




    $ficha ->getId_ficha() > 0 ?

    $this ->modelo->ActualizarFichaContador($ficha):

    
    header("location:?c=vistas&a=Consultarficha");


}





function save()//aqui se insertan los datos del registro
    {
       
        $ficha= new ficha();

        $ficha->setFicha_contador($_POST['ficha_contador']);
        $ficha->setN_ficha($_POST['N_ficha']);
        $ficha->setCantidad_apre($_POST['cantidad_apre']);
        $ficha->setPrograma($_POST['programa']);
        $ficha->setJornada($_POST['jornada']);
        $ficha->setTipo_forma($_POST['tipo_forma']);
        $ficha->setFecha_inicio($_POST['fecha_inicio']);
        $ficha->setFecha_fin($_POST['fecha_fin']);



      
      //  $ficha->setId_Rol($_POST['Id_Area']);
        $ficha->insertar();

        //$this->envioMail();
       // $this->envioMail($Correo_Electronico,$Contrasena_acta$ficha);
    
        header("location:?c=vistas&a=ConsultarFicha");
        die("registro exitoso");
    
       // require "Views/ficha$ficha/registro.php";
 
        



    
    }
    public function Borrarficha(){
        $this->modelo->Eliminarfi ($_GET["id"]);
        header("location:?c=vistas&a=ConsultarFicha");
    }




  public function FormCrearficha(){


    if(isset($_GET['id'])){

     
    
      $p=$this ->modelo ->Obtenerficha ($_GET['id']);
     
      require_once "vista/admin/cabecera/cabecera.php";
      require_once "vista/admin/contenido/FichasEdit.php";
    
      require_once "vista/admin/footer/footer.php";
    
    }


    
    
    }

    
    public function FormFichaContador(){


      if(isset($_GET['id'])){
  
       
      
        $l=$this ->modelo -> ObtenerFichaContador($_GET['id']);
       
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/admin/contenido/FichaContador.php";
      
        require_once "vista/admin/footer/footer.php";
      
      }
  
  
      
      
      }



    




}