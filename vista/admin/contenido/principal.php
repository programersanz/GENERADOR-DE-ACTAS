<?php if (!isset($contenidoAgenda)) { $contenidoAgenda = ""; } ?>

<div id="content">
    <div class="col">
        <!--<img src="multimedia/logo-naranja.png" class="fixed-righ"  width="200" height="200">-->
        <center>
            <br>
            <h1 class="fixed-center">ACTA DE REUNIÓN</h1>
        </center>
    </div>
    <br>
    <input name="id_ficha" id='id_ficha' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required class="form-control" value="<?=$p->getId_ficha()?>">
    <div class="card w-100">
    <div class="card-body">
        <?php $a = $this->modelo->ObtenerCont($_GET['ficha']) ?>
        <h5>ACTAS CREADAS: <?=$a->cont?></h5>
        <form id="acta" name="acta" class="sign-up-form" onsubmit="event.preventDefault(); guardarActa();">
            <br>
            <center>
                <div class="row">
                    <div class="col">
                        <label for="acta_no">ACTA No:</label>
                        <input name="acta_no" id="acta_no" type="text" style="width:250px;" required class="">
                    </div>
                </div>
            </center>
            <br><br>
            <div class="row">
                <div class="col">
                    <?php $c = $this->modelo->obtenercontador($_GET['ficha']); ?>
                    
                    <label for="ficha">Ficha:</label>
                    <input name="ficha" id="ficha" type="text" oninput="maxlengthNumber(this);" required class="" value="<?=$p->getN_ficha()?>">
                </div>
                <div class="col">
                    <label for="programa">Programa:</label>
                    <input name="programa" id="programa" type="text" required class="" placeholder="programa" value="<?=$p->getPrograma()?>">
                </div>
                <div class="col">
                    <label for="nom_rev">Nombre comité:</label>
                    <select name="nom_rev" id="nom_rev" required class="">
                        <option>Seleccione el comité</option>
                        <option value="COMITÉ ACADÉMICO">COMITÉ ACADÉMICO</option>
                        <option value="COMITÉ DE ETAPA PRODUCTIVA">COMITÉ DE ETAPA PRODUCTIVA</option>
                        <option value="COMITÉ EXTRAORDINARIO DE EVALUACIÓN Y SEGUIMIENTO">COMITÉ EXTRAORDINARIO DE EVALUACIÓN Y SEGUIMIENTO</option>
                        <option value="COMITÉ DE CIERRE">COMITÉ DE CIERRE</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <br>
                    <label for="fecha">FECHA:</label>
                    <input name="fecha" id="fecha" type="date" required class="form-control">
                </div>
                <div class="col">
                    <br>
                    <label for="hora_in">HORA INICIO:</label>
                    <input name="hora_in" id="hora_in" type="time" required class="form-control">
                </div>
                <div class="col">
                    <br>
                    <label for="hora_fin">HORA FIN:</label>
                    <input name="hora_fin" id="hora_fin" type="time" required class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <br>
                    <label for="lu_en">LUGAR Y/O ENLACE:</label>
                    <input name="lu_en" id="lu_en" type="text" required class="form-control" placeholder="Lugar/Enlace">
                </div>
                <div class="col">
                    <br>
                    <label for="direccion">DIRECCIÓN / REGIONAL / CENTRO:</label>
                    <input name="direccion" id="direccion" type="text" required class="form-control" placeholder="Dirección" value="Cl. 15 #31-42">
                </div>
                <div class="col">
                    <br>
                    <label for="ciudad">CIUDAD:</label>
                    <input name="ciudad" id="ciudad" type="text" required class="form-control" placeholder="Ciudad" value="Bogotá D.C.">
                </div>
            </div>

            <br>
            <h3>
            <label for="contenidoAgenda" class="form-label">AGENDA O PUNTOS A DESARROLLAR:</label></h3>
<div class="form-control" id="contenidoAgenda" contenteditable="true"
  style="min-height: 150px; padding: 10px; border: 1px solid #ced4da; border-radius: .375rem; background-color: white; font-size: 1rem; line-height: 1.5;">
  <?php echo htmlspecialchars($contenidoAgenda); ?>
</div>
<input type="hidden" name="agenda" id="contenidoAgenda_hidden">



            <div class="row">
    <div class="col">
        <br>
        <h3>Objetivos</h3>
        <textarea name="objetivos" id="objetivos" cols="60" rows="5" required class="form-control">Se reúne el Comite de evaluacion y de seguimiento de etapa lectiva, como instancia competente para investigar y analizar los casos tanto académicos como disciplinarios de los aprendices de la ficha- <?=$p->getN_ficha()?> de <?=$p->getPrograma()?>.</textarea>
    </div>

    <div class="col">
                        <br>
                        <h3 for="">2.Información conformación de la ficha</h3>
                        <div class="">
                            <div class="">
                                <br>
                                <table class="table" id="tabla">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-center">ESTADO DEL APRENDIZ</th>
                                            <th scope="col" class="text-center">CUENTA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr>
                                            <td><H5>EN FORMACION</H5></td>
                                            <?php $a=$this->modelo->ObtenerFormacion($_GET['ficha']) ?>
                                            <td><H5><?=$a->Formacion ?></H5></td>
                                        </tr>
                                        <tr>
                                            <td><H5>TRASLADADO</H5></td>
                                            <?php $b=$this->modelo->ObtenerTrasladado($_GET['ficha']) ?>
                                            <td><H5><?=$b->Trasladado ?></H5></td>
                                        </tr>
                                        <tr>
                                            <td><H5>CANCELADO</H5></td>
                                            <?php $c=$this->modelo->ObtenerCancelado($_GET['ficha']) ?>
                                            <td><H5><?=$c->Cancelado ?></H5></td>
                                        </tr>
                                        <tr>
                                            <td><H5>RETIRO VOLUNTARIO</H5></td>
                                            <?php $d=$this->modelo->ObtenerRetiro($_GET['ficha']) ?>
                                            <td><H5><?=$d->Retiro ?></H5></td>
                                        </tr>
                                        <tr>
                                            <td><H5>CONDICIONADO</H5></td>
                                            <?php $e=$this->modelo->ObtenerCondicionado($_GET['ficha']) ?>
                                            <td><H5><?=$e->Condicionado ?></H5></td>
                                        </tr>
                                        <tr>
                                            <td><H5>APLAZADO</H5></td>
                                            <?php $f=$this->modelo->ObtenerAplazado($_GET['ficha']) ?>
                                            <td><H5><?=$f->Aplazado ?></H5></td>
                                        </tr>
                                        <tr>
                                            <td><H5>SUMA TOTAL</H5></td>
                                            <td><H5><?= $total= $a->Formacion + $b->Trasladado + $c->Cancelado + $d->Retiro + $e->Condicionado + $f->Aplazado ?></H5></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>


