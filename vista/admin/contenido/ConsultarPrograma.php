<div id="content">
    <br>
    <center>
        <h1>Programa</h1>
    </center>
      <!-- Importar Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <div class="card">
        <div class="card-body">
            <br>
            <table class="table" id="tabla">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre Programa</th>
                        <th scope="col"> <i class="fa-solid fa-gear"></i> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->modelo->ListarPrograma() as $r): ?>
                        <tr>
                            <td><?= htmlspecialchars($r->programa) ?></td>
                            <td>
                                <!-- Botón para editar -->
                                <a href="?c=programa&a=EditPrograma&id_programa=<?= $r->id_programa ?>" 
                                   class="btn btn-success" 
                                   style="background-color: #39A900;" 
                                   title="Editar">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- Botón para eliminar con confirmación -->
                                <a href="javascript:void(0);" 
                                   onclick="confirmarEliminacion(<?= $r->id_programa ?>)" 
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
                // Inicializar DataTable
                var tabla = document.querySelector("#tabla");
                var dataTable = new DataTable(tabla);

                // Función para confirmar la eliminación
                function confirmarEliminacion(id) {
                    Swal.fire({
                        title: 'Eliminar',
                        text: "¿Quieres eliminar este programa?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#FF8000',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'No, cancelar!',
                        confirmButtonText: 'Sí, eliminar!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "?c=programa&a=BorrarPro&id_programa=" + id;
                        }
                    });
                }
            </script>
        </div>
    </div>
</div>
