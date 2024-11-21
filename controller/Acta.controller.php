<?php
require_once "modelo/usuarios.php";
require_once "modelo/acta.php";
require_once "modelo/rol.php";
require_once "modelo/participantes.php";
require_once "modelo/basededatos.php";
require_once "modelo/conclusiones.php";
require_once "modelo/particulares.php";
require_once "modelo/funcionario.php";
require_once "modelo/casos_anteriores.php";
require_once "modelo/reglamento.php";
require_once "modelo/medida.php";
require_once "modelo/destacados.php";
require_once "modelo/desarrollocomite.php";
require_once "modelo/rar.php";


class ActaController
{
  private $modelo;

  public function __CONSTRUCT()
  {
    $this->modelo = new acta;
  }


  public function Inicio()
  {
    require_once "vista/admin/cabecera/cabecera.php";
    require_once "vista/actas/index.php"; //cambiar redireccion

    require_once "vista/admin/footer/footer.php";
  }

  public function Guardar()
  {


    $acta = new acta();

    $acta->setN_acta($_POST['n_acta']);
    $acta->setNom_rev($_POST['nom_rev']);
    $acta->setCiudad($_POST['ciudad']);
    $acta->setFecha($_POST['fecha']);
    $acta->setHora_in($_POST['hora_in']);
    $acta->setHora_fin($_POST['hora_fin']);
    $acta->setLu_en($_POST['lu_en']);
    $acta->setDireccion($_POST['direccion']);
    $acta->setAgenda($_POST['agenda']);
    $acta->setObjetivos($_POST['objetivos']);
    /*$acta->setParticipantes($_POST['participantes']);*/
    /*$acta->setInf_ficha($_POST['inf_ficha']);*/
    $acta->setCasos_ant($_POST['casos_ant']);
    $acta->setCasos_part($_POST['casos_part']);
    $acta->setHechos_actuales($_POST['hechos_actuales']);
    $acta->setDesarrollo($_POST['desarrollo']);
    $acta->setInforme_vocero($_POST['informe_vocero']);
    $acta->setConclusion($_POST['conclusion']);
    $acta->setFicha($_POST['ficha']);
    $acta->setPrograma($_POST['programa']);


    /* $acta ->getN_acta() > 0 ?
      $this ->modelo-> Actualizar($acta):*/
    $acta->getN_acta() > 0 ?
      $this->modelo->Actualizar($acta) :
      $acta->Actualizar();

    header("location:?c=vistas&a=ConsultarFicha");
  }

  function index2() // este es el menu de citas que ve el paciente
  {
    $acta = new acta(); //?
    $actas = $this->modelo->list('ficha'); //objet de tipo list


    //  $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba

    header("location:?c=vistas&a=filtrarActas");
  }



  public function insertarconclusiones()
  {



    $conclusiones = new acta(); //?

    $conclusiones->conclusiones();
  }




  function save() //aqui se insertan los datos del registro
  {


    $acta = new acta();
    $participantes = new acta();
    $casos = new acta();
    $conclusiones = new acta();
    $casosAnteriores = new acta();
    $destacados = new acta();
    $desarrollocomite = new acta();

    $acta->setActa_no($_POST['acta_no']);
    $acta->setActa_contador($_POST['acta_contador']);
    $acta->setNom_rev($_POST['nom_rev']);
    $acta->setCiudad($_POST['ciudad']);
    $acta->setFecha($_POST['fecha']);
    $acta->setHora_in($_POST['hora_in']);
    $acta->setHora_fin($_POST['hora_fin']);
    $acta->setLu_en($_POST['lu_en']);
    $acta->setDireccion($_POST['direccion']);
    $acta->setAgenda($_POST['agenda']);
    $acta->setObjetivos($_POST['objetivos']);
    $acta->setCasos_ant($_POST['casos_ant']);
    /*$acta->setCasos_part($_POST['casos_part']);*/
    $acta->setHechos_actuales($_POST['hechos_actuales']);
    $acta->setDesarrollo($_POST['desarrollo']);
    $acta->setInforme_vocero($_POST['informe_vocero']);
    /* $acta->setConclusion($_POST['conclusion']);*/
    $acta->setFicha($_POST['ficha']);
    $acta->setPrograma($_POST['programa']);
    $acta->setPrivacidad($_POST['privacidad']);



    //  $acta->setId_Rol($_POST['Id_Area']);
    $acta->insertar();
    $participantes->insertarparti();
    $casos->insertCasosEspeciales();
    $conclusiones->insertarConclusiones();
    $casosAnteriores->insertarCasosAnteriores();
    $destacados->insertarAprendicesDestacados();
    $desarrollocomite->insertarDesarrolloComite();




    /*  $prueba2->prueba2();*/
  }