<?php 
$zz = 0;
$r = 1;
foreach ($this->modelo->ListarActas() as $r):
?>
<?php
$r->n_acta + 1;
endforeach;
?>

<br>
<p>

<!-- 1. inicio participantes-->

<div class="row">
    <div class="participantes">
        <br>
        <center>
            <h3>1. Participantes:</h3>
        </center>
        <p>
        <p>Acorde a reglamento acuerdo 009 del 2024 artículo 48, este Comité está conformado por los siguientes integrantes quienes tendrán voz y voto:
            <br><br>
            a) Un Instructor del programa de formación, en representación del equipo ejecutor del grupo del programa que será designado por el subdirector del Centro.<br>
            b) El Coordinador de Formación del Centro o quien este designe.<br>
            c) El Coordinador Académico o quien este designe, quien realiza citación al comité y acta respectiva.
            <br><br>
            Los siguientes integrantes quienes tendrán voz y no voto: 
            <br><br>
            a) El representante de los aprendices de Centro de formación de la respectiva modalidad del programa, en su ausencia el suplente.<br>
            b) El aprendiz vocero del grupo de formación.
            <br><br>
            Teniendo en cuenta el parágrafo 2. Se realizó invitación a representantes del área de bienestar al aprendiz a las sesiones del comité de evaluación y seguimiento para que ayuden al comité a tomar una decisión más objetiva. Quienes tendrán voz, pero no Voto.</p>

            <div class="part">
  <center>
    <datalist id="nombres-lista">
      <?php foreach ($funco as $fun): ?>
        <option value="<?= htmlspecialchars($fun->getNombre() . ' ' . $fun->getApellido(), ENT_QUOTES, 'UTF-8') ?>">
      <?php endforeach; ?>
    </datalist>

    <input type="hidden" name="n_acta" value="<?= $zz + 1 ?>">

    <!-- 🟦 Contenedor gris con bordes redondeados -->
    <div style="background-color: #f2f2f2; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin: auto; max-width: 100%; overflow-x: auto;">

      <!-- 🟦 Tabla con ancho mínimo para mantener estructura -->
      <table class="tablas" id="table" style="margin: auto; min-width: 900px; table-layout: fixed; border-collapse: separate; border-spacing: 10px;">
        <thead class="t-head">
          <tr>
            <th scope="col">Nombres y Apellidos</th>
            <th scope="col">Cargo</th>
            <th scope="col">Asistencia</th>
          </tr>
        </thead>
        <tbody class="t-body">
          <?php for ($i = 0; $i < 3; $i++): ?>
            <tr>
              <td>
                <input type="hidden" name="n_acta[]" value="<?= $zz + 1 ?>">
                <input list="nombres-lista" name="nombre[]" class="form-control" style="width: 100%; height: 50px;"
                  placeholder="Escriba nombre o apellido" required
                  oninvalid="this.setCustomValidity('Por favor, seleccione o escriba un nombre válido.')"
                  oninput="this.setCustomValidity('')">
              </td>
              <td>
                <select name="cargo[]" class="form-control" style="width: 100%; height: 50px;" required>
                  <option value="" disabled selected>Seleccione un cargo</option>
                  <option value="instructor jefe de taller">instructor jefe de taller</option>
                  <option value="instructora jefe de taller">instructora jefe de taller</option>
                  <option value="Instructor">Instructor</option>
                  <option value="Instructora">Instructora</option>
                  <option value="Funcionario de apoyo a Bienestar de Aprendices">Funcionario de apoyo a Bienestar de Aprendices</option>
                  <option value="Coordinadora Académica">Coordinadora Académica</option>
                  <option value='Representante centro formación'>Representante centro formación</option>
                  <option value="Representante de Contrato de Aprendizaje">Representante de Contrato de Aprendizaje</option>
                  <option value="Vocero de la ficha">Vocero de la ficha</option>
                  <option value="Vocera de la ficha">Vocera de la ficha</option>
                  <option value="Subvocero de la ficha">Subvocero de la ficha</option>
                  <option value="Subvocera de la ficha">Subvocera de la ficha</option>
                  <option value="Representante Profesional Integral">Representante Profesional Integral</option>
                </select>
              </td>
              <td>
                <select name="asistencia[]" class="form-control" style="width: 100%; height: 50px;" required>
                  <option value="" disabled selected>Seleccione asistencia</option>
                  <option value="Asistió">Asistió</option>
                  <option value="No Asistió">No Asistió</option>
                </select>
              </td>
            </tr>
          <?php endfor; ?>
        </tbody>
      </table>
      </div>        
      <!-- Botones dentro del contenedor -->
      <input type="hidden" id="contador-filas" value="3">
      <br>
      <button type="button" id="add" style="background-color: #39A900; color:white;" class="bt">Agregar</button>
      <button type="button" id="del" style="background-color: #39A900; color:white;" class="bt">Eliminar</button>
      <br><br>
    

  </center>
</div>

