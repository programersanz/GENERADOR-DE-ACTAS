<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Perfil</title>
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
</form>
 

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Cambiar contraseña
</button>

<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">  Cambiar contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



      <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Contraseña actual</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contraseña actual">
    <br>
    
    <small id="emailHelp" class="form-text text-muted">escriba su contraseña actual y su nueva contraseña </small>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Nueva contraseña</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Neva contraseña">
  </div>
  <div class="form-check">


  </div>
  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrrar</button>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>


