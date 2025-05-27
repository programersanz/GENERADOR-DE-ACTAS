<?php $ocultarMenu = true; ?>

<div id="content">
    <br>
    <center>
        <h1> <i class="fas fa-clipboard"></i> ACTAS </h1>
    </center>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="tabla">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"><i class="fa-solid fa-list-ol"></i> N° Acta</th>
                        <th scope="col"><i class="fa-solid fa-hashtag"></i> Ficha</th>
                        <th scope="col"><i class="fa-solid fa-calendar-days"></i> Fecha</th>
                        <th scope="col"><i class="fa-solid fa-gears"></i> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if (isset($actal) && is_array($actal) && count($actal) > 0) {
                    foreach ($actal as $acta): 
                ?> 
                    <tr>
                        <td><i class="fa-solid fa-file-lines text-primary"></i> <?= htmlspecialchars($acta->getN_acta() ?: 'N/A') ?></td>
                        <td><i class="fa-solid fa-id-card text-success"></i> <?= htmlspecialchars($acta->getFicha() ?: 'N/A') ?></td>
                        <td><i class="fa-solid fa-clock text-warning"></i> <?= htmlspecialchars($acta->getFecha() ?: 'N/A') ?></td>
                        <td>
                            <!-- Icono eliminar -->
                            <a href="?c=Acta2&a=Borrar&id=<?= urlencode($acta->getN_acta()) ?>" class="btn btn-sm btn-danger" title="Eliminar acta">
                                <i class="fa-solid fa-trash-can"></i> <span class="d-none d-md-inline">Eliminar</span>
                            </a>
                            <!-- Icono descargar -->
                            <a href="generar_pdf.php?n_acta=<?= urlencode($acta->getN_acta()) ?>&ficha=<?= urlencode($acta->getFicha()) ?>&acta_contador=<?= urlencode($acta->getActa_contador()) ?>" class="btn btn-sm btn-warning" title="Descargar acta en PDF">
                                <i class="fa-solid fa-file-pdf"></i> 
                                <span class="d-none d-md-inline">Descargar</span>
                            </a>


                        </td>
                    </tr>
                <?php 
                    endforeach;
                } else {
                ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            <i class="fa-solid fa-circle-exclamation"></i> No hay actas registradas.
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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
    document.addEventListener("DOMContentLoaded", function () {
        var tabla = document.querySelector("#tabla");
        if (tabla) {
            new DataTable(tabla);
        }
    });
</script>