<script>
    var numeroActa = <?= $zz + 1 ?>;
    $(document).ready(function () {
        $("#add").click(function () {
            let cant = parseInt($('#contador-filas').val());
            cant++;
            $('#contador-filas').val(cant);

            var nuevaFila = "<tr>";
            nuevaFila += "<td>" +
                "<input class='form-control' type='hidden' name='n_acta[]' value='" + numeroActa + "'>" +
                "<input list='nombres-lista' name='nombre[]' class='form-control' style='width: 350px; height: 50px;' required " +
                "oninvalid='this.setCustomValidity(\"Por favor, seleccione o escriba un nombre válido.\")' " +
                "oninput='this.setCustomValidity(\"\")' placeholder='Escriba nombre o apellido'>" +
                "</td>";
            nuevaFila += "<td>" +
                "<select name='cargo[]' class='form-control' style='width:320px; height:50px;' required>" +
                "<option value='' disabled selected>Seleccione un cargo</option>" +
                "<option value='instructor jefe de taller'>instructor jefe de taller</option>" +
                "<option value='instructora jefe de taller'>instructora jefe de taller</option>" +
                "<option value='Instructor'>Instructor</option>" +
                "<option value='Instructora'>Instructora</option>" +
                "<option value='Funcionario de apoyo a Bienestar de Aprendices'>Funcionario de apoyo a Bienestar de Aprendices</option>" +
                "<option value='Coordinadora Académica'>Coordinadora Académica</option>" +
                "<option value='Representante centro formación'>Representante centro formación</option>" +
                "<option value='Representante de Contrato de Aprendizaje'>Representante de Contrato de Aprendizaje</option>" +
                "<option value='Vocero de la ficha'>Vocero de la ficha</option>" +
                "<option value='Vocera de la ficha'>Vocera de la ficha</option>" +
                "<option value='Subvocero de la ficha'>Subvocero de la ficha</option>" +
                "<option value='Subvocera de la ficha'>Subvocera de la ficha</option>" +
                "<option value='Representante Profesional Integral'>Representante Profesional Integral</option>" +
                "</select>" +
                "</td>";
            nuevaFila += "<td>" +
                "<select name='asistencia[]' class='form-control' style='width:250px; height:50px;' required>" +
                "<option value='' disabled selected>Seleccione asistencia</option>" +
                "<option value='Asistió'>Asistió</option>" +
                "<option value='No Asistió'>No Asistió</option>" +
                "</select>" +
                "</td>";
            nuevaFila += "</tr>";
            $("#table tbody").append(nuevaFila);

        });

        $("#del").click(function () {
            var trs = $("#table tr").length;
            if (trs > 1) {
                let cant = parseInt($('#contador-filas').val());
                cant--;
                $('#contador-filas').val(cant);
                $("#table tr:last").remove();
            }
        });

        $("form").on("submit", function (e) {
            let isValid = true;
            $("input[name='nombre[]']").each(function () {
                if ($(this).val().trim() === "") {
                    alert("Por favor, asegúrese de completar todos los campos de Nombres y Apellidos.");
                    isValid = false;
                    return false;
                }
            });
            $("select[name='cargo[]']").each(function () {
                if ($(this).val() === null || $(this).val() === "") {
                    alert("Por favor, seleccione un cargo.");
                    isValid = false;
                    return false;
                }
            });
            $("select[name='asistencia[]']").each(function () {
                if ($(this).val() === null || $(this).val() === "") {
                    alert("Por favor, seleccione el estado de asistencia.");
                    isValid = false;
                    return false;
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });
    });
</script>

<!-- 2. Verificar actas anteriores-->
<div class="row">
    <div class="col">
        <h3>2. Verificación del acta(s) anteriores(es)</h3>

        <?php 
        $ficha = intval(trim($_GET['ficha']));

        // Buscar la última acta registrada para la ficha
        $acta_anterior = $this->modelo->obtenerVerificacion($ficha);

        if ($acta_anterior) {
            // Si encontró una acta anterior, mostrar todos los campos
            echo "<p><strong>Acta Comité No. {$acta_anterior->n_acta} - " . date("d/m/Y", strtotime($acta_anterior->fecha)) . "</strong></p>";
            echo "<p><strong>Revisor:</strong> {$acta_anterior->nom_rev}</p>";
            echo "<p><strong>Ficha:</strong> {$acta_anterior->ficha}</p>";
            echo "<p><strong>Programa:</strong> {$acta_anterior->programa}</p>";
        } else {
            // No encontró una anterior (puede ser la primera)
            echo "<p>ESTA ES LA PRIMERA ACTA REGISTRADA</p>";
        }
        ?>
    </div>
</div>

<!-- 3. casos anteriores al comité-->

<div class="row">
    <div class="col">
        <h3>3. Casos anteriores al comité</h3>
        <br>

        <?php 
        // Obtener ficha desde la URL
        $ficha = isset($_GET['ficha']) ? intval($_GET['ficha']) : null;

        if ($ficha === null) {
            echo "<p style='color: red;'>Error: No se recibió el número de ficha correctamente.</p>";
        } else {
            // Buscar las conclusiones anteriores si `c_contador` es 1, 2 o 3
            $casos_anteriores = $this->modelo->obtenerConclusionesAnt($ficha);

            if (!empty($casos_anteriores)): 
                foreach ($casos_anteriores as $caso): ?>
                    <div class="caso">
                        <p><strong>Ficha:</strong> <?= htmlspecialchars($caso->n_ficha) ?></p>
                        <p><strong>Aprendiz:</strong> <?= htmlspecialchars($caso->Aprendiz) ?></p>
                        <p><strong>Tipo de conducta:</strong> <?= htmlspecialchars($caso->tipo_con) ?></p>
                        <p><strong>Documento:</strong> <?= htmlspecialchars($caso->documento_con) ?></p>
                        <p><strong>Medida:</strong> <?= htmlspecialchars($caso->medida) ?></p>
                        <p><strong>Descripción:</strong> <?= htmlspecialchars($caso->descripcion_m) ?></p>
                        <p><strong>Cumplimiento:</strong> <?= htmlspecialchars($caso->cumplimiento) ?></p>
                        <p><strong>Acta:</strong> <?= htmlspecialchars($caso->n_acta) ?></p>
                        <hr>
                    </div>
                <?php endforeach;
            else: ?>
                <p>No hay casos anteriores registrados para la ficha <?= $ficha ?>.</p>
            <?php endif;
        }
        ?>
    </div>
</div>


<!-- 4. Casos Particulares -->
<div class="row">
  <div class="col">
    <br>
    <center>
      <h3>4. Casos Particulares</h3>

      <!-- Campo oculto para la ficha -->
      <input name="id_ficha" id="id_ficha" type="hidden" maxlength="25"
        oninput="maxlengthNumber(this);" required class="form-control"
        value="<?= $p->getId_ficha() ?>">

      <!-- Contenedor responsivo con scroll horizontal -->
      <div style="overflow-x: auto; width: 100%;">
        <table class="tablas" id="table3"
          style="margin: auto; min-width: 1100px; table-layout: fixed; border-collapse: separate; border-spacing: 10px;">
          <thead>
            <tr>
              <th>Aprendiz</th>
              <th>Tipo Doc</th>
              <th>Documento</th>
              <th>Instructor</th>
              <th>Descripción</th>
              <th>Tipo Falta</th>
              <th>Reglamento</th>
              <th>Clasificación falta</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input class="parti" type="text" name="nombre_aprendiz[]" placeholder="Aprendiz"
                  style="width: 100%; min-width: 100px;" required /></td>
              <td>
                <select name="tipo[]" class="parti" style="width: 100%;" required>
                  <option selected>Tipo doc</option>
                  <option value="C.C">C.C</option>
                  <option value="T.I">T.I</option>
                  <option value="CE">C.E</option>
                  <option value="T.E">T.E</option>
                  <option value="P.A.S">P.A.S</option>
                </select>
              </td>
              <td><input class="parti" type="text" name="documento[]" placeholder="Documento"
                  style="width: 100%;" required /></td>
              <td><input class="parti" type="text" name="nombre_its[]" placeholder="Instructor"
                  style="width: 100%;" required /></td>
              <td><textarea class="area" name="description[]"
                  style="width: 100%; min-width: 150px; height: 55px;" placeholder="Descripción" required></textarea></td>
              <td>
                <select name="falta[]" class="parti" style="width: 100%;">
                  <option value="Académica">Académica</option>
                  <option value="Disciplinaria">Disciplinaria</option>
                  <option value="Académica y Disciplinaria">Académica y Disciplinaria</option>
                </select>
              </td>
              <td>
                <select name="reglamento[]" class="selectt" style="width: 100%;" required>
                  <option selected>N/A</option>
                  <?php foreach ($reca as $reg): ?>
                  <option value="<?= $reg->getNombre_falta() ?>"><?= $reg->getNombre_falta() ?></option>
                  <?php endforeach; ?>
                </select>
              </td>
              <td>
                <select name="cla_falta[]" class="parti" style="width: 100%;">
                  <option value="Leve.">Leve.</option>
                  <option value="Grave.">Grave.</option>
                  <option value="Gravisima.">Gravisima.</option>
                </select>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <br>
      <button id="add3" style="background-color: #39A900; color:white;" class="bt">Agregar</button>
      <button id="del3" style="background-color: #39A900; color:white;" class="bt">Eliminar</button>
      <br><br>
    </center>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#add3").off("click").on("click", function(e) {
        e.preventDefault();

        const nuevaFila = `
        <tr>
            <td><input class="parti" type="text" name="nombre_aprendiz[]" placeholder="Aprendiz" required /></td>
            <td>
                <select name="tipo[]" class="parti" required>
                    <option selected>Tipo doc</option>
                    <option value="C.C">C.C</option>
                    <option value="T.I">T.I</option>
                    <option value="CE">C.E</option>
                    <option value="T.E">T.E</option>
                    <option value="P.A.S">P.A.S</option>
                </select>
            </td>
            <td><input class="parti" type="text" name="documento[]" placeholder="Documento" required /></td>
            <td><input class="parti" type="text" name="nombre_its[]" placeholder="Instructor" required /></td>
            <td><textarea class="area" name="description[]" style="width:310px; height:55px;" placeholder="Descripción" required></textarea></td>
            <td>
                <select name="falta[]" class="parti">
                    <option value="Académica">Académica</option>
                    <option value="Disciplinaria">Disciplinaria</option>
                    <option value="Académica y Disciplinaria">Académica y Disciplinaria</option>
                </select>
            </td>
            <td>
                <select name="reglamento[]" class="selectt" required>
                    <option selected>N/A</option>
                    <?php foreach ($reca as $reg): ?>
                        <option value="<?= $reg->getNombre_falta() ?>"><?= $reg->getNombre_falta() ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select name="cla_falta[]" class="parti">
                    <option value="Leve.">Leve.</option>
                    <option value="Grave.">Grave.</option>
                    <option value="Gravisima.">Gravisima.</option>
                </select>
            </td>
        </tr>
        `;

        $("#table3 tbody").append(nuevaFila);
    });

    $("#del3").off("click").on("click", function(e) {
        e.preventDefault();
        if ($("#table3 tbody tr").length > 1) {
            $("#table3 tbody tr:last").remove();
        } else {
            alert("Debe quedar al menos una fila en la tabla.");
        }
    });
});
</script>



