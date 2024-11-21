<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Instructores</title>
    <!-- Importar Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div id="content">
        <br>
        <center><h1>Instructores</h1></center>
        <div class="card">
            <div class="card-body">
                <br>
                <table class="table" id="tabla">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><i class="fa-solid fa-user"></i> Nombre</th>
                            <th scope="col"><i class="fa-solid fa-user"></i> Apellido</th>
                            <th scope="col"><i class="fa-solid fa-phone"></i> Teléfono</th>
                            <th scope="col"><i class="fa-solid fa-at"></i> Correo</th>
                            <th scope="col"><i class="fa-solid fa-gear"></i> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->modelo->Listarinstrustor() as $r): ?>
                        <tr>
                            <td><?= $r->nombre ?></td>
                            <td><?= $r->apellido ?></td>
                            <td><?= $r->telefono ?></td>
                            <td><?= $r->correo ?></td>
                            <td>
                                <!-- Botón para editar -->
                                <a href="?c=Instructor&a=FormCrear&id=<?= $r->id_instructor ?>" 
                                   class="btn btn-success" 
                                   style="background-color: #39A900;" 
                                   title="Editar">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- Botón para eliminar -->
                                <a href="?c=Instructor&a=Borrar&id=<?= $r->id_instructor ?>" 
                                   class="btn" 
                                   style="background-color: #39A900;" 
                                   title="Eliminar">
                                   <i class="fas fa-trash text-white"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Inicialización de DataTable -->
                <script>
                    var tabla = document.querySelector("#tabla");
                    var dataTable = new DataTable(tabla);
                </script>
                <!-- Confirmación para eliminar -->
                <script>
                    const usu = () => {
                        Swal.fire({
                            title: 'Eliminar',
                            text: "¿Quieres eliminar a este instructor?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#FF8000',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'No, cancelar!',
                            confirmButtonText: 'Sí, eliminar!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = "?c=Instructor&a=Borrar&id=<?= $r->id_instructor ?>";
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</body>
</html>
