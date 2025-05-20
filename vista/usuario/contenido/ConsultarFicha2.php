<?php $ocultarMenu = true; ?>

<div id="content"> 
    <br>
    <center>
        <h1>Fichas</h1>
    </center>

    <!-- Botón para "Acta" arriba de la tabla -->
    

    <div class="card-body">
        <table class="table" id="tabla">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">N° Ficha</th>
                    <th scope="col">Programa</th>
                    <th scope="col">Jornada</th>
                    <th scope="col">Tipo Formación</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Fecha Inicio P.</th>
                    <th scope="col">Fecha Fin P.</th>
                    <th scope="col">Ver Acta</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $fichas = $this->modelo->ListarFicha();

                if (!empty($fichas) && is_array($fichas)):
                    foreach ($fichas as $r):
                ?>
                <tr>
                    <td><?= htmlspecialchars($r->N_ficha) ?></td>
                    <td><?= htmlspecialchars($r->programa) ?></td>
                    <td><?= htmlspecialchars($r->jornada) ?></td>
                    <td><?= htmlspecialchars($r->tipo_forma) ?></td>
                    <td><?= htmlspecialchars($r->fecha_inicio) ?></td>
                    <td><?= htmlspecialchars($r->fecha_fin) ?></td>
                    <td><?= htmlspecialchars($r->fecha_iniciop) ?></td>
                    <td><?= htmlspecialchars($r->fecha_finp) ?></td>
                    <td>
                        <!-- Botón Acta en cada fila -->
                        <a href="?c=Acta2&a=Menu&id=<?= htmlspecialchars($r->N_ficha) ?>" 
                        type="button" class="btn" style="background-color: #39A900;">
                        <i class="fas fa-file-signature text-black"></i>  
                        </a>
                    </td>
                </tr>
                <?php 
                    endforeach; 
                else:
                ?>
                <tr>
                    <td colspan="9" class="text-center">No se encontraron fichas registradas.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tabla = document.querySelector("#tabla");
            if (tabla) {
                new DataTable(tabla);
            }
        });

        </script>
    </div>
</div>
