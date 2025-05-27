<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Aprendices</title>
    <!-- Importar Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div id="content">
        <br>
        <center><h1>Aprendices</h1></center>
        <div class="card">
            <div class="card-body">
                <br>
                <table class="table" id="tabla">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><i class="fa-solid fa-id-card"></i> Ficha</th>
                            <th scope="col"><i class="fa-solid fa-file-alt"></i> Tipo</th>
                            <th scope="col"><i class="fa-solid fa-id-badge"></i> Documento</th>
                            <th scope="col"><i class="fa-solid fa-user"></i> Nombre</th>
                            <th scope="col"><i class="fa-solid fa-user"></i> Apellido</th>
                            <th scope="col"><i class="fa-solid fa-envelope"></i> Correo</th>
                            <th scope="col"><i class="fa-solid fa-toggle-on"></i> Estado</th>
                            <th scope="col"><i class="fa-solid fa-pen"></i> Editar</th>
                            <th scope="col"><i class="fa-solid fa-trash-can"></i> Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->modelo->ListarApre() as $r): ?>
                        <tr>
                            <td><?= $r->ficha ?></td>
                            <td><?= $r->Tipo ?></td>
                            <td><?= $r->Numero ?></td>
                            <td><?= $r->Nombre_aprendiz ?></td>
                            <td><?= $r->Apellido_aprendiz ?></td>
                            <td><?= $r->Correo ?></td>
                            <td><?= $r->Estado ?></td>
                            <td>
                                <!-- Botón para editar -->
                                <a href="?c=Aprendiz&a=FormCrear&id=<?= $r->id_aprendiz ?>" 
                                   class="btn btn-success" 
                                   style="background-color: #39A900;" 
                                   title="Editar">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </td>
                            <td>
                                <!-- Botón para eliminar -->
                                <a href="?c=aprendiz&a=BorrarApre&id_aprendiz=<?= $r->id_aprendiz ?>" 
                                   class="btn btn-danger" 
                                   style="background-color: #39A900;" 
                                   title="Eliminar">
                                    <i class="fa-solid fa-trash-can"></i>
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
                // Espera un pequeño tiempo para asegurarse de que se renderice el input
                setTimeout(() => {
                const searchInput = document.querySelector(".dataTable-input");
                if (searchInput) {
                    const icon = document.createElement("i");
                    icon.className = "fa fa-search"; // Usa Font Awesome
                    icon.style.marginLeft = "8px";
                    icon.style.fontSize = "16px";
                    icon.style.color = "#555";

                    // Agrega el icono justo después del input
                    searchInput.parentNode.appendChild(icon);
                }
                }, 100); // espera 100 milisegundos por seguridad
                </script>
                <!-- Confirmación para eliminar -->
                <script>
                    const usu = () => {
                        Swal.fire({
                            title: 'Eliminar',
                            text: "¿Quieres eliminar a este usuario?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#FF8000',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'No, cancelar!',
                            confirmButtonText: 'Sí, eliminar!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = "?c=aprendiz&a=BorrarApre&id_aprendiz=<?= $r->id_aprendiz ?>";
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</body>
</html>
