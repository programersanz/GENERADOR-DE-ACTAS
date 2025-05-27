<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Gestión de Usuarios</title>
</head>
<body>
    <div id="content">
        <center><h1>Usuarios</h1></center>
        <div class="card">
            <div class="card-body">
                <table class="table" id="tabla">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><i class="fa-solid fa-list-ol"></i> Nª Acta</th>
                            <th scope="col"><i class="fa-solid fa-user"></i> Nombre</th>
                            <th scope="col"><i class="fa-solid fa-user"></i> Apellido</th>
                            <th scope="col"><i class="fa-solid fa-at"></i> Correo</th>
                            <th scope="col"><i class="fa-solid fa-phone"></i> Teléfono</th>
                            <th scope="col"><i class="fa-solid fa-id-card"></i> Documento</th>
                            <th scope="col"><i class="fa-solid fa-gear"></i> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se genera la lista dinámica -->
                        <?php foreach ($this->modelo->Listarusu() as $r): ?>
                        <tr>
                            <td><?= $r->id ?></td>
                            <td><?= $r->nombre ?></td>
                            <td><?= $r->apellido ?></td>
                            <td><?= $r->correo ?></td>
                            <td><?= $r->telefono ?></td>
                            <td><?= $r->documento ?></td>
                            <td>
                                <a href="?c=Usuarios&a=EditContra&id=<?= $r->id ?>" class="btn btn-success">
                                    <i class="fa-solid fa-lock"></i>
                                </a>
                                <a href="?c=Usuarios&a=Editusu&id=<?= $r->id ?>" class="btn btn-success">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="?c=Usuarios&a=Borrarusu&id=<?= $r->id ?>" class="btn btn-danger">
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
                    var tabla = document.querySelector("#tabla");
                    var dataTable = new DataTable(tabla);
                </script>
            </div>
        </div>
    </div>
</body>
</html>
