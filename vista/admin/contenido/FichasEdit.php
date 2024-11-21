
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
  <option value="Diurna">Diurna</option>
  <option value="Nocturna">Nocturna</option>
  </select>
</div>

<div class="col">
  <label for="">Tipo Formación:</label>
  <select name="tipo_forma" id='	tipo_forma' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="">
  <option selected> <?=$p->getTipo_forma()?></option>
  <option value="Técnico">Técnico</option>
  <option value="Tecnológo">Tecnológo</option>
  </select>
</div>
</div>

<br>

<!--Fecha de inicio y fecha fin-->
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

<!--Tipo de programa-->
<div class="row">

<div class="col">
  <label for="">Programa De Formación:</label>
  <select name="programa" id='programa' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="">
  <option selected> <?=$p->getPrograma()?></option>
  <option value="Adsi">Adsi</option>
  <option value="Multimedia">Multimedia</option>
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