<!-- Sección 5: Hechos actuales -->
<div class="row">
  <div class="col">
    <br>
    <h5 for="">5. Hechos actuales</h5>
    <div class="form-control" id="hechos_actuales" contenteditable="true"
      style="min-height: 150px; padding: 10px; border: 1px solid #ced4da; border-radius: .375rem; background-color: white; font-size: 1rem; line-height: 1.5;">
      <?php echo htmlspecialchars($hechos_actuales ?? ""); ?>
    </div>
    <input type="hidden" name="hechos_actuales" id="hechos_actuales_hidden">
  </div>
</div>

<!-- Sección 6: Desarrollo del Comité -->

<div class="row">
    <div class="col">
        <br>
        <center>
            <h3>6. Desarrollo Comité</h3>
            <br>
             
            <table class="tablas" id="table4" style="width: 94%;">
            <!-- Campos ocultos -->
            <input type="hidden" name="n_acta" value="<?= isset($r->n_acta) ? htmlspecialchars($r->n_acta) : ''; ?>">
            <input type="hidden" name="acta_contador" value="<?= isset($c->acta_contador) ? htmlspecialchars($c->acta_contador) : ''; ?>">

            <tbody class="bloque">
                <tr>
                    <td><input class="parti" type="text" name="d_nombre_aprendiz[]" placeholder="Nombre aprendiz" style="width: 94%;" /></td>
                    <td><textarea class="comit" name="d_descargos_its[]" placeholder="Descargos instructor A" style="width: 94%;"></textarea></td>
                    <td><textarea class="comit" name="d_descargos_its_b[]" placeholder="Descargos instructor B" style="width: 94%;"></textarea></td>
                </tr>
                <tr>
                    <td><textarea class="comit" name="d_descargos_its_c[]" placeholder="Descargos instructor C" style="width: 94%;"></textarea></td>
                    <td><textarea class="comit" name="d_descargos_its_d[]" placeholder="Descargos instructor D" style="width: 94%;"></textarea></td>
                    <td><textarea class="comit" name="d_descargos_aprendiz[]" placeholder="Descargos aprendiz" style="width: 94%;"></textarea></td>
                </tr>
                <tr>
                    <td><textarea class="comit" name="medida_formativa_comite[]" placeholder="Medida formativa del comité" style="width: 94%;"></textarea></td>
                    <td><textarea class="comit" name="inf_jefe_taller[]" placeholder="Informe jefe de taller" style="width: 94%;"></textarea></td>
                    <td><textarea class="comit" name="inf_instructores[]" placeholder="Informe instructores" style="width: 94%;"></textarea></td>
                </tr>
            </tbody>
          </table>

            <br>

            <!-- Botones para agregar/eliminar filas dinámicamente -->
            <button id="add4" style="background-color: #39A900; color:white;" class="bt">Agregar</button>
            <button id="del4" style="background-color: #39A900; color:white;" class="bt">Eliminar</button>

            <br><br>
        </center>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const table = document.getElementById("table4");
    const addBtn = document.getElementById("add4");
    const delBtn = document.getElementById("del4");

    addBtn.addEventListener("click", function (e) {
        e.preventDefault();

        const bloques = table.querySelectorAll("tbody.bloque");
        const ultimoBloque = bloques[bloques.length - 1];
        const nuevoBloque = ultimoBloque.cloneNode(true);

        // Limpiar los campos del nuevo bloque
        nuevoBloque.querySelectorAll("input, textarea").forEach(el => el.value = "");

        table.appendChild(nuevoBloque);
    });

    delBtn.addEventListener("click", function (e) {
        e.preventDefault();

        const bloques = table.querySelectorAll("tbody.bloque");
        if (bloques.length > 1) {
            table.removeChild(bloques[bloques.length - 1]);
        }
    });
});
</script>

 <!-- Sección 7: Informe Vocero y Subvocero -->