  public function conclusiones() {}

  public function Borrar()
  {
    $this->modelo->Eliminar($_GET["id"]);
    header("location:?c=vistas&a=ConsultarFicha");
  }


  public function FormCrear()
  {

    if (isset($_GET['id'])) {


      $p = new acta();
      $p = $this->modelo->Obtener($_GET['id']);
      $participantes = new participantes(); //?
      $parti = $this->modelo->ObtenerParticipantes($_GET["id"]); //objet de tipo list

      $particulares = new particulares(); //?
      $casos = $this->modelo->ObtenerCasosP($_GET["id"]);
      $conclusiones = new conclusiones(); //?
      $concu = $this->modelo->ObtenerConclusiones($_GET["id"]);

      $destacados = new destacados(); //?
      $des = $this->modelo->ObtenerDestacados($_GET["id"]);

      $desarrollocomite = new desarrollocomite(); //?
      $desa = $this->modelo->ObtenerDesarrolloComite($_GET["id"]);

      require_once "vista/admin/cabecera/cabecera.php";
      require_once "vista/admin/contenido/editar.php";

      require_once "vista/admin/footer/footer.php";
    }
  }

  public function FormCrearimp()
  {

    if (isset($_GET['id'])) {
      $a = new acta();
      $casos = $this->modelo->casosAnteriores($_GET['ficha'], $_GET['acta_contador']);

      $p = $this->modelo->Obtener($_GET['id']);
      $participantes = new participantes(); //?
      $parti = $this->modelo->ObtenerParticipantes($_GET["id"]);

      $particulares = new particulares(); //?
      $casos = $this->modelo->ObtenerCasosP($_GET["id"]);

      $conclusiones = new conclusiones(); //?
      $concu = $this->modelo->ObtenerConclusiones($_GET["id"]);

      $anteriores = new probando(); //?
      $anter = $this->modelo->ObtenerPrueba($_GET["id"]);

      $destacados = new destacados(); //?
      $des = $this->modelo->ObtenerDestacados($_GET["id"]);

      $desarrollocomite = new desarrollocomite(); //?
      $desa = $this->modelo->ObtenerDesarrolloComite($_GET["id"]);


      require_once "vista/admin/cabecera/cabecera.php";
      require_once "vista/usuario/contenido/consultar.php";

      require_once "vista/admin/footer/footer.php";
    }
  }


  public function FormCrearimp2()
  {



    if (isset($_GET['id'])) {


      $p = $this->modelo->Obtener($_GET['id']);
      $participantes = new participantes(); //?
      $parti = $this->modelo->ObtenerParticipantes($_GET["id"]);

      require "vista/usuario/contenido/pdf.php";
    }
  }



  public function FormCrearRar()
  {



    if (isset($_GET['id'])) {


      $p = $this->modelo->Obtener($_GET['id']);
      $participantes = new participantes(); //?
      $parti = $this->modelo->ObtenerParticipantes($_GET["id"]);

      $rar = new Rar(); //?
      $ra = $this->modelo->ObtenerRarr($_GET["id"]);


      require_once "Archivoss/rar.php";

      require_once "vista/admin/footer/footer.php";
    }
  }

  public function FormCrearusu()
  {

    if (isset($_GET['id'])) {


      $p = $this->modelo->Obtener($_GET['id']);




      require_once "vista/usuario/cabecera/cabecera.php";
      require_once "vista/usuario/contenido/consultar.php";

      require_once "vista/usuario/footer/footer.php";
    }
  }


  function Menu() // este es el menu de citas que ve el paciente
  {
    $acta = new acta(); //?
    $actal = $this->modelo->listUnic($_GET["id"]);
    //objet de tipo list


    //  $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba

    require_once "vista/admin/cabecera/cabecera.php";
    require_once "vista/admin/contenido/actas.php";
    require_once "vista/admin/footer/footer.php";
  }

  public function FormCrearficha()
  {

    $fun = new funcionario();
    $funco = $fun->funcio();

    $reg = new reglamento();
    $reca = $reg->obtenerReglamento();

    $med = new medidaF();
    $medida = $med->obtenermedida_formativa();


    if (isset($_GET['id'])) {


      $p = $this->modelo->Obtenercontenido($_GET['id']);



      require_once "vista/admin/cabecera/cabecera.php";
      require_once "vista/admin/contenido/principal.php";

      require_once "vista/admin/footer/footer.php";
    }
  }
}
