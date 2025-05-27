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
        <div class="card" style="width: 50rem;">
          <div class="card-body">
            <br>
            <center>
              <h1>  <i class="fas fa-user"></i> PERFIL</h1>
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
                  <input type="text" class="" placeholder="<?=$_SESSION['user']->getCorreo();?>" readonly>
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
          </div>
        </div>
      </center>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