<div class="row">
  <div class="col">
    <br>
    <h5>7. Informe del vocero</h5>
    <div class="form-control" id="informe_vocero" contenteditable="true"
      style="min-height: 150px; padding: 10px; border: 1px solid #ced4da; border-radius: .375rem; background-color: white; font-size: 1rem; line-height: 1.5;">
      <?php echo htmlspecialchars($informe_vocero ?? ""); ?>
    </div>
    <input type="hidden" name="informe_vocero" id="informe_vocero_hidden">
  </div>
</div>

<div class="row">
  <div class="col">
    <br>
    <h5> Informe del sub-vocero</h5>
    <div class="form-control" id="informe_subvocero" contenteditable="true"
      style="min-height: 150px; padding: 10px; border: 1px solid #ced4da; border-radius: .375rem; background-color: white; font-size: 1rem; line-height: 1.5;">
      <?php echo htmlspecialchars($informe_subvocero ?? ""); ?>
    </div>
    <input type="hidden" name="informe_subvocero" id="informe_subvocero_hidden">
  </div>
</div>
  

 <!-- <form id="conclu" name="conclu" method="post" action="?c=acta&a=save">-->
<br>

<p>
<?php 
      $c=0;
      $c=$this->modelo->obtenercontador($_GET['ficha']);
  ?>
  <div class="row">
    <div class="col">
    <br>
    <div>
    <center>
                        
                        <h3>Tomando como referencia el reglamento del aprendiz según acuerdo 009 del 2024</h3>
                    </center>
                        <p> <p>ARTÍCULO 8o. Además de los consagrados en la Constitución y las leyes y demás normas
colombianas, el aprendiz SENA es responsable de cumplir con los siguientes deberes, obligaciones y
responsabilidades académicos, disciplinarios y administrativos:
Son deberes del Aprendiz Sena durante el proceso de ejecución de la formación, los siguientes:
                            <br>
                            <br>
                            <br>
                            2. Conocer y cumplir el reglamento del aprendiz y demás normas del SENA asociadas con su
proceso formativo.
                            <br>
                            3. Actuar siempre teniendo como base los principios y valores institucionales.
                            <br>
                            5. Asistir con puntualidad a todas las actividades propias del proceso de formación.
                            <br>
                            <br>
                            Los siguientes integrantes quienes tendrá voz y no voto: 
                            <br>
                            <br>
                            6. Cumplir con todas las actividades de su proceso formativo, presentando las evidencias según la
planeación pedagógica, guías de aprendizaje y cronograma, en los plazos o en la oportunidad que
estas deban presentarse o reportarse, a través de los medios dispuestos para ello.
                            <br>
                            19. Atender las indicaciones de identificación de usuarios que disponga la entidad para el ingreso a
                            las sedes del SENA y a los ambientes de formación.
                            <br>
                            ARTÍCULO 10. Se considerarán prohibiciones para los Aprendices del Sena, las siguientes:
                            <br>
                            2. Suplantar identidad en cualquier trámite académico o administrativo del SENA.
                            <br>
                            4. Plagiar, materiales, trabajos y demás documentos generados en los grupos de trabajo o producto
del trabajo en equipo institucional, así como en actividades evaluativas del proceso formativo o en
concursos, juegos o competencias de cualquier carácter.
                            <br>
                           6. Ingerir, ingresar, comercializar, promocionar o suministrar bebidas alcohólicas o sustancias
psicoactivas, dentro de las instalaciones físicas y virtuales del SENA o en los ambientes formativos
SENA, o ingresar a la entidad en estado que indique alteraciones de conducta ocasionadas por el
consumo de estas o bajo su efecto.
                            <br>
                            9. Cometer, ser cómplice o copartícipe de delitos contra la comunidad educativa o contra la
Institución.       
                            <br>
                            ARTÍCULO 27. CUMPLIMIENTO SATISFACTORIO DEL PROCESO FORMATIVO. Se configura cuando el
aprendiz presenta evidencias de aprendizaje, idóneas y pertinentes, en las fechas establecidas,
asiste y participa activamente en actividades presenciales o virtuales concertadas en su ruta de
aprendizaje. Se configura como un incumplimiento la falta de ejecución de lo anteriormente
definido. Los incumplimientos se catalogan en incumplimientos justificados y no justificados.
Además, se constituyen en faltas académicas o disciplinarias según sea el caso:
                            <br>
                            ARTÍCULO 29. Incumplimiento injustificado:
                            <br>
                            Se configura incumplimiento injustificado en los siguientes casos:
                            <br>
                            1. Cuando el aprendiz no reporta, ni justifica estos incumplimientos ante el instructor, previamente
o dentro de los cinco (5) días hábiles siguientes a su ocurrencia con las respectivas evidencias,
conforme a los plazos previstos en el anterior artículo.
                            <br>
                            2. Cuando el aprendiz reporta su inasistencia en la oportunidad y dentro del plazo establecido pero
