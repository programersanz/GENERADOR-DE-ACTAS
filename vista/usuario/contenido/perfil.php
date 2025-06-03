<!doctype html>
<html lang="en">
<head>
    <!-- Google Fonts: Prompt -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/GENERADOR-DE-ACTAS/vista/admin/contenido/estilos.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Perfil</title>
    
    <div class="modal-content cambiar-clave-modal">

          <style>
        .cambiar-clave-modal .modal-header {
          background-color: #39A900;
          color: white;
          border-bottom: none;
        }

        .cambiar-clave-modal .btn-primary {
          background-color: #39A900;
          border-color: #39A900;
        }

        .cambiar-clave-modal .btn-primary:hover {
          background-color: #2e8b00;
          border-color: #2e8b00;
        }

        .cambiar-clave-modal .close {
          color: white;
          opacity: 1;
        }
        
      </style>

  </head>
 
<body>  
  
  <div id="content">    
    <br>
    <center>
        <div  class="card" style="width: 50rem;">
        <div class="card-body" >
    <br>
    <center>
    <h1>  <i class="fas fa-user"></i> PERFIL </h1>
    </center>

  <br><br>

<form>
<div class="row">
  <div class="col">
    <label for=""><i class="fas fa-user"></i> Nombre</label>
    <input type="text" class="" placeholder="<?=$_SESSION['user']->getNombre();?>" readonly>
  </div>

  <div class="col">
    <label for=""><i class="fas fa-user"></i> Apellido</label>
    <input type="text" class="" placeholder="<?=$_SESSION['user']->getApellido();?>" readonly>
  </div>
</div>

<div class="row">
    <div class="col">
      <label for=""><i class="fas fa-at"></i> Correo</label>
      <input type="text" class="" placeholder="  <?=$_SESSION['user']->getCorreo();?>" readonly>
    </div>
    <div class="col">
      <label for=""><i class="fas fa-phone"></i> Teléfono</label>
      <input type="text" class="" placeholder="<?=$_SESSION['user']->getTelefono();?>" readonly>
    </div>
</div>

    <div class="row">
      <div class="col">
        <br><br>
      </div>
    </div>

<!-- Botón para abrir el modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Cambiar contraseña
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg rounded-4">
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title" id="exampleModalCenterTitle">Cambiar contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-4">
        <form>
          <div class="mb-3">
            <label for="currentPassword" class="form-label">Contraseña actual</label>
            <input type="password" class="form-control" id="currentPassword" placeholder="Contraseña actual" required>
          </div>

          <div class="mb-3">
            <label for="newPassword" class="form-label">Nueva contraseña</label>
            <input type="password" class="form-control" id="newPassword" placeholder="Nueva contraseña" required>
          </div>

          <div class="form-text mb-3 text-muted">
            Asegúrese de que su nueva contraseña sea segura.
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-success">Actualizar contraseña</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


</form>
 


</body>
</html>


