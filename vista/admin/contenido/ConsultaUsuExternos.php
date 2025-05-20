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

    <title>Funcionarios</title>
  </head>
  <body>
    <div id="content">
      <br>
      <center>
        <h1>Funcionarios</h1>
      </center>

      <div class="card">
        <div class="card-body">
          <br>
          <table class="table" id="tabla">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Apellido</th>
                <th scope="col" class="text-center">Documento</th>
                <th scope="col" class="text-center">Correo</th>
                <th scope="col" class="text-center">Cargo</th>
                <th scope="col" class="text-center">
                  <i class="fas fa-cogs"></i> Opciones
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($this->modelo->Listarfuncionario() as $r): ?>
                <tr>
                  <td><?= $r->nombre ?></td>
                  <td><?= $r->apellido ?></td>
                  <td><?= $r->documentof ?></td>
                  <td><?= $r->correof ?></td>
                  <td><?= $r->cargo ?></td>
                  <td class="text-center">
                    <a href="?c=Funcionario&a=FormCrearfuncionario&id=<?= $r->id_funcionario ?>" type="button" style="background-color: #39A900;" class="btn">
                      <i class="fas fa-pen text-white"></i>
                    </a>
                    <a href="?c=Funcionario&a=Borrar&id=<?= $r->id_funcionario ?>" style="background-color: #39A900;" class="btn" onclick="return confirmarEliminar(<?= $r->id_funcionario ?>)">
                      <i class="fas fa-trash-can text-white"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <script>
            // Confirmación de eliminación
            function confirmarEliminar(id) {
              return Swal.fire({
                title: 'Eliminar',
                text: "¿Quieres eliminar a este usuario?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF8000',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No, cancelar!',
                confirmButtonText: 'Si, eliminar!'
              }).then((result) => {
                if (result.isConfirmed) {
                  // Redirigir a la URL de eliminación
                  location.href = "?c=Funcionario&a=Borrar&id=" + id;
                } else {
                  return false;
                }
              });
            }
          </script>

          <script>
            // Inicialización de DataTable
            var tabla = document.querySelector("#tabla");
            var dataTable = new DataTable(tabla);
          </script>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>