las causas y soportes no corresponden a las establecidas para incumplimientos justificados.
                            <br>
                            El Instructor o Tutor debe efectuar el seguimiento y reporte en el sistema para la gestión de la
formación.
                            <br>
                            Según los informes descritos por los instructores y de acuerdo a los apartes del reglamento
contemplados la medida formativa definida es:
    <br>
    <br>
    <center>
                        
                        <h3>DESERCIÓN</h3>
                    </center>
                            <br>
                            a) En la formación presencial, excepto la complementaria, tener tres (3) días continuos de
inasistencia injustificada o acumular cinco (5) días no continuos de inasistencia injustificada
durante todo el proceso de formación.
                            <br>
                            <br>

                            <center>
                        
                        <h3>LLAMADO DE ATENCIÓN ESCRITO</h3>
                    </center>
                            <br>
                            Los llamados de atención deben ser por escrito, el aprendiz puede recibir hasta dos (2) llamados de
atención por fase del proyecto formativo, por parte de los instructores integrantes del equipo
ejecutor, para alcanzar el o los resultados de aprendizaje.
                            <br>
                            El segundo llamado de atención debe ir acompañado de orientaciones académicas escritas basadas
en estrategias pedagógicas que le permitan al aprendiz superar el resultado de aprendizaje y
acatarlas de modo inmediato. Las orientaciones académicas no son planes de mejoramiento.
                            <br>
                            <br>
                            <center>
                        
                        <h3>PLAN DE MEJORAMIENTO DISCIPLINARIO</h3>
</center>
                            <br>
                            No deberá haber inasistencias ni retardos, en el horario que se determine o se incurrirá en plan de
mejoramiento integral.
<br>
                            <br>
                            <center>
                        
                        <h3>PLAN DE MEJORAMIENTO ACADÉMICO</h3>
</center>
                            <br>
                            Deberá cumplir con todas las evidencias acordadas desde el inicio del trimestre en el plan de
trabajo y evaluación o se incurrirá en plan de mejoramiento Integral.
                            <br>
                            <br>    
                            <center>
                        
                        <h3>PLAN DE MEJORAMIENTO ACADÉMICO Y DISCIPLINARIO</h3>
</center>

                            <br>
                            Deberá cumplir con todas las evidencias acordadas desde el inicio del trimestre en el plan de
trabajo y evaluación Y No deberá haber inasistencias ni retardos, en el horario que se determine o
se incurrirá en plan de mejoramiento Integral.
                            <br>
                            <br>
        <center>
                        
                        <h3>PLAN DE MEJORAMIENTO INTEGRAL POR COMITÉ</h3>
</center>
                            <br>
                            No deberá haber inasistencias ni retardos, en el horario que se determine y deberá cumplir con
todas las evidencias acordadas desde el inicio del trimestre en el plan de trabajo y evaluación o se
incurrirá en Condicionamiento de Matrícula.
                            <br>
                            <br>
                            <center>
                        
                        <h3>CONDICIONAMIENTO DE LA MATRÍCULA</h3>
</center>
                            <br>    
                            Medida académica sancionatoria que se impone al aprendiz que incurra en una falta académica o
disciplinaria, previo agotamiento de la aplicación de las medidas formativas o disciplinarias. Esta
decisión será determinada en el acto administrativo que ordene el condicionamiento de matrícula.
Una vez quede en firme el condicionamiento de la matrícula, el aprendiz perderá durante el tiempo
que dure el mismo, los estímulos e incentivos que esté recibiendo, si los tuviere. Transcurrido este
tiempo el condicionamiento no es superado se procederá a recomendar a la Subdirección de
Centro realizar la Cancelación de la Matrícula.
<br>
                            <br>
                            <div class="row">
    <div class="col">
        <br>
        <center>
            
            <form id="checklist_form" method="post" action="guardar_checklist.php">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Opción</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Se retira contrato</td>
                            <td>
                                <input type="radio" name="retiro_contrato" value="si" required>
                            </td>
                        </tr>
                        <tr>
                            <td>No se retira contrato</td>
                            <td>
                                <input type="radio" name="retiro_contrato" value="no" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </center>
    </div>
</div>
                            <br>
                            <center>
                        
                        <h3>CANCELACIÓN DE LA MATRÍCULA</h3>    
                        </center>
                            <br>
                            Acto administrativo que se origina cuando persisten en el aprendiz las causales que originaron el
condicionamiento de la matrícula o por faltas catalogadas como graves o gravísimas de acuerdo
con la clasificación determinada, o situaciones que se consideran deserción en este Reglamento.
Una vez en firme la sanción, debe entregar de manera inmediata el carné institucional y ponerse a
paz y salvo por todo concepto.
                            <br>
                            <br>
                            <center>
                            <form id="checklist_form" method="post" action="guardar_checklist.php">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Opción</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Se cita nuevo comite</td>
                            <td>
                                <input type="radio" name="retiro_contrato" value="si" required>
                            </td>
                        </tr>
                        <tr>
                            <td>No se cita nuevoo comite</td>
                            <td>
                                <input type="radio" name="retiro_contrato" value="no" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </center>
    </div>
</div>
<center>
                        <h3>Bienestar de aprendices:</h3>      
                        </center>
                        <br>
                        En bienestar se determinará una actividad de acompañamiento frente a responsabilidad y
                            cumplimiento con las siguientes acciones.

<div class="row">
    <div class="col">
        <br>
        <center>
            
            <form id="checklist_form" method="post" action="guardar_checklist.php">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Opción</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Se retira </td>
                            <td>
                                <input type="radio" name="retiro_contrato" value="si" required>
                            </td>
                        </tr>
                        <tr>
                            <td>No se retira </td>
                            <td>
                                <input type="radio" name="retiro_contrato" value="no" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </center>
    </div>
</div>
</center>

