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
                            <th scope="col"><i class="fa-solid fa-hashtag"></i> Documento</th>
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
                            <td><?= $r->documento ?></td>
                            <td>
                                <!-- Botón para editar -->
                                <a href="?c=Instructor&a=FormCrear&id=<?= $r->id_instructor ?>" 
                                   class="btn btn-success" 
                                   style="background-color: #39A900;" 
                                   title="Editar">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <!-- Botón para eliminar -->
<a href="javascript:void(0);" 
   class="btn eliminar-instructor" 
   style="background-color: #39A900;" 
   title="Eliminar" 
   data-id="<?= $r->id_instructor ?>">
   <i class="fas fa-trash text-white"></i>
</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Inicialización de DataTable -->
                <script>
                    window.addEventListener("DOMContentLoaded", () => {
                    const tabla = document.querySelector("#tabla");
                    if (tabla) {
                        const dataTable = new DataTable(tabla);
                        setTimeout(() => {
                        const searchInput = document.querySelector(".dataTable-input");
                        if (searchInput && !searchInput.dataset.iconAdded) {
                            const icon = document.createElement("i");
                            icon.className = "fa fa-search";
                            icon.style.marginLeft = "8px";
                            icon.style.fontSize = "16px";
                            icon.style.color = "#555";
                            searchInput.parentNode.appendChild(icon);
                            searchInput.dataset.iconAdded = "true"; // evitar duplicados
                        }
                        }, 100);
                    }
                    });
                    var tabla = document.querySelector("#tabla");
                    var dataTable = new DataTable(tabla);
                </script>
                <!-- Confirmación para eliminar -->
                <script>
    // Agregar evento a todos los botones de eliminar
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".eliminar-instructor").forEach(boton => {
            boton.addEventListener("click", function() {
                let instructorId = this.getAttribute("data-id");
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
                        location.href = "?c=Instructor&a=Borrar&id=" + instructorId;
                    }
                });
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </div>
        </div>
    </div>
</body>
</html>