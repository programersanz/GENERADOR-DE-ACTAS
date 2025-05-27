    
<!doctype html>
<html lang="en">
  <head>

  <body class="<?= isset($ocultarMenu) && $ocultarMenu ? 'sin-menu' : '' ?>">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="vista/css/estilos.css" rel="stylesheet" type="text/css">
    <link href="vista/admin/cabecera/estilos.css" rel="stylesheet" type="text/css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <script src="vista/js/alertas.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="icons.js"></script>
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <title><?php echo $titulo ?? 'Fichas'; ?></title>
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
      <li class="nav-item active">
          <a class="nav-link" id="link" href="?c=Usuarios&a=logout" >
          <i class="fas fa-sign-out-alt"></i>
          Cerrar sesión<span class="sr-only">(current) </span></a>
        </li>

      </ul>
    </div>
  </nav>

  <div class="wrapper fixed-left  ">
    <nav id="sidebar">
    <div class="position-static">
      <div class="sidebar-header">

      </div>

      <ul class="list-unstyled components">

        <li>
          <a href="?c=vistas&a=usuPerfil"><i class="fas fa-circle-user"></i>Perfil</a>
        </li>
        <li>
          <a href="?c=vistas&a=ConsultarFicha2"><i class="fas fa-circle-user"></i>Fichas</a>
        </li>

      </ul>
      </div>
    </nav>
    


    
    