<div class="row">
  <div class="col">
    <div style="text-align: center;">
      <h2>Conclusiones</h2>

      <table class="tablas" id="table2" style="margin: auto; width: 95%; table-layout: fixed; border-collapse: separate; border-spacing: 10px;">
        <thead>
          <tr>
            <th style="width: 20%;">Aprendiz</th>
            <th style="width: 10%;">Tipo doc</th>
            <th style="width: 15%;">Documento</th>
            <th style="width: 15%;">Medida</th>
            <th style="width: 25%;">Descripción</th>
            <th style="width: 15%;">Cumplimiento</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- Ocultos -->
            <input type="hidden" name="n_acta" value="<?= isset($r->n_acta) ? htmlspecialchars($r->n_acta) : ''; ?>">
            <input type="hidden" value="<?= isset($c->acta_contador) ? htmlspecialchars($c->acta_contador) : ''; ?>">

            <!-- Aprendiz -->
            <td style="padding: 5px;">
              <input class="parti" type="hidden" name="c_contador[]" value="<?= $c+1; ?>" />
              <input class="parti" type="hidden" name="n_ficha[]" value="<?= $p->getN_ficha() ?>" />
              <input class="parti" type="hidden" name="n_acta[]" value="<?= $zz+1 ?>" />
              <input class="parti" type="text" name="Aprendiz[]" placeholder="Aprendiz" style="width: 100%; padding: 4px;" required />
            </td>

            <!-- Tipo doc -->
            <td style="padding: 5px;">
              <select name="tipo_con[]" class="parti" style="width: 100%; padding: 4px;" required>
                <option selected>Tipo doc</option>
                <option value="C.C">C.C</option>
                <option value="T.I">T.I</option>
                <option value="CE">C.E</option>
                <option value="T.E">T.E</option>
                <option value="P.A.S">P.A.S</option>
              </select>
            </td>

            <!-- Documento -->
            <td style="padding: 5px;">
              <input class="parti" type="text" name="documento_con[]" placeholder="Documento" style="width: 100%; padding: 4px;" required />
            </td>

            <!-- Medida -->
            <td style="padding: 5px;">
              <select name="medida[]" class="parti" style="width: 100%; padding: 4px;" required>
                <option selected>N/A</option>
                <?php foreach($medida as $med): ?>
                  <option value="<?= $med->getMedida_formativa() ?>"><?= $med->getMedida_formativa() ?></option>
                <?php endforeach; ?>
              </select>
            </td>

            <!-- Descripción -->
            <td style="padding: 5px;">
              <select name="descripcion_m[]" class="select" style="width: 100%; padding: 4px;" required>
                <option selected>N/A</option>
                <?php foreach($medida as $med): ?>
                  <option value="<?= $med->getDescripcion_medida() ?>"><?= $med->getDescripcion_medida() ?></option>
                <?php endforeach; ?>
              </select>
            </td>

            <!-- Cumplimiento -->
            <td style="padding: 5px;">
              <select name="cumplimiento[]" class="select" style="width: 100%; padding: 4px;" required>
                <option selected value="">Seleccione</option>
                <option value="Cumplió">Cumplió</option>
                <option value="No cumplió">No cumplió</option>
                <option value="En proceso">En proceso</option>
              </select>
            </td>
          </tr>
        </tbody>
      </table>

      <br>
      <button id="add2" style="background-color: #39A900; color:white; padding: 10px 20px; border: none; border-radius: 4px;">Agregar</button>
      <button id="del2" style="background-color: #39A900; color:white; padding: 10px 20px; border: none; border-radius: 4px;">Eliminar</button>
      <br><br>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#add2").click(function(e) {
        e.preventDefault();

        var nuevaFila = "<tr>";

        // Aprendiz
        nuevaFila += "<td>" +
            "<input class='parti' type='hidden' name='c_contador[]' value='<?=$c+1;?>'/>" +
            "<input class='parti' type='hidden' name='n_ficha[]' value='<?=$p->getN_ficha()?>'/>" +
            "<input class='parti' type='hidden' name='n_acta[]' value='<?=$zz+1?>'/>" +
            "<input class='parti' type='text' name='Aprendiz[]' placeholder='Aprendiz' style='width: 100%; padding: 4px;' required />" +
        "</td>";

        // Tipo de documento
        nuevaFila += "<td>" +
            "<select name='tipo_con[]' class='parti' style='width: 100%; padding: 4px;' required>" +
                "<option selected>Tipo doc</option>" +
                "<option value='C.C'>C.C</option>" +
                "<option value='T.I'>T.I</option>" +
                "<option value='CE'>C.E</option>" +
                "<option value='T.E'>T.E</option>" +
                "<option value='P.A.S'>P.A.S</option>" +
            "</select>" +
        "</td>";

        // Documento
        nuevaFila += "<td>" +
            "<input class='parti' type='text' name='documento_con[]' placeholder='Documento' style='width: 100%; padding: 4px;' required />" +
        "</td>";

        // Medida
        nuevaFila += "<td>" +
            "<select name='medida[]' class='parti' style='width: 100%; padding: 4px;' required>" +
                "<option selected>N/A</option>" +
                <?php foreach($medida as $med): ?>
                "<option value='<?= $med->getMedida_formativa() ?>'><?= $med->getMedida_formativa() ?></option>" +
                <?php endforeach; ?>
            "</select>" +
        "</td>";

        // Descripción
        nuevaFila += "<td>" +
            "<select name='descripcion_m[]' class='select' style='width: 100%; padding: 4px;' required>" +
                "<option selected>N/A</option>" +
                <?php foreach($medida as $med): ?>
                "<option value='<?= $med->getDescripcion_medida() ?>'><?= $med->getDescripcion_medida() ?></option>" +
                <?php endforeach; ?>
            "</select>" +
        "</td>";

        // Cumplimiento
        nuevaFila += "<td>" +
            "<select name='cumplimiento[]' class='select' style='width: 100%; padding: 4px;' required>" +
                "<option selected value=''>Seleccione</option>" +
                "<option value='Cumplió'>Cumplió</option>" +
                "<option value='No cumplió'>No cumplió</option>" +
                "<option value='En proceso'>En proceso</option>" +
            "</select>" +
        "</td>";

        nuevaFila += "</tr>";

        $("#table2 tbody").append(nuevaFila);
    });

    $("#del2").click(function(e) {
        e.preventDefault();
        var filas = $("#table2 tbody tr").length;
        if (filas > 1) {
            $("#table2 tbody tr:last").remove();
        }
    });
});
</script>

