
<div id="content">
    <br>
   <center>



      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Editar Ficha</h1>
</center>
<form  name="formulario" id="formulario" action="?c=Ficha&a=Guardarficha"   class="sign-up-form" method="post" >
<br>
<input name="id_ficha" id='id_ficha' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getId_ficha()?>">
<!-- Número de ficha y cantidad de aprendices-->
<div class="row">

<div class="col">
  <label for=""> Número Ficha:</label>
  <input name="N_ficha" id='N_ficha' type="text" maxlength="" oninput="maxlengthNumber(this);" required  class=""value="<?=$p->getN_ficha()?>">
  </div>

  <div class="col">
  <label for="">Cantidad Aprendices:</label>
  <input name="cantidad_apre" id='cantidad_apre' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getCantidad_apre()?>">
</div>
</div>
<br>

<!--Tipo de jornada y tipo de formación-->
<div class="row">

<div class="col">
  <label for="">Tipo Jornada:</label>
  <select name="jornada" id='jornada' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="">
  <option selected> <?=$p->getJornada()?></option>
  <option value="Diurna">DIURNA</option>
  <option value="Nocturna">NOCTURNA</option>
  <option value="Nocturna">MIXTA</option>
  </select>
</div>

<div class="col">
  <label for="">Tipo Formación:</label>
  <select name="tipo_forma" id='	tipo_forma' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="">
  <option selected> <?=$p->getTipo_forma()?></option>
  <option value="Técnico">TÉCNICO</option>
  <option value="Tecnológo">TECNÓLOGO</option>
  <option value="Tecnológo">AUXILIAR</option>
  </select>
</div>
</div>

<br>

<!--Fecha de inicio y fecha fin lectiva-->
<div class="row">

<div class="col">
  <label for=""> Fecha inicio (Lectiva):</label>
  <input name="fecha_inicio" id='fecha_inicio' type="date" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getFecha_inicio()?>">
 
  </div>
  <div class="col">
  <label for=""> Fecha Fin (Lectiva):</label>
  <input name="fecha_fin" id='fecha_fin' type="date" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getFecha_fin()?>">
  </div>
</div>
<br>

<!--Fecha de inicio y fecha fin productiva-->
<div class="row">

<div class="col">
  <label for=""> Fecha inicio (Productiva):</label>
  <input name="fecha_iniciop" id='fecha_iniciop' type="date" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getFecha_iniciop()?>">
 
  </div>
  <div class="col">
  <label for=""> Fecha Fin (Productiva):</label>
  <input name="fecha_finp" id='fecha_finp' type="date" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getFecha_finp()?>">
  </div>
</div>
<br>

<!--Tipo de programa-->
<div class="row">

  <div class="col">
    <label for="">Programa De Formación:</label>
    <select name="programa" id='programa' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="">
    <option selected> <?=$p->getPrograma()?></option>
    <option value="Auxiliar Contable">Auxiliar Contable</option>
    <option value="Desarrollo de Software">Desarrollo de Software</option>
    <option value="Sistemas">Sistemas</option>
    <option value="Soldadura">Soldadura</option>
    <option value="Electricidad">Electricidad</option>
    <option value="Mecánica Industrial">Mecánica Industrial</option>
    <option value="Logística Empresarial">Logística Empresarial</option>
    <option value="Atención Integral a la Primera Infancia">Atención Integral a la Primera Infancia</option>
    <option value="Cocina">Cocina</option>
    <option value="Panadería">Panadería</option>
    <option value="Carpintería y Ebanistería">Carpintería y Ebanistería</option>
    <option value="Construcción de Edificaciones">Construcción de Edificaciones</option>
    <option value="Mantenimiento de Motores Diésel">Mantenimiento de Motores Diésel</option>
    <option value="Seguridad Ocupacional">Seguridad Ocupacional</option>
    <option value="Gestión Documental">Gestión Documental</option>
    <option value="Redes de Datos">Redes de Datos</option>
    <option value="Instalaciones Eléctricas Residenciales">Instalaciones Eléctricas Residenciales</option>
    <option value="Agroindustria Alimentaria">Agroindustria Alimentaria</option>
    <option value="Producción Pecuaria">Producción Pecuaria</option>
    <option value="Asistencia Administrativa">Asistencia Administrativa</option>
    <option value="Análisis y Desarrollo de Software (ADSO)">Análisis y Desarrollo de Software (ADSO)</option>
    <option value="Animación 3D">Animación 3D</option>
    <option value="Impresión Digital">Impresión Digital</option>
    <option value="Gestión Empresarial">Gestión Empresarial</option>
    <option value="Gestión de Mercados">Gestión de Mercados</option>
    <option value="Gestión Logística">Gestión Logística</option>
    <option value="Producción Multimedia">Producción Multimedia</option>
    <option value="Gestión del Talento Humano">Gestión del Talento Humano</option>
    <option value="Construcción de Edificaciones">Construcción de Edificaciones</option>
    <option value="Desarrollo de Medios Gráficos Visuales">Desarrollo de Medios Gráficos Visuales</option>
    <option value="Producción de Contenidos Digitales">Producción de Contenidos Digitales</option>
    <option value="Automatización Industrial">Automatización Industrial</option>
    <option value="Mecatrónica">Mecatrónica</option>
    <option value="Energías Renovables">Energías Renovables</option>
    <option value="Gestión Ambiental">Gestión Ambiental</option>
    <option value="Gestión de Redes de Datos">Gestión de Redes de Datos</option>
    <option value="Producción de Moda">Producción de Moda</option>
    <option value="Control de Calidad en Confección Industrial">Control de Calidad en Confección Industrial</option>
    <option value="Gestión Hotelera">Gestión Hotelera</option>
    <option value="Agroindustria Alimentaria">Agroindustria Alimentaria</option>

   </select>
  </div>
</div>
  <br><br>


  <!--Botón-->
  <div class="row">
  <div class="col">
  <center>
  <button style="background-color: #39A900; color:white;"  onclick='return enviarFormulario();'  class="bt"   id="bt1"  class="btn solid" >Actualizar</button>
    <a    href="?c=Vistas&a=ConsultarFicha" type="submit" style="background-color: #39A900; color:white;"  class="bt"> Cancelar</a>
    </center>
  </div>
</div>
<br>
<script>


function enviarFormulario() {

  event.preventDefault(); 


  Swal.fire({
  title: '¿ Guardar cambios ?',
  icon: 'question',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonColor: '#39A900',
  denyButtonColor: '#39A900',
  confirmButtonText: 'Guardar ',
  denyButtonText: `No guardar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {


    formulario.submit();


  } else if (result.isDenied) {
   
    location.href="?c=Vistas&a=ConsultarFicha"  
  }
})

} 

</script>

<br>


</form>
</div>
</div>
</center>

</div>