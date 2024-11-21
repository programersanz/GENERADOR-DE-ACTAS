<div id="content"> 
    <br>
    <center>
        <h1>Fichas</h1>
    </center>

    <div class="card-body">
        <table class="table" id="tabla">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nª Ficha</th>
                    <th scope="col">Programa</th>
                    <th scope="col">Jornada</th>
                    <th scope="col">Formación</th>
                    <th scope="col">Fecha inicio (lectiva)</th>
                    <th scope="col">Fecha Fin (lectiva)</th>
                    <th scope="col">Cont</th>
                    <th scope="col">Actas</th> 
                    <th scope="col">Nueva acta</th> 
                    <th scope="col">Editar</th> 
                    <th scope="col">Eliminar</th> 
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

                    <td>
                        <center>
                            <a href="?c=Ficha&a=FormFichaContador&id=<?= htmlspecialchars($r->id_ficha) ?>" 
                               type="button" class="btn" style="background-color: #39A900;">
                                <i class="fas fa-hashtag text-white"></i>
                            </a>
                        </center>
                    </td>
                    <td>
                        <a href="?c=Acta&a=menu&id=<?= htmlspecialchars($r->N_ficha) ?>" 
                           type="button" class="btn" style="background-color: #39A900;">
                            <i class="fas fa-book text-white"></i>
                        </a>
                    </td>
                    <td>
                        <center>
                            <a href="?c=Acta&a=FormCrearficha&id=<?= htmlspecialchars($r->id_ficha) ?>&ficha=<?= htmlspecialchars($r->N_ficha) ?>&acta_contador=<?= htmlspecialchars($r->ficha_contador) ?>" 
                               type="button" class="btn" style="background-color: #39A900;">
                                <i class="fas fa-plus text-white"></i>
                            </a>
                        </center>
                    </td>
                    <td>
                        <a href="?c=Ficha&a=FormCrearficha&id=<?= htmlspecialchars($r->id_ficha) ?>" 
                           type="button" class="btn" style="background-color: #39A900;">
                            <i class="fas fa-pen text-white"></i>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0);" 
                           onclick="fichaEliminar(<?= htmlspecialchars($r->id_ficha) ?>)" 
                           class="btn" style="background-color: #39A900;">
                            <i class="fas fa-trash text-white"></i>
                        </a>
                    </td>
                </tr>
                <?php 
                    endforeach; 
                else:
                ?>
                <tr>
                    <td colspan="11" class="text-center">No se encontraron fichas registradas.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <script>
        function fichaEliminar(idFicha) {
            Swal.fire({
                title: '¿Quieres eliminar esta ficha?',
                text: "Si eliminas esta ficha, se borrará toda la información relacionada con ella.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF8000',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No, cancelar!',
                confirmButtonText: 'Sí, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "?c=Ficha&a=Borrarficha&id=" + idFicha;
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var tabla = document.querySelector("#tabla");
            new DataTable(tabla);
        });
        </script>
    </div>
</div>
