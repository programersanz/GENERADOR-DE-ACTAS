
<!doctype html>
<html lang="en">
  <head>
    <body class="<?= isset($ocultarMenu) && $ocultarMenu ? 'sin-menu' : '' ?>">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="vista/admin/cabecera/estilos.css" rel="stylesheet" type="text/css">
    <link href="vista/admin/contenido/estilos.css" rel="stylesheet" type="text/css">
    <link href="vista/css/estilos.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="/IMG/logo-sena-verde.ico">

    
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <script src="vista/js/alertas.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="icons.js"></script>
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
<?php
  $titulos = [
    'ConsultaUsuExternos' => 'Consulta de Funcionarios',
    'usuario' => 'Administradores',
    'ConsultarInstructor' => 'Consulta de Instructores',
    'ConsultarAprendiz' => 'Consulta de Aprendices',
    'ConsultarFicha' => 'Consulta de Fichas',
    'ConsultarPrograma' => 'Consulta de Programas',
    'RegistroUsuExternos' => 'Registro de Funcionarios',
    'RegistroInstructor' => 'Registro de Instructores',
    'RegistroAprendiz' => 'Registro de Aprendices',
    'RegistroFicha' => 'Registro de Fichas',
    'RegistroPrograma' => 'Registro de Programas',
    'Registro' => 'Registro de Administradores',
    'Perfil' => 'Mi Perfil',
    'inicio' => 'Inicio'
  ];

  $tituloPagina = 'Sistema'; // título por defecto

  if (isset($_GET['a']) && isset($titulos[$_GET['a']])) {
    $tituloPagina = $titulos[$_GET['a']];
  } elseif (isset($_GET['c']) && isset($titulos[$_GET['c']])) {
    $tituloPagina = $titulos[$_GET['c']];
  }

  echo "<title>$tituloPagina</title>";
?>
  </head>
 
    
  <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="fas fa-lg fa-bars"></i>
    </button>
    <a class="navbar-brand" href="">

    <img src="multimedia/logogrande.png" class="fixed-left"  width="370" height="65">

    
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

  
      <ul class="navbar-nav ml-auto">
      <div class="borde">


    
        <li class="nav-item active">

          <a class="nav-link" id="link" href="?c=Usuarios&a=logout" >
          <i class="fas fa-sign-out-alt"></i>
          Cerrar sesión<span class="sr-only">(current) </span></a>
        </li>
      

      </ul>
      </div>
    </div>
  </nav>

  <div class="wrapper fixed-left  ">
    <nav id="sidebar">
    <div class="position-static">
      <div class="sidebar-header">

      </div>

      <ul class="list-unstyled components">

      <li>
          <a href="?c=vistas&a=Perfil"><i class="fas fa-circle-user"></i>Perfil</a>
        </li>
       
        <li>
          <a href="#" class="btn-regist"><i class="fas fa-user-cog"></i>Registar
                  <span id="direction" class="fas fa-caret-down first"></span>
          </a>

          <!--sub menú-->
          <ul class="show-regist">
             <li><a href="?c=vistas&a=RegistroUsuExternos">Funcionarios</a></li>
              <li><a href="?c=vistas&a=Registrar">Administrador</a></li>
              <li><a href="?c=vistas&a=RegistroInstructor">Instructor</a></li>
              <li><a href="?c=vistas&a=RegistroAprendiz">Aprendiz</a></li>
              <li><a href="?c=vistas&a=RegistroFicha">Ficha</a></li>
              <li><a href="?c=vistas&a=RegistroPrograma">Programa</a></li>
          </ul>
        </li>

        <li>
          <a href="#" class="btn-consul"><i class="fas fa-user"></i>Consultar
          <span id="directions" class="fas fa-caret-down second"></span>
          </a>
            <!--sub menú-->
          <ul class="show-consul">
          <li><a href="?c=vistas&a=ConsultaUsuExternos">Funcionarios</a></li>
              <li><a href="?c=vistas&a=usuario">Administrador</a></li>
              <li><a href="?c=vistas&a=ConsultarInstructor">Instructor</a></li>
              <li><a href="?c=vistas&a=ConsultarAprendiz">Aprendiz</a></li>
              <li><a href="?c=vistas&a=ConsultarFicha">Ficha</a></li>
              <li><a href="?c=vistas&a=ConsultarPrograma">Programa</a></li>
          </ul>


        </li>
      </ul>
      </div>
    </nav>
    
    <script>
 
       $('.btn-regist').click(function(){
             $('#sidebar ul .show-regist').toggleClass("show");
           });
      $('.btn-consul').click(function(){
             $('#sidebar ul .show-consul').toggleClass("consult");
           });    
    </script>

    
    
