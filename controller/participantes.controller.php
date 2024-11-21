<?php
require_once "modelo/usuarios.php";

require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";


class ActaController{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new acta;

    }
    public function Inicio(){
        require_once "vista/admin/cabecera/cabecera.php";
        require_once "vista/actas/index.php";

        require_once "vista/admin/footer/footer.php";
    }



 




    function save()//aqui se insertan los datos del registro
    {
       
        $acta = new acta();

        $acta->setNom_rev($_POST['nom_rev']);
        $acta->setCiudad($_POST['ciudad']);
        $acta->setFecha($_POST['fecha']);
        $acta->setHora_in($_POST['hora_in']);
        $acta->setHora_fin($_POST['hora_fin']);
        $acta->setLu_en($_POST['lu_en']);
        $acta->setDireccion($_POST['direccion']);
        $acta->setAgenda($_POST['agenda']);
        $acta->setObjetivos($_POST['objetivos']);
        $acta->setParticipantes($_POST['participantes']);
        $acta->setConclusion($_POST['conclusion']);
        $acta->setFicha($_POST['ficha']);
        $acta->setPrograma($_POST['programa']);
      
      //  $acta->setId_Rol($_POST['Id_Area']);
        $acta->insertar();
        //$this->envioMail();
       // $this->envioMail($Correo_Electronico,$Contrasena_acta$acta);
    
        header("location:?c=vistas&a=Actas");
        die("registro exitoso");
    
       // require "Views/acta$acta/registro.php";
 
        
    
    }


    
  public function deleteActa()
  {
    $acta = new acta();
    $acta = $acta->getN_acta($_GET['n_acta']);
    $acta->deleteActa();
    header('location:?c=Vistas&a=Usuarios');
  }



  public function FormCrear(){

    if(isset($_GET['id'])){
    
    
      $p=$this ->modelo ->Participantes ($_GET['id']);
    
      require_once "vista/admin/cabecera/cabecera.php";
      require_once "vista/admin/contenido/editar.php";
    
      require_once "vista/admin/footer/footer.php";
    
    }
    
    
    }




    



    }
