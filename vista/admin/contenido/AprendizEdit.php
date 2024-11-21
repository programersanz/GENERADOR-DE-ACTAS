
    <div id="content">
    <br>
   <center>
      <div  class="card w-75">
      <div class="card-body" >

      
<br>
<center>
<h1>Editar Aprendiz</h1>
</center>
<form action="?c=aprendiz&a=Guardar" name="formulario" id="formulario" class="sign-up-form" method="post" >
<br>

<!-- Nombre y apellido administrador-->
<div class="row">
<input name="id_aprendiz" id='id_aprendiz' type="hidden" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getId_aprendiz()?>">
<div class="col">
  <label for="">Nombre Aprendiz:</label>
  <input name="Nombre_aprendiz" id='Nombre_aprendiz' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getNombre()?>">
  </div>

  <div class="col">
  <label for="">Apellido Aprendiz:</label>
  <input name="Apellido_aprendiz" id='Apellido_aprendiz' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getApellido()?>">
</div>
</div>
<br>

<!--Correo y número de teléfono-->
<div class="row">

<div class="col">
  <label for="">Correo Aprendiz:</label>
  <input name="Correo" id='Correo' type="email" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getCorreo()?>">
 
  </div>
<div class="col">
  <label for="">Celular:</label>
  <input name="Celular" id='Celular' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getTelefono()?>">
  </div>


</div>

<br>

<!--Modalidad y nivel de formación-->
<div class="row">

<div class="col">
  <label for="">Tipo documento:</label>
  <select name="Tipo" id='Tipo' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Modalidad">
  <option selected> <?=$p->getTipo()?></option>
  <option value="CC">CC</option>
  <option value="TI">TI</option>
  <option value="CE">CE</option>
  <option value="TE">TE</option>
  <option value="PAS">PAS</option>

  </select>
</div>

<div class="col">
<label for="">Documento:</label>
  <input name="Numero" id='Numero' type="number" maxlength="25" oninput="maxlengthNumber(this);" required  class="" value="<?=$p->getDocumento()?>">
  
  </select>
</div>
</div>
<br>

<!--Tipo de programa-->
<div class="row">

<div class="col">
  <label for="">Estado de formación:</label>
  <select name="Estado" id='Estado' type="text" maxlength="25" oninput="maxlengthNumber(this);" required  class="" placeholder="Estado de formación">
  <option selected> <?=$p->getEstado_forma()?></option>
  <option value="En formación">En formación</option>
  <option value="Transladado">Transladado</option>
  <option value="Cancelado">Cancelado</option>
  <option value="Retiro voluntario">Retiro voluntario</option>
  </select>
</div>


<!--ficha-->
<div class="col">
  <label for="">Ficha:</label>
  <select name="ficha" id='ficha' type="text"  oninput="maxlengthNumber(this);" required  class="" >
  <option selected> <?=$p->getFicha()?></option>
  <?php foreach($fichas as $ficha): ?>
 
    <option value="<?=$ficha->getN_ficha()?>" <?=$ficha->getId_ficha() == $ficha->getId_ficha() ? 
    '' : ''?> > 
     <?=$ficha->getN_ficha()?> </option>
    <?php endforeach;?>
</select>
</div>
</div>
<br>

  <br>
  <br> 

  <!--Botón-->
  <div class="row">
  <div class="col">
  <center>
    <button type="submit" style="background-color: #39A900; color:white;"   onclick= 'return enviarFormulario();' id="bt1" class="bt">Actualizar</button>
    <a    href="?c=Vistas&a=ConsultarAprendiz" style="background-color: #39A900; color:white;"  type="submit" class="bt "> Cancelar</a>
    </center>
  </div>
</div>


<br>

<script>


function enviarFormulario() {

  event.preventDefault(); 


  Swal.fire({
  title: ' ¿ Guardar cambios ?',
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
   

    location.href="?c=Vistas&a=ConsultarAprendiz"  
  }
})

} 

</script>



</form>
</div>
</div>
</center>
</div>