<center>
    <div class="privacidad">
        <div class="col">
            <p class="parrafo">De acuerdo con la Ley 1581 de 2012, Protección de datos personales se debe garantizar la seguridad y protección de los datos personales que se encuentran almacenados en este documento. El servicio Nacional de Aprendizaje SENA solicita la siguiente clasificación de la información:</p>
            <h6>La información de este documento se debe clasificar como:</h6>
            <br>
            <label for="">Pública</label> <input class="parti" type="radio" name="privacidad" id="privacidad" required value="publica"/>
            <label for="">Privado</label> <input class="parti" type="radio" name="privacidad" id="privacidad" required value="privada"/>
            <label for="">Semiprivado</label><input class="parti" type="radio" name="privacidad" id="privacidad" required value="semiprivada"/>
            <label for="">Sensible</label><input class="parti" type="radio" name="privacidad" id="privacidad" required value="sensible"/>
            <p>Nota: antes de contestar esta información por favor remitirse al instructivo</p>
            <table class="table" id="tabla">
                <thead class="thead-dark">
                    <h3>Compromisos</h3>
                    <tr>
                        <th scope="col">Actividad</th>
                        <th scope="col">Responsable</th>
                    </tr>
                </thead>
                <tbody id="compromisos-tbody">
                    <tr>
                        <td><input type="text" class="form-control" name="actividad[]" placeholder="Ingrese actividad" value="Programación sesión acompañamiento a ficha por parte del área de bienestar al aprendiz." required></td>
                        <td><input type="text" class="form-control" name="responsable[]" placeholder="Ingrese responsable" value="Área bienestar al Aprendiz" required></td>
                    </tr>
                </tbody>
            </table>
<br>

            <h6>ASISTENTES: (incorporar registro de asistencia)</h6>
            <p class="parrafo">Nota: Puede incluirse imagen o captura de pantalla de los asistentes, si se trata de una reunión virtual o, de los asistentes que participan a través de una plataforma virtual, se pasa link para asistencia y aprobación del acta. Que reposa en el drive de comités de la ficha</p>
        </div>
    </div>
</center>

<p>
<div class="row">
    <div class="col">
        <br>
        <center>
        <button type="button" name="guardar_y_pdf" 
            style="background-color:rgb(204, 109, 0); color:white;" 
            onclick="guardarActaYGenerarPDF();" 
            class="bt">
            Guardar Acta y Generar PDF
        </button>
        </center>
    </div>
</div>

<script>
function guardarActaYGenerarPDF() {
    const form = document.getElementById("acta");
    if (!form) {
        alert("Formulario no encontrado. Verifica que el ID sea 'acta'.");
        return;
    }

     // 👇 Copiar contenido editable a los campos ocultos
    document.getElementById("contenidoAgenda_hidden").value = document.getElementById("contenidoAgenda").innerHTML;
    document.getElementById("hechos_actuales_hidden").value = document.getElementById("hechos_actuales").innerHTML;
    document.getElementById("informe_vocero_hidden").value = document.getElementById("informe_vocero").innerHTML;
    document.getElementById("informe_subvocero_hidden").value = document.getElementById("informe_subvocero").innerHTML;

    const formData = new FormData(form);

    // Validaciones básicas
    if (!formData.get("fecha") || !formData.get("hora_in") || !formData.get("nom_rev")) {
        alert("Por favor, completa los campos obligatorios: Fecha, Hora de inicio, Nombre comité, etc.");
        return;
    }

    fetch("?c=acta&a=Guardar", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        console.log("Respuesta del servidor:", data);
        try {
            const json = JSON.parse(data);
            if (json.success && json.n_acta) {
                alert("Acta guardada exitosamente. Oprime aceptar para generar visualizar el PDF");

                // Limpia el formulario
                form.reset();

                // Redirige a la generación del PDF
                window.location.href = "generar_pdf.php?" +
    "n_acta=" + encodeURIComponent(json.n_acta) + 
    "&ficha=" + encodeURIComponent(json.ficha) + 
    "&acta_contador=" + encodeURIComponent(json.acta_contador);
            } else {
                alert("Error: " + (json.message || "No se recibió el número de acta."));
            }
        } catch (error) {
            console.error("Error al interpretar JSON:", error, "\nRespuesta recibida:", data);
            alert("La respuesta del servidor no es válida. Revisa la consola.");
        }
    })
    .catch(error => {
        console.error("Error al guardar el acta:", error);
        alert("Ocurrió un error inesperado. Por favor, revisa la consola.");
    });
}
</script>


        </form>

        <!-- Scripts de Socket.IO y sincronización colaborativa -->
<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
  const socket = io("http://localhost:3000");
  const actaId = "<?php echo $id_acta ?? 'acta_default'; ?>";

  const agenda = document.getElementById("contenidoAgenda");
  const agenda_hidden = document.getElementById("contenidoAgenda_hidden");
  const hechos = document.getElementById("hechos_actuales");
  const informeVocero = document.getElementById("informe_vocero");
  const informeSubvocero = document.getElementById("informe_subvocero");


  socket.emit("join-acta", actaId);

  agenda?.addEventListener("input", () => {
    socket.emit("edit", {
      actaId,
      field: "agenda",
      content: agenda.innerHTML
    });
  });

  hechos?.addEventListener("input", () => {
    socket.emit("edit", {
      actaId,
      field: "hechos_actuales",
      content: hechos.innerHTML
    });
  });

  informeVocero?.addEventListener("input", () => {
    socket.emit("edit", { 
        actaId, 
        field: "informe_vocero",
         content: informeVocero.innerHTML });
  });

  informeSubvocero?.addEventListener("input", () => {
    socket.emit("edit", { 
        actaId, 
        field: "informe_subvocero", 
        content: informeSubvocero.innerHTML });
  });

  socket.on("update", ({ field, content }) => {
    if (field === "agenda" && agenda) agenda.innerHTML = content;
    if (field === "hechos_actuales" && hechos) hechos.innerHTML = content;
    if (field === "informe_vocero" && informeVocero) informeVocero.innerHTML = content;
    if (field === "informe_subvocero" && informeSubvocero) informeSubvocero.innerHTML = content;
  });

  const form = document.querySelector("form");
  if (form) {
    form.addEventListener("submit", () => {
      document.getElementById("contenidoAgenda_hidden").value = agenda?.innerHTML ?? '';
      document.getElementById("hechos_actuales_hidden").value = hechos?.innerHTML ?? '';
      document.getElementById("informe_vocero_hidden").value = informeVocero?.innerHTML ?? '';
      document.getElementById("informe_subvocero_hidden").value = informeSubvocero?.innerHTML ?? '';
    });
  }
  if (form && agenda && agenda_hidden) {
    form.addEventListener("submit", () => {
      agenda_hidden.value = agenda.innerHTML;
    });
  }


</script>

</body>
</html>




    </div>
</div>



